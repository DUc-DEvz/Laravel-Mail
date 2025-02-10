@extends('layouts.app')

@section('content')
    <div class="container  mt-5">
        @guest
            <h1 class="title">Chào mừng!</h1>
            <p class="lead text-center">Bạn chưa đăng nhập.</p>
        @else
            <h1 class="title">Chào mừng, {{ Auth::user()->username }}!</h1>
            <p class="lead text-center">Bạn đã đăng nhập thành công.</p>

        @endguest
    </div>
@endsection
