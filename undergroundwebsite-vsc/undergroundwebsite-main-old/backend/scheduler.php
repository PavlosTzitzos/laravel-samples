<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Radio | Scheduler</title>
	<link rel="shortcut icon" type="image/x-icon" href="..\assets\img\tab.png">

	<link rel="stylesheet" href="../base_css.css">
	<link rel="stylesheet" href="assets/css/scheduler.css">

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
								<li><a href="..\frontend\index.html">Αρχική</a></li>
								<li><a href="about.html">Πρόγραμμα</a></li>
								<li><a href="services.html">About us</a></li>
								<li><a href="services.html">Η Γέφυρα</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<h2>Πρόγραμμα Εβδομάδας</h4>

			<div id="scheduler">
				<h4>Μόνιμες Εκπομπές</h2>
				<form>
					<table id="scheduleTable" class="table table-hover tbl_code_with_mark" style="width:100%">
					    <thead class="table-dark">
						    <tr>
						        <th>Ημέρα</th>
								<th>Ώρα Έναρξης</th>
								<th>Ώρα Λήξης</th>
								<th>Εκπομπή</th>
								<th>Επιλογές</th>
						    </tr>
					    </thead>
					    <tbody>
						    <tr>
						        <td>
						        	<div class="form-group">
										<select name="dayChoice" class="form-control" id="dayOfWeeek">  
											<option value="">Επιλογή Ημέρας</option>
											<option value="MON">Δευτέρα</option>
											<option value="TUE">Τρίτη</option>
											<option value="WED">Τετάρτη</option>
											<option value="THU">Πέμπτη</option>
											<option value="FRI">Παρασκευή</option>
											<option value="SAT">Σάββατο</option>
											<option value="SUN">Κυριακή</option>
										</select>
									</div>
						        </td>
						        <td><input type="time" id="startTime" name="showTime"></td>
						        <td><input type="time" id="startTime" name="showTime"></td>
						        <td>
									<select class="form-control" id="show">  
										<option value="">Επιλογή Εκπομπής</option>
										<option value="RH">Rock Hour</option>
										<option value="PCS">Post Covid Show</option>
										<option value="XMZ">X METAL ZONE</option>
										<option value="MM">Mix & Match</option>
										<option value="EBS">Ε Μωρό Σόρι</option>
										<option value="PV">Πλαστικά Βινύλια</option>
										<option value="BL">Blender</option>
									</select>
						        </td>
						        <td>
						        	<input type="button" class="addNew" value="Προσθήκη Σειράς">
			      				</td>
			      			</tr>
					    </tbody>
					</table>
				</form>
			</div>

			<div id="temp_shows">
				<h4>Προσωρινές Εκπομπές</h4>

				<form>
					<table id="scheduleTable" class="table table-hover tbl_code_with_mark" style="width:100%">
					    <thead class="table-dark">
						    <tr>
						        <th>Ημέρα</th>
								<th>Ώρα Έναρξης</th>
								<th>Ώρα Λήξης</th>
								<th>Όνομα Εκπομπής</th>
								<th>Παραγωγός 1</th>
								<th>Παραγωγός 2</th>
								<th>Παραγωγός 3</th>
								<th>Παραγωγός 4</th>
								<th>Επιλογές</th>
						    </tr>
					    </thead>
					    <tbody>
						    <tr>
						        <td>
						        	<div class="form-group">
										<select class="form-control" id="dayOfWeeek">  
											<option value="">Επιλογή Ημέρας</option>
											<option value="MON">Δευτέρα</option>
											<option value="TUE">Τρίτη</option>
											<option value="WED">Τετάρτη</option>
											<option value="THU">Πέμπτη</option>
											<option value="FRI">Παρασκευή</option>
											<option value="SAT">Σάββατο</option>
											<option value="SUN">Κυριακή</option>
										</select>
									</div>
						        </td>
						        <td><input type="time" id="startTime" name="showTime"></td>
						        <td><input type="time" id="startTime" name="showTime"></td>
						        <td><input type="text" id="tempShowName" name="tempShowName"></td>
								<td><input type="text" id="producer1" name="producer1"></td>
								<td><input type="text" id="producer2" name="producer2"></td>
								<td><input type="text" id="producer3" name="producer3"></td>
								<td><input type="text" id="producer4" name="producer4"></td>
						        <td>
						        	<input type="button" class="addNew" value="Προσθήκη Σειράς">
			      				</td>
			      			</tr>
					    </tbody>
					</table>
				</form>

			</div>

			<div class="submitBtnDiv">
				<button class="submitBtn">Υποβολή</button>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<script src="assets/js/scheduler.js"></script>

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
		<!--
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
	-->
	</div>
</body>
</html>