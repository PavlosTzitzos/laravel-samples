<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Underground Web Radio | Show Selection</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/tab.png">

	<link rel="stylesheet" type="text/css" href="../base_css.css">
	<link rel="stylesheet" href="assets/css/css_selection.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

	<style>
		/* Add your custom styles here */
	</style>

	<script>
		$(document).ready(function () {
			$('#showsTable').DataTable({
				lengthChange: false,
				paging: false
			});
		});
	</script>
</head>
<body>

	<div class="page-container">
		<div class="main">
			<header>
				<div class="nav-container">
					<div id="logo" class="one">
						<a href="../frontend/index.html"><img class="logo" src="../assets/img/logo.png"></a>
					</div>
					<div id="branding" class="two">
						<img class="logo" src="../assets/img/banner.png">
					</div>
					<div class="three">
						<nav>
							<ul>
								<li><a href="../frontend/index.html">Αρχική</a></li>
								<li><a href="../frontend/week_schedule.html">Πρόγραμμα</a></li>
								<li><a href="services.html">About us</a></li>
								<li><a href="services.html">Η Γέφυρα</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div id="events">
				<table id="showsTable" class="table table-hover" style="width:100%">
				    <thead class="table-dark">
					    <tr>	
								<th>Όνομα Εκπομπής</th>
								<th>Παραγωγός 1</th>
								<th>Παραγωγός 2</th>
								<th>Παραγωγός 3</th>
								<th>Παραγωγός 4</th>
								<th>On Air</th>
					    </tr>
				    </thead>
				    <tbody>
				    	<?php
						    include('../connect.php');

						    // SQL query
						    $query = "SELECT SHOW_NAME, PRODUCER_1, PRODUCER_2, PRODUCER_3, PRODUCER_4 FROM SHOW_TABLE";
						     
						    // Execute query
						    $result = mysqli_query($con, $query); 

						    if (!$result) {
						        echo("Error description: " . mysqli_error($con));
						    }
						    
						    // Loop through the results
						    while ($row = mysqli_fetch_array($result)) {
						        $showName = $row['SHOW_NAME'];
						        $producer1 = $row['PRODUCER_1'];
						        $producer2 = $row['PRODUCER_2'];
						        $producer3 = $row['PRODUCER_3'];
						        $producer4 = $row['PRODUCER_4'];

						        echo ("<tr>");
						        echo ("<td><div align=\"center\"><strong>$showName</strong></div></td>");
						        echo ("<td><div align=\"center\">$producer1</div></td>");
						        echo ("<td><div align=\"center\">$producer2</div></td>");
						        echo ("<td><div align=\"center\">$producer3</div></td>");
						        echo ("<td><div align=\"center\">$producer4</div></td>");
						        echo ("<td><div align=\"center\"></div></td>");
						        echo ("</tr>");
						    }

						    // Close the database connection
						    mysqli_close($con);
					    ?> 
				    </tbody>
				</table>
			</div>

			<div class="addShowBtnSection">
				<button class="addShowBtn" onclick="addShowForm()"><strong>Προσθήκη</strong></button>
				<button class="TempShowBtn" onclick="addShowForm()"><strong>Προσωρινή Εκπομπή</strong></button>
			</div>

			<div class="addShowPopup">
				<div class="formPopup" id="popupForm" name="insert_show_form">
					<form action="add_show.php" method="POST" class="formContainer">
						<h2>Προσθήκη Νέας Εκπομπής</h2>
						<label for="showName">
							<strong>Όνομα Εκπομπής</strong>
						</label>
						<input type="text" id="showName" placeholder="Όνομα Εκπομπής" name="show_name" required>
						<label for="producer1">
							<strong>Όνομα Παραγωγού 1</strong>
						</label>
						<input type="text" id="producer1" placeholder="Όνομα Παραγωγού" name="producer_1" required>
						<label for="producer2">
							<strong>Όνομα Παραγωγού 2</strong>
						</label>
						<input type="text" id="producer2" placeholder="Όνομα Παραγωγού" name="producer_2">
						<label for="producer3">
							<strong>Όνομα Παραγωγού 3</strong>
						</label>
						<input type="text" id="producer3" placeholder="Όνομα Παραγωγού" name="producer_3">
						<label for="producer4">
							<strong>Όνομα Παραγωγού 4</strong>
						</label>
						<input type="text" id="producer4" placeholder="Όνομα Παραγωγού" name="producer_4">
						<label for="description">
							<strong>Περιγραφή Εκπομπής</strong>
						</label>
						<textarea id="description" name="description" placeholder="Περιγραφή Εκπομπής" rows="4" cols="40"></textarea>
						<button type="submit" class="btn">Προσθήκη</button>
						<button type="button" class="btn cancel" onclick="closeForm()">Ακύρωση</button>
					</form>
				</div>
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
				<div class="copyrights">
					<p>&copy; <?php echo date("Y"); ?> Underground Web Radio</p>
				</div>
			</footer>
		</div>
	</div>

	<script>
		function addShowForm() {
			document.getElementById("popupForm").style.display = "block";
		}

		function closeForm() {
			document.getElementById("popupForm").style.display = "none";
		}

		$(document).ready(function () {
			$('#showsTable').DataTable();
		});
	</script>
</body>
</html>
