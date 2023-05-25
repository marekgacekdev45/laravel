<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    @vite (['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
   @include('layout/partials/nav')
   <main class="page">
       @yield('content')

   </main>
    @include('layout/partials/footer')
</body>
</html>