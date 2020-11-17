<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Scuper: Drone based delivery</title>
</head>
<body class="bg-blue-400 align-content-center">
<div id="app" class="container mx-auto px-4 bg-white mt-5 rounded-2xl text-gray-800">
    <img src="/drone.svg" class="w-20 m-5 float-left"/>
    <h1 class="font-bold text-5xl text-blue-900">Scüper</h1>
    <h2 class="text-2xl">The worlds first drone delivered ice cream service</h2>

    <hr class="mt-5 mb-5 "/>
    <app></app>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
