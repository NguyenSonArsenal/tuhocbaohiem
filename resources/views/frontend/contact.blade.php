@extends('layouts.frontend.main')

@push('script')
    <script src="{{ asset('assets/js/pages/lienhe.js') }}"></script>
@endpush

@push('styles')
    <link href="{{ asset('frontend/assets/css/lien-he.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="sign-inout-wrapper">
        <div class="container">
            <div class="contact_wrapper">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contact-left">
                            <h1>Chào mừng bạn đến với chúng tôi!</h1>
                            <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                            <a href="{{ feRoute('login') }}"><button class="ghost" id="signIn">Đăng nhập</button></a>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <form method="POST" action="{{ feRoute('contact.post') }}">
                            @csrf
                            <div class="w-100">
                                @include('layouts.frontend.structures._notification2')
                            </div>

                            <div class="form-group">
                                <div class="error-validate text-left">
                                    @if ($errors->any())
                                        <div class="error alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <h1>Liên hệ</h1>

                            <span>Gửi tin nhắn tới chúng tôi</span>

                            <input placeholder="Họ Tên" id="name" type="text"
                                   class="form-control"
                                   name="name" value="" autocomplete="name" autofocus required>

                            <input placeholder="SDT: 0912312312" id="phone_number" type="number"
                                   class="phone-inputmask form-control"
                                   name="phone" value=""
                                   autocomplete="phone_number" autofocus required>

                            <input placeholder="email@gmail.com" id="email" type="email"
                                   class="form-control" name="email"
                                   value=""  autocomplete="email" required>

                            <input placeholder="Tin nhắn của bạn" id="message" name="message" type="text" value="" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Gửi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script src="{{ url('assets/js/home.js?'.config('custom.version')) }}"></script>
@stop
