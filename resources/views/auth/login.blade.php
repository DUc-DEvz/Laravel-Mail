@extends('layouts.app')

@section('content')
    <div class="container mt-50">
        <h1 class="title">Đăng Nhập</h1>

        <form class="form-container" action="{{ route('login') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="email">Email: <span class="text-danger">( * )</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu: <span class="text-danger">( * )</span></label>
                <div class="password-container">
                    <input type="password" name="password" id="password" class="form-control">
                    <i class="fa fa-eye password-toggle"></i>
                </div>
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit" class="btn btn-primary">Đăng Nhập</button>

            <div class="text-center mt-20">
                <p><a href="{{ route('password.request') }}">Quên mật khẩu?</a></p>
            </div>

            <div class="text-center mt-20">
                <p>Nếu chưa có tài khoản, hãy <a href="{{ route('register.form') }}">đăng ký ngay</a>.</p>
            </div>
        </form>
    </div>

@endsection
