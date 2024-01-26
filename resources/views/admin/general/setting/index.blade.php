@extends('admin.layouts.app')
@section('title', 'Setting Profile')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h5 class="h5 text-uppercase">Setting Profile</h5>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <div class="float-right">
                        <a href="{{route('dashboard')}}" class="btn btn-secondary"><i class="fe fe-arrow-left"></i> Back</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" id="show-data-setting">
                <div class="row">

                    <div class="col-12">
                        <div class="row">
                            <input type="hidden" id="user_id" class="form-control" value="{{ $data->id }}">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Username</span>
                                <input type="input" class="form-control" value="{{ $data->username }}" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Role Users</span>
                                <input type="input" class="form-control" value="{{ $data->role_name }}" readonly>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-3">
                                <span class="mb-0">Email</span>
                                <input type="input" class="form-control" value="{{ $data->email }}" readonly>
                            </div>
                        </div>
                        <hr />
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">Old Password</span>
                                        <input type="password" class="form-control" id="old_password" name="old_password" value="">

                                        <i id="icon-show-password-old_password" class="fe fe-eye fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;display: none;cursor: pointer;"
                                           onclick="showPassword('show','old_password')"></i>
                                        <i id="icon-not-show-password-old_password" class="fe fe-eye-off fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;cursor: pointer;"
                                           onclick="showPassword('close','old_password')"></i>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">New Password</span>
                                        <input type="password" class="form-control" id="new_password" name="new_password" value="">
                                        <i id="icon-show-password-new_password" class="fe fe-eye fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;display: none;cursor: pointer;"
                                           onclick="showPassword('show','new_password')"></i>
                                        <i id="icon-not-show-password-new_password" class="fe fe-eye-off fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;cursor: pointer;"
                                           onclick="showPassword('close','new_password')"></i>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <span class="mb-0">Confirm New Password</span>
                                        <input type="password" id="confirm_password"
                                               name="confirm_password" class="form-control" value="">
                                        <i id="icon-show-password-confirm_password" class="fe fe-eye fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;display: none;cursor: pointer;"
                                           onclick="showPassword('show','confirm_password')"></i>
                                        <i id="icon-not-show-password-confirm_password" class="fe fe-eye-off fe-24 text-black"
                                           style="position: absolute; top : 47%;right: 4%;cursor: pointer;"
                                           onclick="showPassword('close','confirm_password')"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <span class="mb-0"><b>Password requirements</b></span>
                                <p>To create a new password, you have to meet all of the following requirements:
                                <ul>
                                    <li>Minimum 8 character</li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can't be same as a previous password</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <hr/>
                    </div>
                    <div class="col-12 text-right">
                        <button type="button" onclick="clearData()" class="btn btn-secondary">Clear</button>
                        <button type="button" onclick="updateProfile()" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    {{-- <script src="{{ asset('script/admin/general/index.js') }}"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        function updateProfile() {
            const user_id = $("#user_id").val();
            const old_password = $("#old_password").val();
            const new_password = $("#new_password").val();
            const confirm_password = $("#confirm_password").val();

            if (old_password && new_password && confirm_password) {
                if (new_password.length >= 8 && confirm_password.length >= 8) {
                    if (new_password === confirm_password) {
                        if (new_password !== old_password) {
                            $.ajax({
                                url: `/admin/general/setting/${user_id}`,
                                method: "patch",
                                data: {
                                    old_password,
                                    new_password,
                                },
                                success: function (response) {
                                    if (response.status == 200) {
                                        Toast.fire({
                                            icon: "success",
                                            title: "Success update password",
                                        });
                                        window.location.reload();
                                    } else {
                                        Toast.fire({
                                            icon: "error",
                                            title: response.message,
                                        });
                                    }
                                },
                                error: function (err) {
                                    console.log(err);
                                },
                            });
                        } else {
                            Toast.fire({
                                icon: "error",
                                title: "New Password can't be the same as the previous password",
                            });
                        }
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: "New Password and Confirm Password don't match.",
                        });
                    }
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "Minimum password length is 8 characters.",
                    });
                }
            }
        }


        function showPassword(type, id) {
            let inputPass = document.getElementById(id);
            console.log(inputPass)
            console.log(`#icon-not-show-password-${id}`)
            if (type == 'show') {
                $(`#icon-show-password-${id}`).hide()
                $(`#icon-not-show-password-${id}`).show()
                inputPass.type = "password";
            } else {
                $(`#icon-show-password-${id}`).show()
                $(`#icon-not-show-password-${id}`).hide()
                inputPass.type = "text";
            }
        }

        function clearData() {
            $(`#old_password`).val('')
            $(`#new_password`).val('')
            $(`#confirm_password`).val('')
        }
        $(document).ready(function() {

        })
    </script>
@endpush
