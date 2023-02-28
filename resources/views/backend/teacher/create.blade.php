@extends('layouts.backend.main')

@push('styles')
    <link href="/admin-assets/dist/css/pages/teacher.css" rel="stylesheet">
@endpush

@push('script')
    <script src="/admin-assets/dist/js/pages/teacher.js"></script>
@endpush

@section('content')
<div class="content-page teacher-page">
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
                            <h5 class="card-title">Thêm mới giảng viên</h5>
                            <a href="{{beRoute('teacher.index')}}">
                                <button type="button" class="btn btn-cyan btn-sm">Quay lại</button>
                            </a>
                        </div>

                        <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="card">
                                <form class="form-horizontal" action="{{beRoute('teacher.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    @if ($errors->any())
                                        <div class="error alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Họ và tên <span class="text-danger">(*)</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" placeholder="Nhập họ và tên" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Email <span class="text-danger">(*)</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Nhập email" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Phone <span class="text-danger">(*)</span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"  placeholder="Nhập SĐT" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Mô tả ngắn</label>
                                                    <div class="col-sm-8">
                                                        <textarea  type="text" class="form-control" maxlength="255" rows="5" name="{{ old('description') }}"
                                                                   placeholder="Nhập mô tả ngắn về giảng viên">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>

{{--                                                <div class="form-group row">--}}
{{--                                                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Ảnh đại diện</label>--}}
{{--                                                    <div class="col-sm-8">--}}
{{--                                                        <input type="file" class="form-control" name="avatar">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success">Gửi đi</button>
                                        </div>
                                    </div>
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
