<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TaskSquad</title>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    </head>
    <body>
        <main class="container">
            <div class="text-center">
                <div style="margin-top: 200px">
                    <figure>
                        <img src="{{asset('img/Light_TaskSquad.png')}}" alt="" srcset="">
                    </figure>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/admin') }}" class="btn btn-success btn-lg rounded-5"><i class="fa-duotone fa-user"></i> ورود به مدیریت </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-5"><i class="fa-duotone fa-sign-in"></i> ورود </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary btn-lg rounded-5"><i class="fa-duotone fa-user-plus"></i> عضویت</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </main>
    </body>
</html>
