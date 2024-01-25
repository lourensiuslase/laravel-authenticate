@extends('admin.layouts.app')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row ">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h4>Provinces</h4>
                    </div>
                </div>
            </div>
            <div class="card-body" id="body-master-provinces">
                <input type="hidden" id="province" value="{{$province->count()}}">
                <table class="table datatables table-bordered table-hover table-data" id="table-master-status">
                    <thead>
                    <tr>
                        <th class="w-5p">No</th>
                        <th class="w-30p">Kode Provinsi</th>
                        <th>Nama Provinsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($province as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->state_code }}</td>
                            <td>{{ $item->state_name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center font-weight-bold">Data tidak ditemukan</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@push('page-scripts')
    <script>
        $(function () {
            var countSelected = 0;

            if (parseInt($("#province").val()) > 0) {
                $("#table-master-status").DataTable();
            }
        });
    </script>
@endpush
