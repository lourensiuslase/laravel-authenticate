$(document).ready(function () {
    displayData();
});

$(document).on('change', '.form-uppercase', function (e) {
    var id = this.id;
    var value = this.value;
    $(`#${id}`).val(value.toUpperCase())
});

$('.input-price').mask('000.000.000.000');

function formatAmount(target_id) {
    var value = $(`#${target_id}`).val();
    var arrValue = value.split(".")
    var res = '';
    arrValue.map(value => {
        res += value;
    })
    var targetValueId = target_id.replace("_view", "");
    $(`#${targetValueId}`).val(res)
}

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

const getUrl = () => {
    var url = window.location.href;
    var arr = url.split("/");
    var data = arr[5];
    return data;
};

const data = getUrl();
function displayData(id = null, data_search = null, type = null) {
    $.ajax({
        url: `/admin/general/${data}/create`,
        method: "get",
        success: function (response) {
            $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            $(`#table-${data}`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function openModal(data, type, id = null, name = null) {
    if (type == "add" || type == "edit") {
        $(`#modal-${data}`).modal("show");
    } else if (type == 'detail') {
        $(`#modal-detail-${data}`).modal("show");
        $(`#modal-detail-${data}`).LoadingOverlay("show");
    }
    switch (type) {
        case "add":
            $("#password-field").show();
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            if (data == 'company') {
                $.ajax({
                    type: `get`,
                    url: `/admin/general/${data}/code`,
                    dataType: "json",
                    success: function (response) {
                        $(`#${data}_code`).val(response.data)
                    }
                });
            }
            break;
        case "edit":
            $("#password-field").hide();
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/general/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: function (response) {
                    fetchData(data, response.data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "detail":
            $(`#modal-detail-${data}`).LoadingOverlay("hide");
            var urlAjax = `/admin/general/${data}/${id}`;
            if (data == 'role') {
                urlAjax = `/admin/general/${data}/${id}/edit`;
            }
            $.ajax({
                url: urlAjax,
                method: "get",
                dataType: "json",
                success: function (response) {
                    console.log(response)
                    var data_value = response.data;
                    if (data == 'user-management') {
                        $("#detail-username").val(data_value.username)
                        $("#detail-name").val(data_value.name)
                        $("#detail-email").val(data_value.email)
                        $("#detail-id_role").val(data_value.id_role)
                        $("#detail-phone").val(data_value.phone)
                        $("#detail-is_active").val(data_value.is_active)
                    } else if (data == 'role') {
                        $("#detail-role_code").val(data_value.role_code)
                        $("#detail-role_name").val(data_value.role_name)
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "back":
            if (data == 'company') {
                $("#btn-back-company").hide();
                $("#btn-add-company").show();
                $("#btn-import-company").show();
                $("#show-data-company").show();
                $("#import-data-company").hide();
            } else if (data == 'role-access') {
                $(`#show-data-role-access`).show();
                $(`#access-control-role-access`).hide();
                $(`#btn-add-role-access`).show();
                $(`#btn-back-role-access`).hide();
            }
            break
        case "access-control":

            loadingElement('on', `access-control-role-access`)
            $(`#show-data-role-access`).hide();
            $(`#access-control-role-access`).show();
            $(`#btn-add-role-access`).hide();
            $(`#btn-back-role-access`).show();
            $.ajax({
                type: "get",
                url: `/admin/general/${data}/${id}`,
                success: function (response) {
                    $("#access-control-role-access").html(response)
                    loadingElement('off', `access-control-role-access`)
                },
                error: function (err) {
                    console.log(err)
                }
            });


            break
    }
}

const successResponse = (type, data, message, id = null) => {
    $(`#modal-${data}`).modal("hide");
    $(`#form-${data}`).unbind("submit");
    displayData(id);
    switch (type) {
        case "add":
            $(`#add-${data}`).attr("disabled", false);
            $(`#form-${data}`)[0].reset();
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "edit":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "delete":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        case "activate":
            Toast.fire({
                icon: "success",
                title: message
            });
            break;
        default:
            break;
    }
};

function manageData(type, id = null, name = null) {
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function (e) {
                loadingElement('on', `form-${data}`)
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/general/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        console.log(response)
                        successResponse(
                            "add",
                            data,
                            response.message,
                            response.data.id
                        );
                        loadingElement('off', `form-${data}`)
                    },
                    error: function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        handleError(err, err_log, data);
                        loadingElement('off', `form-${data}`)
                    }
                });
            });
            break;
        case "update":
            var id = $("#id").val();
            $(`#form-${data}`).submit(function (e) {
                e.preventDefault();
                var formData = $(`#form-${data}`).serialize();
                console.log(formData)
                $.ajax({
                    url: `/admin/general/${data}/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
                        successResponse(
                            "edit",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: function (err) {
                        console.log(err)
                        let err_log = err.responseJSON.errors;
                        handleError(err, err_log, data);
                    }
                });
            });
            break;
        case "delete":
            var message = `Are you sure want to delete this data <span class="text-danger">${name}</span>?`;
            Swal.fire({
                title: "Confirmation",
                html: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "red",
                cancelButtonColor: "grey",
                confirmButtonText: "Delete",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/general/${data}/${id}`,
                        method: "delete",
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 400) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.message
                                });
                                return;
                            }
                            successResponse(
                                "delete",
                                "activity",
                                response.message,
                                response.data.id
                            );
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            break;
    }
}


function handleError(err, err_log, type) {
    $(`#add-${type}`).attr("disabled", false);
    $(`#form-${type}`).unbind("submit");
    switch (type) {
        case "user-management":
            if (err.status == 422) {

                if (typeof err_log.username !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.username[0]
                    });
                    break;
                }
                if (typeof err_log.name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.name[0]
                    });
                    break;
                }
                if (typeof err_log.email !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.email[0]
                    });
                    break;
                }
                if (typeof err_log.id_role !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.id_role[0]
                    });
                    break;
                }
                if (typeof err_log.password !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.password[0]
                    });
                    break;
                }
                if (typeof err_log.bg_color !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.bg_color[0]
                    });
                    break;
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Something went wrong"
                });
            }
            break;
    }
}

