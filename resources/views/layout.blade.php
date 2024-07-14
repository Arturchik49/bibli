<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">
<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
    <h1><a href="/home" class=" align-items-center text-white">
            <span class="fs-4">Библиотека</span>
        </a>
    </h1>
    <nav class="mt-2 mt-md-0 ms-md-auto">
        <a class="p-2 text-white" href="/spisok">Список книг</a>
        <a class="p-2 text-white" href="/bron">Забронировать книгу</a>
    </nav>
</div>
<div class="container">
    @yield('main_content')
</div>
</body>
</html>
