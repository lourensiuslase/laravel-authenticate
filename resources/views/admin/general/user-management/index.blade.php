@extends('admin.layouts.app')
@section('title', 'User Management')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h5>User Management</h5>
                    </div>
                    <div class="col-md-4 col-sm-4 col-4">
                        <button type="button" class="btn btn-sm btn-primary mr-1 float-right text-uppercase"
                                onclick="openModal('user-management','add')"><i class="fe fe-plus"></i> Create Data
                        </button>

                    </div>
                </div>
            </div>
            <div class="card-body" id="body-filtering">
                <div class="row">
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="mb-1">User Role</label>
                            <div class="form-group">
                                <select name="role_name" id="role_name" class="form-control bg-transparent">
                                    <option value="">Choose Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_name }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <label class="mb-1">User Status</label>
                            <div class="form-group">
                                <select name="status_user" id="status_user" class="form-control bg-transparent">
                                    <option value="">ALL</option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" style="margin-top:25px">
                            <button type="button" onclick="displayData()"class="btn btn-secondary"><i class="fe fe-rotate-ccw fe-16"></i>Reset</button>
                            <button type="button" onclick="searchUserManagement()" class="btn btn-primary"><i class="bi bi-filter fe-16"></i>Filter</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" id="show-data-user-management">
                <div class="d-flex text-center ">
                    <div class="spinner-border spinner-border text-black mr-2"><span class="sr-only">Loading...</span>
                    </div>
                    <h4 for="" class="ml-2">Please Wait ......</h4>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    @include('admin.general.user-management.modal')
@endsection

@push('page-scripts')
    <script src="{{ asset('script/admin/general/index.js') }}"></script>
@endpush
