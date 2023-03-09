@extends('layouts.frontend.main')

@push('script')
    <script src="{{ asset('frontend/assets/js/pages/home.js') }}"></script>
@endpush

@push('styles')
@endpush

@section('content')
    <div class="list-teacher-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="list-teacher-ctn">
                        <div class="head_title text-center fix">
                            <h2 >Giảng viên</h2>
                        </div>
                        <div class="row">
                            @foreach($teacher as $item)
                                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                    <div class="list-teacher-item">
                                        <div class="teacher-img">
                                            <img src="{{asset($item->avatar) }}" alt="">
                                            <div class="overlay-logo"></div>
                                        </div>
                                        <div class="detail">
                                            <div class="teacher-name">
                                                <h5>
                                                    <a href="{{ url('/detail-teacher') }}">{{ $item->full_name }}</a>
                                                </h5>
                                            </div>
                                            <div class="review">
                                                <p>{{ $item->description }}</p>
                                            </div>
                                            <div class="section-detail">
                                                <a href="{{ feRoute('teacher.show', ['id' => $item->id]) }}">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagin-section">
                            <div class="news-pagination" id="pagination">
                                {{ $teacher->appends(request()->all())->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="{{ url('assets/js/home.js?'.config('custom.version')) }}"></script>
@stop
