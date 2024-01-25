@extends('admin.layouts.app')
@section('title', 'Profile')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h5 class="h5 text-uppercase">Profile</h5>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <button id="btn-edit-profile" type="button"
                                class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                                onclick="openModal('profile','edit', {{ $data->id }})">
                            <i class="fe fe-edit"></i> Edit</button>
                        <button id="btn-back-profile" type="button" style="display: none"
                                class="btn btn-sm btn-warning text-white mr-1 float-right text-uppercase"
                                onclick="openModal('profile','back')"><i class="fe fe-arrow-left"></i> Back</button>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body" id="show-data-profile">
            </div>
        </div>
    </div>

@endsection
@section('modal')
    @include('admin.general.profile.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/general/index.js') }}"></script>
    <script>
        function changeRole(){
            $("#role_name").val($("#id_role option:selected").text());
        }
        $(document).ready(function() {
            $.ajax({
                url: `/admin/general/role/get-data/all`,
                method: "get",
                success: function(response) {
                    const role = response.data.map((el,i) => {
                        return `<option value="${el.id}">${el.role_name}</option>`;
                    })
                    $("#id_role").html(role.toString());
                },
                error: function(err) {
                    console.log(err);
                }
            });
        })
    </script>
@endpush
