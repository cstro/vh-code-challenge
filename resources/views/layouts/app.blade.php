<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vegan Hacktavists - @yield('title')</title>
        <link href="/css/app.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <main>
            @yield('content')
        </main>
    </body>
</html>
