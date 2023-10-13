<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Web Radio | Πρόγραμμα</title>
	<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

	<link rel="stylesheet" href="../base_css.css">
	<link rel="stylesheet" href="assets/css/schedule.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
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
								<li><a href="index.html">Αρχική</a></li>
								<li class="current"><a href="week_schedule.html">Πρόγραμμα</a></li>
								<li><a href="services.html">About us</a></li>
								<li><a href="services.html">Η Γέφυρα</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			
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