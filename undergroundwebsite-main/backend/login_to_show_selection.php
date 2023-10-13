<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Web Radio | Show Selection</title>
	<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

	<link rel="stylesheet" href="../base_css.css">
	<link rel="stylesheet" href="assets/css/login_to_show_selection.css">
	<link rel="stylesheet" href="assets/css/css_selection.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
</head>
<body>
	<div class="page-container">
		<div class="main">
			<header>
				<div class="nav-container">
					<div id="logo" class="one">
						<a href="..\frontend\index.html"><img class="logo" src="..\assets\img\logo.png"></a>
					</div>
					<div id="branding" class="two">
						<img class="logo" src="..\assets\img\banner.png">
					</div>
					<div class="three">
						<nav>
							<ul>
								<li><a href="..\frontend\index.php">Αρχική</a></li>
								<li><a href="about.html">Πρόγραμμα</a></li>
								<li><a href="services.html">About us</a></li>
								<li><a href="services.html">Η Γέφυρα</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div class="container">
		      <label for="uname"><b>Username</b></label>
		      <input type="text" placeholder="Enter Username" name="uname" required>

		      <label for="psw"><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="psw" required>
		        
		      <button type="submit">Login</button>
		      <label>
		        <input type="checkbox" checked="checked" name="remember"> Remember me
		      </label>
		   </div>

		   <footer class="footer">
				<div class="footdiv">
					<div class="contact-details">
						<ul>
							<h4>Επικοινωνία</h4>
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
		<div class="chart-container">
			<header>
				<h3>Top 10 Worldwide</h3>
			</header>
			<div class="top-10">
				<table class="table table-striped table-hover" bgcolor="white">
					<tbody>
						<?php
							$url = "http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=e4ffee52f0b5158b8bf5b995ffb6bb60&limit=10&format=json";
							$json = file_get_contents($url);
							$json_data = json_decode($json, true);


							for($i=0; $i<10; $i++){
								$u = $i + 1;
								echo("<tr><td><h5>$u.</h5></td><td>");
								$trackName = trim(json_encode($json_data["tracks"]["track"][$i]["name"]),"\"");
								$Artist = trim(json_encode($json_data["tracks"]["track"][$i]["artist"]["name"]), "\"");
								$lastUrl = str_replace("/","",trim(json_encode($json_data["tracks"]["track"][$i]["url"]),"/ "));
								echo("<h5> $trackName - $Artist</h5></td><td><a href=$lastUrl><img id=\"lastfm\" src=\"assets/img/lastfm.png\"></a></td></tr>");
							}
						?>
					</tbody>
				</table>
			</div>
			<footer class="footer">
			</footer>
		</div>
	</div>
</body>
</html>