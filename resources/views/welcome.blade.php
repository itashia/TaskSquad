<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TaskSquad | سیستم مدیریت وظایف</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
</head>
<body>
    <main class="container">
        <div class="text-center">
            <div class="login-container">
                <figure class="mb-5">
                    <img src="{{asset('img/light.webp')}}" alt="TaskSquad Logo" class="logo">
                </figure>
                <h2 class="mb-4 text-dark">به سیستم مدیریت وظایف خوش آمدید</h2>
                <p class="mb-5 text-muted">برای شروع کار لطفاً وارد حساب کاربری خود شوید</p>
                
                @if (Route::has('login'))
                    <div class="btn-group">
                        @auth
                            <a href="{{ url('/admin') }}" class="btn btn-custom btn-admin">
                                <i class="fa-duotone fa-user btn-icon"></i> ورود به مدیریت
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-custom btn-login">
                                <i class="fa-duotone fa-sign-in btn-icon"></i> ورود
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-custom btn-register">
                                    <i class="fa-duotone fa-user-plus btn-icon"></i> عضویت
                                </a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </main>
</body>
</html>