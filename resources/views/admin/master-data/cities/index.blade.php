@extends('admin.layouts.app')
@section('content')

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <div class="toolbar row">
                    <div class="col-md-8 col-sm-8 col-8">
                        <h4>Master Cities</h4>
                    </div>
                </div>
            </div>
            <div class="card-body" id="body-master-cities">
                <input type="hidden" id="cities" value="{{$city->count()}}">
                <table class="table datatables table-bordered table-hover table-data" id="table-master-city">
                    <thead>
                    <tr>
                        <th class="w-3p">No</th>
                        <th class="w-20p">Nama Kota</th>
                        <th class="w-20p">Nama Provinsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($city) > 0)
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($city as $data)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $data->city_name }}</td>
                                <td>{{ $data->state_name }}</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Data tidak ditemukan</td>
                        </tr>
                    @endif
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

            if (parseInt($("#cities").val()) > 0) {
                $("#table-master-city").DataTable();
            }
        });
    </script>
@endpush
