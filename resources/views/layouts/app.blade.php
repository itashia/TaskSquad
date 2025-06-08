<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> میزکار {{$title ?? ''}}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    {{ $styles ?? '' }}
    @yield('styles')
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <main class="container">
            <div class="mt-3">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Menu Toggle Script -->
{{ $scripts ?? '' }}
</body>
</html>
