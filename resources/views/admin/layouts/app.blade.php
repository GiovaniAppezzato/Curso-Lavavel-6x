<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- ===== Google Fonts ===== --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    {{-- ===== CSS ===== --}}
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    @stack('styles')

    <title>@yield('titulo')</title>
</head>
<body>
    @yield('conteudo')

    @stack('scripts')
</body>
</html>
