<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Class Interactive</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/css/app.css">
    </head>
    <body>
        @include('layouts.nav.frontpage')
        @yield('content')
        <footer class="footer">
            <div class="container py-5">
                <div class="row">
                </div>
            </div>
                
        </footer>
            
        <script src="/js/app.js"></script>
    </body>
</html>