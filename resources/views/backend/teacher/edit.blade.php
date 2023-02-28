@extends('layouts.backend.main')

@push('styles')
    <link href="/admin-assets/dist/css/pages/teacher.css" rel="stylesheet">
@endpush

@section('content')
<div class="content-page">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Giảng viên</h4>
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
                            <h5 class="card-title">Cập nhật thông tin giảng viên</h5>
                            <a href="{{ getBackUrl() }}">
                                <button type="button" class="btn btn-cyan btn-sm">Quay lại</button>
                            </a>
                        </div>

                        <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="card">
                                <form class="form-horizontal" action="{{backendRouter('teachers.update', ['id' => $entity->getKey()])}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('backend.teachers._form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop