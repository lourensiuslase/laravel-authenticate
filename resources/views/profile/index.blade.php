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
                                class="btn btn-sm btn-primary mr-1 float-right text-uppercase">
                            <i class="fe fe-edit"></i> Edit
                        </button>
                        <button id="btn-back-profile" type="button"
                                class="btn btn-sm btn-warning text-white mr-1 float-right text-uppercase"><i
                                class="fe fe-arrow-left"></i> Back
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" width="100%" alt="Avatar" style="border-radius: 50%;">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="mb-0">Username</span>
                                <h6>{{ $data->name }}</h6>
                            </div>
                            <div class="col-md-6">
                                <span class="mb-0">Email</span>
                                <h6>{{ $data->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
