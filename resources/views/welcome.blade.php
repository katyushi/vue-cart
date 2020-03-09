<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>bem-vindo</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />
    </head>
    <body>
        <div id="app">
            <img src="https://stayhipp.com/wp-content/uploads/2020/01/helo-fish-.jpg" alt="helo.jpg">
            <a onclick="window.location='{{ url("/post") }}'" class="cursor-pointer bg-blue-600 hover:bg-blue-500 shadow-xl px-5 py-2 inline-block text-blue-100 hover:text-white rounded">post</a>
        </div>
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
