
<!-- One page dynamic site 
* to add new page :
1. add a new division 
2. add css
3. add js
4. edit jquery.js file
* test it
-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Web Radio | Home</title>
	<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

	<link rel="stylesheet" href="../base_css_Final.css">
	<link rel="stylesheet" href="assets/css/homepage.css">
	
	<!-- CSS for player only -->
	<link rel="stylesheet" href="assets/css/player.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
							<img class="logo" src="..\assets\img\logo.png">
						</div>
						<div id="branding" class="two">
							<img class="logo" src="..\assets\img\banner.png">
						</div>
						<div class="three">
							<nav class = "slide-in menu menu_open navbar_nav">
								  <ul class="menu_open navbar_ul">
										<li class="menu_li home_nav current"><a href="#" class="menu_a" onclick="fun1()">Αρχική</a></li>
										<li class="menu_li schedule_nev"><a href="#" class="menu_a" onclick="fun2()">Πρόγραμμα</a></li>
										<li class="menu_li about_nav"><a href="#" class="menu_a" onclick="fun3()">About us</a></li>
										<li class="menu_li gefyra_nav"><a href="#" class="menu_a" onclick="fun4()">Η Γέφυρα</a></li>
									</ul>
							</nav>
						</div>
					</div>
			</header>

			<!-- contains of home page (1)-->
			<div class = "home" id = "home" style="display:block;">
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
						<script id="cid0020000320624200049" data-cfasync="false" async src="http://st.chatango.com/js/gz/emb.js" style="width: 100%;height: 100%;">
							{
								"handle":"undergroundradiochat",
								"arch":"js",
								"styles":
								{
									"a":"ff9900",
									"b":100,
									"c":"000000",
									"d":"000000",
									"k":"ff9900",
									"l":"ff9900",
									"m":"ff9900",
									"p":"10",
									"q":"ff9900",
									"r":100,
									"fwtickm":1
								}
							}
						</script>
				</div>
			</div>

			<!-- contains of program page (2)-->
			<div class = "program" id = "program" style="display:none;">
				<h3>Πρόγραμμα Εβδομάδας</h3>

					<div class="tab">
					<button class="tablinks" onclick="openDay(event, 'Monday')">Δευτέρα</button>
					<button class="tablinks" onclick="openDay(event, 'Tuesday')">Τρίτη</button>
					<button class="tablinks" onclick="openDay(event, 'Wednesday')">Τετάρτη</button>
					<button class="tablinks" onclick="openDay(event, 'Thursday')">Πέμπτη</button>
					<button class="tablinks" onclick="openDay(event, 'Friday')">Παρασκευή</button>
					<button class="tablinks" onclick="openDay(event, 'Saturday')">Σάββατο</button>
					<button class="tablinks" onclick="openDay(event, 'Sunday')">Κυριακή</button>
					</div>

					<div id="Monday" class="tabcontent">
					<h4>Δευτέρα</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Δευτέρας.</p>
					</div>

					<div id="Tuesday" class="tabcontent">
					<h4>Τρίτη</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Τρίτης.</p> 
					</div>

					<div id="Wednesday" class="tabcontent">
					<h4>Τετάρτη</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Τετάρτης.</p>
					</div>

					<div id="Thursday" class="tabcontent">
					<h4>Πέμπτη</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Πέμπτης.</p>
					</div>

					<div id="Friday" class="tabcontent">
					<h4>Παρασκευή</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Παρασκευής.</p> 
					</div>

					<div id="Saturday" class="tabcontent">
					<h4>Σάββατο</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα του Σαββάτου.</p>
					</div>

					<div id="Sunday" class="tabcontent">
					<h4>Κυριακή</h4>
					<p>Εδώ θα εμφανίζεται το πρόγραμμα της Κυριακής.</p>
					</div>

					<script>
					function openDay(evt, dayName) {
					var i, tabcontent, tablinks;
					tabcontent = document.getElementsByClassName("tabcontent");
					for (i = 0; i < tabcontent.length; i++) {
						tabcontent[i].style.display = "none";
					}
					tablinks = document.getElementsByClassName("tablinks");
					for (i = 0; i < tablinks.length; i++) {
						tablinks[i].className = tablinks[i].className.replace(" active", "");
					}
					document.getElementById(dayName).style.display = "block";
					evt.currentTarget.className += " active";
					}
					</script>
			</div>

			<!-- contains of about page (3)-->
			<div class = "about" id = "about" style="display:none;">
				<h1>About Underground Webradio !!</h1>
					<p>We are some pretty boys looking for some fun !</p>
			</div>

			<!-- contains of gefyra page (4)-->
			<div class = "gefyra" id = "gefyra" style="display:none;">
				<h1>About Gefyra !!</h1>
					<p>We like bridges !! </p>
			</div>

			<!-- footer for every page -->
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
		<div id="chart" class="chart-container" style="display:block;">
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



	<!--Player division for every page-->
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
			
		</div>
		
		<!-- (C) TIME -->
		<!--<div id="aCron">
		  <span id="aNow"></span> / <span id="aTime"></span>
		</div>-->
		<!-- (D) SEEK BAR -->
		<!--<input id="aSeek" type="range" min="0" value="0" step="1" disabled/>-->
		<!-- (E) VOLUME SLIDE -->
		<span id="aVolIco" class="material-icons">volume_up</span>
		<input id="aVolume" type="range" min="0" max="1" value="1" step="0.1" disabled/>
	</div>

</body>
</html>