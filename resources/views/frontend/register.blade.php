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
                            <h1>Chào bạn!</h1>
                            <p>Bạn đã có tài khoản. Đăng nhập tại đây để tham gia cùng chúng tôi.</p>
                            <a href="{{ feRoute('login') }}"><button class="ghost" id="signIn">Đăng nhập</button></a>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <form method="POST" action="{{ feRoute('register.post') }}">
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

                            <h1>Đăng kí</h1>

                            <input type="text" name="name" placeholder="Nhập tên" class="form-control" value="{{ old('name') }}" required>
                            <input type="email" name="email" placeholder="Nhập email" class="form-control" value="{{ old('email') }}" required>
                            <input type="number" name="phone" placeholder="Nhập SĐT" class="form-control" value="{{ old('phone') }}" required>
                            <input type="password" name="password" placeholder="Nhập mật khẩu" class="form-control" value="" required>
                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu" class="form-control" value="" required>

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
