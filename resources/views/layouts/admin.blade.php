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
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    @livewireStyles
</head>
<body>
<div class="d-flex" id="wrapper">
    @include('livewire.support.admin.inc.sidebar')
    <!-- Page Content -->
    <div id="page-content-wrapper">
        @include('livewire.support.admin.inc.navbar')
        <main class="container">
            <div class="mt-3">
                {{$slot}}
            </div>
        </main>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Menu Toggle Script -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
{{--<script src="{{asset('js/ckeditor.js')}}"></script>--}}
<script src="{{asset('js/sweetalert2.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.addEventListener('toastr:success', event => {
            toastr.success(event.detail.message);
        });
        window.addEventListener('toastr:warning', event => {
            toastr.warning(event.detail.message);
        });
        window.addEventListener('toastr:info', event => {
            toastr.info(event.detail.message);
        });
        window.addEventListener('toastr:error', event => {
            toastr.error(event.detail.message);
        });
        toastr.options = {
            "progressBar": true,
            "positionClass": "toast-top-left",
        };
    });
</script>

@livewireScripts
<x-livewire-alert::scripts />
</body>
</html>
