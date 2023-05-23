<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite (['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
   @include('layout/partials/nav')
    @yield('content')
    @include('layout/partials/footer')
</body>
</html>