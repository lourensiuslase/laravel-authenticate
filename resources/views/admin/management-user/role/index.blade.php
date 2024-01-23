@extends('admin.layouts.app')
@section('title','Dashboard')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-12 d-flex">
                        <h2 class="h4 mb-1">Data Master Peran</h2>
                        <div class="col ml-auto">
                            <div class="dropdown float-right">
                                <button type="button" class="btn btn-primary mr-1" onclick="openModal('role','add')"><i
                                        class="fe fe-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table datatables table-bordered table-hover" id="table-role">
                    <thead>
                    <tr>
                        <th class="w-5p">No</th>
                        <th class="w-15p">Kode Peran</th>
                        <th>Nama Peran</th>
                        <th>Deskripsi</th>
                        <th class="w-10p">Level</th>
                        <th class="w-12p">Aksi</th>
                    </tr>
                    </thead>
                    <tbody id="show-data-role">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    @include('admin.management-user.role.modal')
@endsection

@push('page-scripts')
    <script src="{{asset('script/admin/management-user/index.js')}}"></script>
@endpush