function fetchData(data, response, type = null) {
    switch (data) {
        case "profile":
            console.log("fetchData : ", response)
            $("#id").val(response.id);
            $("#username").val(response.username);
            $("#email").val(response.email);
            $("#id_role").val(response.id_role);
            break;
        case "role":
            $("#id").val(response.id);
            $("#role_code").val(response.role_code);
            $("#role_name").val(response.role_name);
            $("#role_description").val(
                response.role_description
            );
            break;
        case "user-management":
            $("#id").val(response.id);
            $("#username").val(response.username);
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#id_role").val(response.id_role);
            $("#is_active").val(response.is_active);
            $("#phone").val(response.phone);
            break;
    }
}


function selectMenu(id_menu) {
    var id_role = $("#id_role").val();
    if ($(`#customCheck${id_menu}`).prop("checked")) {
        ajaxSetAccess(id_menu, id_role, 'add')
    } else if ($(`#customCheck${id_menu}`).prop("checked", false)) {
        ajaxSetAccess(id_menu, id_role, 'delete')
    }
}

function ajaxSetAccess(id_menu, id_role, type) {
    loadingElement('on', `access-data-${id_menu}`)
    $.ajax({
        type: "post",
        url: "/admin/general/role-access/set-access",
        data: {
            id_menu,
            id_role,
            type
        },
        dataType: "json",
        success: function (response) {
            loadingElement('off', `access-data-${id_menu}`)
            Toast.fire({
                icon: "success",
                title: response.message
            });
        },
        error: function (err) {
            console.log(err)
        }
    });
}


function loadingElement(type, target, message = null) {
    if (type == "on") {
        $(`#${target}`).LoadingOverlay("show", {
            text: message,
            progress: true,
        });
    } else {
        $(`#${target}`).LoadingOverlay("hide");
    }
}




function generatePassword() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 16; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    $("#password").val(text)
}

function copyPassword() {
    var copyText = document.getElementById("password");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
}

// Search
function searchUserManagement() {
    loadingElement("on", "show-data-user-management");
    const role_name = $("#role_name").val();
    const status = $("#status_user").val();

    $.ajax({
        type: "post",
        data: {
            role_name,
            status
        },
        url: `/admin/general/user-management/search`,
        success: function (response) {
            console.log(response)
            loadingElement("off", "show-data-user-management");
            $(`#show-data-${data}`).html(response);
        },
        error: function (err) {
            loadingElement("off", "show-data-client-sales");
            console.log(err);
        },
    });
}
