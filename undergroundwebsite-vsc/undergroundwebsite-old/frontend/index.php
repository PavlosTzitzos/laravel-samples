<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Web Radio | Home</title>
	<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

	<link rel="stylesheet" href="assets\css\homepage.css">
	<link rel="stylesheet" href="..\base_css.css">

	<<!-- CSS for player only -->
	<link rel="stylesheet" href="assets/css/player.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<!-- Player in header : when an event occurs like play or pause button click -->
	<script type = "text/javascript" src = "assets/js/player.js"></script>

	<!-- To make a dynamic site use jquery -->
	<script type = "text/javascript" src = "assets/js/jquery.js"></script>
	<!-- also needs to load the jquery library -->
	<script type ="text/javascript" src = "assets/js/jquery-3.6.4.js"></script>


</head>
<body>
	<div class="page-container">
		<div class="main">
		<header>
				<div class="nav-container">
					<div id="logo" class="one">
						<a href="index.html"><img class="logo" src="..\assets\img\logo.png"></a>
					</div>
					<div id="branding" class="two">
						<img class="logo" src="..\assets\img\banner.png">
					</div>
					<div class="three">
						<nav>
							<ul>
								<li class="current"><a href="index.html">Αρχική</a></li>
								<li><a href="week_schedule.html">Πρόγραμμα</a></li>
								<li><a href="services.html">About us</a></li>
								<li><a href="services.html">Η Γέφυρα</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<div class="shows">
				<div id="now-playing">
					<div class="show-logo">
						<img src="assets/img/pcs_logo.png">
					</div>
					<div class="bottom-text">
						<h2>Now On-Air</h2>
						<h4>Songs for the Deaf</h4>
						<div class="producers-broadcast">
							<h6>Παραγωγός 1</h6>
							<h6>Παραγωγός 2</h6>
							<h6>Παραγωγός 3</h6>
							<h6>Παραγωγός 4</h6>
						</div>
					</div>
				</div>
				<div id="coming-next">
					<div class="show-logo">
						<img src="assets/img/pcs_logo.png">
					</div>
					<div class="bottom-text">
						<h2>Coming Next</h2>
						<h4>X METAL ZONE</h4>
						<div class="producers-broadcast">
							<h6>Παραγωγός 1</h6>
							<h6>Παραγωγός 2</h6>
							<h6>Παραγωγός 3</h6>
							<h6>Παραγωγός 4</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="chatango">
				<script id="cid0020000320624200049" data-cfasync="false" async src="http://st.chatango.com/js/gz/emb.js" style="width: 100%;height: 100%;">{"handle":"undergroundradiochat","arch":"js","styles":{"a":"ff9900","b":100,"c":"000000","d":"000000","k":"ff9900","l":"ff9900","m":"ff9900","p":"10","q":"ff9900","r":100,"fwtickm":1}}</script>
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

	<!--Player division -->
	<div id="aWrap">
		<!-- (B) PLAY/PAUSE BUTTON -->
		<button id="aPlay" disabled><span id="aPlayIco" class="material-icons">
			play_arrow
		</span></button>
		
		<!-- Division for artwork -->
		<div>
			<img id="aArtWork" alt="Album Artwork" src="assets/img/pcs_logo.png" style="width:40px;height:40px;">
		</div>
		<!-- Division for Song Title and Artist -->
		<div>
			<span id="aSongTitle" class="song">title</span>
			<span id="aArtist" class="song">artist</span>
		</div>
		
		<!-- (C) TIME -->
		<!--<div id="aCron">
		  <span id="aNow"></span> / <span id="aTime"></span>
		</div>-->
		<!-- (D) SEEK BAR -->
		<!--<input id="aSeek" type="range" min="0" value="0" step="1" disabled/>-->
		<!-- (E) VOLUME SLIDE -->
		<button id="aMute"><span id="aVolIco" class="material-icons">
			volume_up
		</span></button>
		<input id="aVolume" type="range" min="0" max="1" value="0.5" step="0.1" disabled/>
	</div>
</body>
</html>