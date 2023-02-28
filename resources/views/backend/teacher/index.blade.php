@extends('layouts.backend.main')

@push('styles')
    <link href="/admin-assets/dist/css/pages/teacher.css" rel="stylesheet">
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

                        <div class="card-body__head card-body__filter">
                            <h5 class="card-title bold">Bộ lọc</h5>
                        </div>

                        <!-- From search -->
                        <form method="GET" action="" class="mb-5" id="form-search">
                            <div class="form-row">
                                <div class="col-md-1">
                                    <input type="text" name="id" class="form-control" placeholder="ID" value="{{ request('id') }}">
                                </div>
                                <div class="col-md-2">
                                    <input type="text" name="name_email" class="form-control" placeholder="Họ tên, email" value="{{ request('name_email') }}">
                                </div>
                            </div>

                            <div class="card-body__head card-body__filter text-center">
                                <button type="submit" class="btn btn-cyan btn-sm">Tìm kiếm</button>
                            </div>
                        </form>

                        <div class="card-body__head d-flex">
                            <h5 class="card-title">Danh sách giảng viên</h5>
                            <a href="{{ beRoute('teacher.create') }}">
                                <button type="button" class="btn btn-cyan btn-sm">Thêm mới</button>
                            </a>
                        </div>

                        <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table class="table table-striped table-bordered dataTable" role="grid">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Ảnh đại diện</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $entity)
                                    <tr>
                                        <td>{{ getSTTBackend($data, $key) }}</td>
                                        <td>{{ $entity->full_name }}</td>
                                        <td>
                                            @if($entity->avatar)
                                                <a href="javascript:void(0)">
                                                    <img width="50px" src="{{ $entity->avatar }}" alt="Image name">
                                                </a>
                                            @else
                                                <a href="javascript:void(0)">
                                                    <img width="30px" src="{{ asset('backend/image/user/1.jpg') }}" alt="Image name">
                                                </a>
                                            @endif
                                        </td>
                                        <td>{{ $entity->email }}</td>
                                        <td>{{ $entity->phone }}</td>
                                        <td>
{{--                                            <div class="comment-footer">--}}
{{--                                                <a href="">--}}
{{--                                                    <button type="button" class="btn btn-cyan btn-xs">Sửa</button>--}}
{{--                                                </a>--}}
{{--                                                <a href="#modal_confirm_delete"--}}
{{--                                                   class="btn-danger btn btn-xs modal_confirm_delete rounded"--}}
{{--                                                   data-toggle="modal"--}}
{{--                                                   data-form-action="{{ route('be.teacher.destroy', ['teacher' => $entity->id]) }}"--}}
{{--                                                >--}}
{{--                                                    Xóa--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            {{ $data->appends(request()->all())->links('layouts.backend.structures._pagination')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
