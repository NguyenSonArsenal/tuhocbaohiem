@extends('layouts.backend.main')

@push('styles')
    <link href="/backend/css/dashboard.css" rel="stylesheet">
@endpush

@section('content')
    <div class="content-page">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Trang quản trị</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            @include('layouts.backend.structures._notification')

                            <div class="card-body__head d-flex">
                                <h5 class="card-title">Thống kê hệ thống</h5>
                            </div>

                            <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-cyan text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6><a class="text-white" href="#">Danh
                                                        sách người dùng</a></h6>
                                                <h6 class="text-white">100</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-cyan text-center">
                                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i>
                                                </h1>
                                                <h6><a class="text-white" href="#">Danh sách giáo viên</a></h6>
                                                <h6 class="text-white">{{ \App\Models\Teacher::count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

        </div>
    </div>
@stop
