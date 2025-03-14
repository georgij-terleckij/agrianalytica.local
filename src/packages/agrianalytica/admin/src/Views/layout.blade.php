<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        nav { background: #333; padding: 10px; }
        nav a { color: white; text-decoration: none; margin-right: 10px; }
    </style>
</head>
<body>

<nav>
    <a href="{{ route('admin.roles.index') }}">Роли</a>
    <a href="{{ route('admin.dashboard') }}">Главная</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
