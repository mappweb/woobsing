<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('templates/css/styles.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12" role="main">
            @yield('content')
        </div>
    </div>
    <div id="modal-add"></div>
</div>
<script src="{{ mix('templates/js/app.js') }}"></script>
@yield('js')
</body>
</html>
