$(document).ready(function () {
    displayData();
});

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
        url: `/admin/management-user/${data}/create`,
        method: "get",
        success: async function (response) {
            console.log(response)
            await $(`#show-data-${data}`).html(response);
            $(`#row-${data}-${id}`).addClass("success-alert");
            setTimeout(() => {
                $(`#row-${data}-${id}`).removeClass("success-alert");
            }, 3000);
            // await $(`#table-${data}`).DataTable();
        },
        error: function (err) {
            console.log(err);
        }
    });
}


function openModal(data, type, id = null) {
    if (type == "add" || type == "edit") {
        $(`#modal-${data}`).modal("show");
    } else {
        $(`#modal-content-${data}`).LoadingOverlay("show");
        $(`#modal-detail-${data}`).modal("show");
    }
    switch (type) {
        case "add":
            $(`#form-${data}`)[0].reset();
            $(`#add-${data}`).show();
            $(`#edit-${data}`).hide();
            if(data == 'bank-account'){
                $("#select2-bank_name-container").html('--Silahkan Pilih Nama Bank--')
            }else if(data == 'bank'){
                $("#select2-bank_status-container").html('--Silahkan Pilih Status Bank--')

            }
            $.ajax({
                url: `/admin/management-user/${data}/code`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    var code = `${data}`;
                    if(data.includes("-")){
                        code = data.replace("-", "_");
                    }
                    console.log(code)
                    await $(`#${code}_code`).val(response.data)
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "edit":
            $(`#edit-${data}`).show();
            $(`#add-${data}`).hide();
            $.ajax({
                url: `/admin/management-user/${data}/${id}/edit`,
                method: "get",
                dataType: "json",
                success: async function (response) {
                    await fetchData(data, response.data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
            break;
        case "detail":
            $(`#modal-detail-${data}`).LoadingOverlay("hide");
            break;
        default:
            break;
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

function manageData(type, id = null) {
    switch (type) {
        case "save":
            $(`#form-${data}`).submit(function (e) {
                $(`#add-${data}`).attr("disabled", true);
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: `/admin/management-user/${data}`,
                    type: "post",
                    data: formData,
                    dataType: "json",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: async function (response) {
                        await successResponse(
                            "add",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function (err) {
                        console.log(err);
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, data);
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
                    url: `/admin/management-user/${data}/${id}`,
                    type: "patch",
                    data: formData,
                    dataType: "json",
                    success: async function (response) {
                        console.log(response);
                        await successResponse(
                            "edit",
                            data,
                            response.message,
                            response.data.id
                        );
                    },
                    error: async function (err) {
                        console.log(err)
                        let err_log = err.responseJSON.errors;
                        await handleError(err, err_log, data);
                    }
                });
            });
            break;
        case "delete":
            Swal.fire({
                title: "Yakin akan menghapus data?",
                text: "Data yang di hapus tidak dapat dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!"
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/management-user/${data}/${id}`,
                        method: "delete",
                        // dataType: "json",
                        success: function (response) {
                            console.log(response);
                            if (response.status == 300) {
                                Toast.fire({
                                    icon: "error",
                                    title: response.message
                                });
                                return;
                            }

                            successResponse(
                                "delete",
                                data,
                                response.message,
                                response.data
                            );
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            break;
        default:
            break;
    }
}

function handleError(err, err_log, type) {
    $(`#add-${type}`).attr("disabled", false);
    $(`#form-${type}`).unbind("submit");
    switch (type) {
        case "role":
            if (err.status == 422) {
                if (typeof err_log.role_name !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.role_name[0]
                    });
                }
                if (typeof err_log.role_code !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.role_code[0]
                    });
                }
                if (typeof err_log.role_level !== "undefined") {
                    Toast.fire({
                        icon: "error",
                        title: err_log.role_level[0]
                    });
                }
            } else {
                Toast.fire({
                    icon: "error",
                    title: "Terjadi Kesalahan Pada Sistem"
                });
            }
            break;
        default:
            break;
    }
}

function fetchData(data, response, type = null) {
    switch (data) {
        case "role":
            $("#id").val(response.id);
            $("#role_code").val(response.role_code);
            $("#role_name").val(response.role_name);
            $("#role_level").val(response.role_level);
            $("#role_description").val(
                response.role_description
            );
            break;
        default:
            break;
    }
}
