<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            ul,li{
                list-style: none;
            }
        </style>
    </head>
    <body>
       <div class="container">
           @yield('content')
       </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
