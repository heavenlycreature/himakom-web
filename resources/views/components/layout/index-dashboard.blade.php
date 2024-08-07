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
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
      .trix-content ul {
          list-style-type: disc !important;
          padding-left: 2.5em !important;
      }
      .trix-content ol {
          list-style-type: decimal !important;
          padding-left: 2.5em !important;
      }
      .trix-content ul li, .trix-content ol li {
          display: list-item !important;
      }
  </style>
  </head>
  <body>
    <x-sidebar />
    <div class="p-4 sm:ml-64">
      @yield('content')
    </div>
<script src="https://kit.fontawesome.com/11df88e4bb.js" crossorigin="anonymous"></script>
</body>
</html>