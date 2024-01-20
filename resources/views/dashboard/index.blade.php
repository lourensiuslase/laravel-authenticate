@extends('admin.layouts.app')
@section('content')

    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            10
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Saldo</h4>
                        </div>
                        <div class="card-body">
                            Rp. 5.000.000,00
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Material</h4>
                        </div>
                        <div class="card-body">
                            20 Barang
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong>Target Pembangunan</strong>
                    </div>
                    <div class="card-body px-4">
                        <div class="row border-bottom">
                            <div class="col-4 text-center mb-3">
                                <p class="mb-1 small text-muted">Completions</p>
                                <span class="h3">26</span><br />
                                <span class="small text-muted">+20%</span>
                                <span class="fe fe-arrow-up text-success fe-12"></span>
                            </div>
                            <div class="col-4 text-center mb-3">
                                <p class="mb-1 small text-muted">Goal Value</p>
                                <span class="h3">$260</span><br />
                                <span class="small text-muted">+6%</span>
                                <span class="fe fe-arrow-up text-success fe-12"></span>
                            </div>
                            <div class="col-4 text-center mb-3">
                                <p class="mb-1 small text-muted">Conversion</p>
                                <span class="h3">6%</span><br />
                                <span class="small text-muted">-2%</span>
                                <span class="fe fe-arrow-down text-danger fe-12"></span>
                            </div>
                        </div>
                        <table class="table table-borderless mt-3 mb-1 mx-n1 table-sm">
                            <thead>
                            <tr>
                                <th class="w-50">Goal</th>
                                <th class="text-right">Conversion</th>
                                <th class="text-right">Completions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Checkout</td>
                                <td class="text-right">5%</td>
                                <td class="text-right">260</td>
                            </tr>
                            <tr>
                                <td>Add to Cart</td>
                                <td class="text-right">55%</td>
                                <td class="text-right">1260</td>
                            </tr>
                            <tr>
                                <td>Contact</td>
                                <td class="text-right">18%</td>
                                <td class="text-right">460</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col -->
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Pembelian Material</strong>
                        <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2">
                                        <img src="./assets/products/p1.jpg" alt="..." class="thumbnail-sm">
                                    </div>
                                    <div class="col">
                                        <strong>Fusion Backpack</strong>
                                        <div class="my-0 text-muted small">Gear, Bags</div>
                                    </div>
                                    <div class="col-auto">
                                        <strong>+85%</strong>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 85%"
                                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2">
                                        <img src="./assets/products/p2.jpg" alt="..." class="thumbnail-sm">
                                    </div>
                                    <div class="col">
                                        <strong>Luma hoodies</strong>
                                        <div class="my-0 text-muted small">Jackets, Men</div>
                                    </div>
                                    <div class="col-auto">
                                        <strong>+75%</strong>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2">
                                        <img src="./assets/products/p3.jpg" alt="..." class="thumbnail-sm">
                                    </div>
                                    <div class="col">
                                        <strong>Luma shorts</strong>
                                        <div class="my-0 text-muted small">Shorts, Men</div>
                                    </div>
                                    <div class="col-auto">
                                        <strong>+62%</strong>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 62%"
                                                 aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2">
                                        <img src="./assets/products/p4.jpg" alt="..." class="thumbnail-sm">
                                    </div>
                                    <div class="col">
                                        <strong>Brown Trousers</strong>
                                        <div class="my-0 text-muted small">Trousers, Women</div>
                                    </div>
                                    <div class="col-auto">
                                        <strong>+24%</strong>
                                        <div class="progress mt-2" style="height: 4px;">
                                            <div class="progress-bar" role="progressbar" style="width: 24%"
                                                 aria-valuenow="24" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .list-group -->
                    </div> <!-- / .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div>

@endsection
@push('page-scripts')
@endpush
