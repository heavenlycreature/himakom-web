@php
    $currentRoute = Route::currentRouteName();
    $is404 = request()->is('*') && app()->bound('exception') && app('exception') instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo/logo.png') }}" type="image/icon type">
    @vite(['resources/css/app.css','resources/js/app.js' ])
    <title>{{ $title ?? config('app.name') }}</title>
</head>
<body>
        @yield('content')
<script src="https://kit.fontawesome.com/11df88e4bb.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js"></script>
</body>
</html>