<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')

    <title>@yield('titulo')</title>
</head>
<body>
    @yield('conteudo')

    @stack('scripts')
</body>
</html>