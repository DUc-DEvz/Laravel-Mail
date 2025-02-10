@extends('layouts.app')

@section('content')
    <div class="container mt-50">
        <h1 class="title">Đăng Ký</h1>

        <form class="form-container" action="{{ route('register') }}" method="POST">
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
                <label for="username">Tên người dùng:<span class="text-danger">( * )</span></label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:<span class="text-danger">( * )</span></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:<span class="text-danger">( * )</span></label>
                <div class="password-container">
                    <input type="password" name="password" id="password" class="form-control">
                    <i class="fa fa-eye password-toggle"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu:<span class="text-danger">( * )</span></label>
                <div class="password-container">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    <i class="fa fa-eye password-toggle"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Đăng Ký</button>
            <div class="text-center mt-20">
                <p>Nếu đã có tài khoản, hãy <a href="{{ route('login.form') }}">đăng nhập</a>.</p>
            </div>
        </form>
    </div>

@endsection
