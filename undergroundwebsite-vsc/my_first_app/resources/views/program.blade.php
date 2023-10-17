<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Underground Web Radio</title>
        <link rel="shortcut icon" type="image/x-icon" href="../img/tab.png" />

        <link rel="stylesheet" href="../css/base_css.css" />
        <link rel="stylesheet" href="../css/homepage.css" />

        <!-- CSS for player only -->
        <link rel="stylesheet" href="../css/player.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

        <!-- Player in header : when an event occurs like play or pause button click -->
        <script type="text/javascript" src="../js/player.js"></script>
    </head>
<body>
    <div class="page-container">
        <header>
            <div class="nav-container">
                <div id="logo" class="one">
                    <img class="logo" src="../img/logo.png" />
                </div>
                <div id="branding" class="two">
                    <img class="logo" src="../img/banner.png" />
                </div>
                <div class="three">
                    <nav>
                        <ul class="menu_open navbar_ul">
                            <li class="menu_li home_nav current"><a href="#" class="menu_a" onclick="fun1()">Αρχική</a></li>
                            <li class="menu_li schedule_nev"><a href="#" class="menu_a" onclick="fun2()">Πρόγραμμα</a></li>
                            <li class="menu_li about_nav"><a href="#" class="menu_a" onclick="fun3()">About us</a></li>
                            <li class="menu_li gefyra_nav"><a href="#" class="menu_a" onclick="fun4()">Η Γέφυρα</a></li>
                        </ul>
                    </nav>
                    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                                @endauth
                            </div>
                        @endif
                </div>
            </div>
        </header>

        <footer class="footer">
            <div class="footdiv">
                <div class="contact-details">
                    <h4>Επικοινωνία</h4>
                    <ul>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Πανεπιστημιούπολη, Ξάνθη, 671 00</li>
                        <li><i class="fa fa-envelope" aria-hidden="true"></i> underground1003@gmail.com</li>
                    </ul>
                </div>
                <div class="social-menu">
                    <ul>
                        <li><a href="https://www.facebook.com/undergroundradio1003"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.instagram.com/undergroundwebradio/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://open.spotify.com/user/waiae01koht4ne4kntsj58ixq?si=8ba8a5841aee41df"><i class="fa fa-spotify"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyrights"><p>Copyright © 2023 Underground Web Radio</p></div>
        </footer>
    </div>
</body>
</html>
