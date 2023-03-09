@extends('layouts.frontend.main')

@push('script')
    <script src="{{ asset('frontend/assets/js/pages/home.js') }}"></script>
@endpush

@push('styles')
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div id="slideBanner" class="swiper-container swiper-banner">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slide-item">
                        <div class="overlay-bg"></div>
                        <img src="{{ asset('frontend/assets/images/home-slider/home-bg.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide slide-item">
                        <div class="overlay-bg"></div>
                        <img src="{{ asset('frontend/assets/images/home-slider/home-bg1.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide slide-item">
                        <div class="overlay-bg"></div>
                        <img src="{{ asset('frontend/assets/images/home-slider/home-bg2.jpg') }}" alt="">
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div style="padding: 100px 0">
            comming soon
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ url('assets/js/home.js?'.config('custom.version')) }}"></script>
@stop
