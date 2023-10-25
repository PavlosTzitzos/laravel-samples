<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
        <title>Laravel Livewire 8 Dynamically Add/Remove Input Fields - Tutsmake.com</title>
 
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
 
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
 
            .full-height {
                height: 100vh;
            }
 
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
 
            .position-ref {
                position: relative;
            }
 
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
 
            .content {
                text-align: center;
            }
 
            .title {
                font-size: 84px;
            }
 
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
 
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
<body>
    <div class="container mt-5">
        <div class="row mt-5 justify-content-center">
            <div class="mt-5 col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white"><h5 style="font-size: 19px;">Laravel Livewire 8 Dynamically Add/Remove Input Fields - Tutsmake.com</h5></div>
 
                    <div class="card-body">
                        @livewire('employees')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>