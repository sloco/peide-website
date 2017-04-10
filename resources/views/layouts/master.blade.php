<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('partials.nav')

    @yield('hero')

    <div class="container">
        <div class="section">
            @yield('content')
        </div>
    </div>

    @include('partials.footer')

    <script src="/js/app.js"></script>
</body>
</html>