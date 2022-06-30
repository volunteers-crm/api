<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="x-dns-prefetch-control" content="on">

    {!! SEO::generate() !!}
</head>
<body>

<x-navbar />

{!! $slot !!}

@vite('resources/js/app.js')

</body>
</html>
