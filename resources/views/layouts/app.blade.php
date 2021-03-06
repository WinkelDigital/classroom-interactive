<!doctype html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <title>Class Interactive</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary flex-row">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Class Interactive
                </a>
                <button class="navbar-toggler ml-lg-0" type="button" data-toggle="collapse" data-target="#navbarContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                @include('layouts.nav.dashboard')
            </div>
        </nav>
        <div class="main">
            <div class="container">
                @if ($message = Session::get('flash_message'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
        <footer class="footer"></footer>
        <script src="/js/app.js"></script>
    </body>
</html>