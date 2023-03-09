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
                            <p>Nếu bạn chưa có tài khoản. Vui lòng tạo tài khoản tại đây để tham gia cùng chúng tôi.</p>
                            <a href="{{ feRoute('register') }}"><button class="ghost" id="signIn">Đăng kí</button></a>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <form method="POST" action="{{ feRoute('login.post') }}">
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

                            <h1>Đăng nhập</h1>

                            <input placeholder="Nhập email" type="text" class="form-control"
                                   name="email" value="{{ old('email') }}" autocomplete="name" autofocus required>

                            <input type="password" name="password" class="form-control" required>

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
