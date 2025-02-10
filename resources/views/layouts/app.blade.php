<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Mừng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @yield('style')

</head>

<body>
    <header class="bg-primary text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="m-0 logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></h1>
            <nav>
                <ul class="nav">
                    <li>
                        <a href="{{ route('home') }}" class="btn btn-success btn-sm">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('order') }}" class="btn btn-success btn-sm">Đơn Hàng</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('invoice') }}" class="btn btn-success btn-sm">Hóa Đơn</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-warning btn-sm">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-warning btn-sm">Đăng Ký</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <form class="d-inline" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger logout-button"> Đăng Xuất</button>
                            </form>
                        </li>
                        <li class="nav-item position-relative">
                            <a href="{{ route('notifications.index') }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-bell"></i></a>
                            @if (isset($unreadCount) && $unreadCount > 0)
                                <span style="position: absolute;top: -5px;right: -5px;"
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $unreadCount }}
                                </span>
                            @endif
                        </li>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    @yield('content')

    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')

</body>

</html>
