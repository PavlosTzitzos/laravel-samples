<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel EventStream</title>

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>

        <ul id="list-messages">

        </ul>

        <form id="form">
            <label for="input-message">Message:</label>
            <input id="input-message" type="text">
        </form>
        <!--<script src="{{ asset('resources/js/app.js') }}"></script>-->
        <!--<script src="resources/js/app.js"></script>-->
        @vite('resources/js/app.js')
    </body>

</html>
