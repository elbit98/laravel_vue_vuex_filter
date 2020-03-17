<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>Realtime search</title>
</head>
<body>


<div id="app">

    <div class="container">
        <dashboard></dashboard>
    </div>

</div>

<script async src="{{mix('js/app.js')}}"></script>

</body>

</html>
