<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>D E E P W O O D S | Registration</title>
		<meta name="description" content="Deepwoood, the age-old extravagant cultural show, showcasing the beautiful and artistic cultures of MCC">
		<meta name="author" content="Ebenezer Isaac">
		<link rel="icon" type="image/png" href="img/logo_og.png"/>
		<meta name="theme-color" content="#000000">
		<meta name="keywords" content="deepwoods, deep woods, deepwoods mcc, mcc cultural event, mcc event, mcc student union, mcc, deepwoods chennai">
		<meta property="og:title" content="Deepwoods 2021 | MCC" />
		<meta property="og:site_name" content="Click To Register Now">
		<meta property="og:url" content="https://www.ebenezer-isaac.com/demo/deepwoods.in/about.php" />
		<meta property="og:description" content="Extravagant Cultural Show">
		<meta property="og:image" content="https://www.ebenezer-isaac.com/demo/deepwoods.in/img/logo_og.png">
		<meta property="og:image:width" content="490" />
		<meta property="og:image:height" content="490" />
		<meta property="og:type" content="website" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700|Roboto:300,400,500,700|IBM+Plex+Serif:300,400,500,600&display=swap" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		<link rel="stylesheet" href="css/onepage.css" type="text/css" />
		<link rel="stylesheet" href="css/dark.css" type="text/css" />
		<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
		<link rel="stylesheet" href="css/et-line.css" type="text/css" />
		<link rel="stylesheet" href="css/animate.css" type="text/css" />
		<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
		<link rel="stylesheet" href="css/fonts.css" type="text/css" />
		<link rel="stylesheet" href="css/custom.css" type="text/css" />
		<style>
			.form-group > label.error {
				display: block !important;
				text-transform: none;
			}
			.form-group input.valid ~ label.error,
			.form-group input[type="text"] ~ label.error,
			.form-group input[type="email"] ~ label.error,
			.form-group input[type="number"] ~ label.error,
			.form-group select ~ label.error,
			.form-group textarea ~ label.error { display: none !important; }
		</style>
	</head>
	<body class="stretched">
		<div id="wrapper" class="clearfix">
			<?php 
				$page = "Registration";
				include "header.php" 
			?>
			<section id="page-title">
				<div class="container clearfix">
					<h1>Event Registration</h1>
					<span>Deepwoods 2021</span>
				</div>
			</section>
			<section id="content">
				<div class="content-wrap">
					<div class="container clearfix">
						<div class="form-widget">
							<div class="form-result"></div>
							<div class="row">
								<div class="col-lg-12">
									<form class="row" id="event-registration" action="include/form.php" method="post" enctype="multipart/form-data">
										<div class="form-process">
											<div class="css3-spinner">
												<div class="css3-spinner-scaler"></div>
											</div>
										</div>
										<?php
										$servername = "sql290.main-hosting.eu";
										$username = "u117204720_deepwoods";
										$password = "Wj9|10g0oN";
										$dbname = "u117204720_deepwoods";
										$conn = new mysqli($servername, $username, $password, $dbname);
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}?>
										<div class='col-12'>
											<div class="form-group">
												<label>Event Passes</label>
												<select 
													<?php if(isset($_GET["event_type_id"])&&isset($_GET["event_id"])){
														echo " disabled ";
													}
													?>
													class="form-control required" name="event-registration-passes" id="event_type" onchange="javascript:updateEvents(this.value)">
													<option value="">-- Select One --</option>
													<?php
														$sql = "select * from event_type";
														$result = $conn->query($sql);
														while($event = $result->fetch_assoc()) {	
															echo "<option value='".$event["event_type_id"]."'>".$event["name"]."</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group">
												<label>Event Passes</label>
												<select class="form-control required" name="event-registration-passes" id="event_name">
													<option value="">-- Select One --</option>
												</select>
											</div>
										</div>
										<script>
											var select_element = document.getElementById("event_name");
											function updateEvents(event_type_id){
												var xhttp = new XMLHttpRequest();
												xhttp.onreadystatechange = function() {
														if (this.readyState == 4 && this.status == 200) {
												    		var data = this.responseText;
												    		data = data.split("#");
												    		data.pop();
												    		var length = select_element.options.length;
															for (i = length-1; i >= 1; i--) {
																select_element.options[i] = null;
															}
												    		data.forEach(addSelectOption);
												    		<?php
												    			if(isset($_GET["event_type_id"])&&isset($_GET["event_id"])){
												    				$event_type_id = $_GET["event_type_id"];	
																	$event_id = $_GET["event_id"];	
												    				echo "document.getElementById('event_type').selectedIndex = ".$event_type_id.";";
																	echo "document.getElementById('event_name').selectedIndex = document.getElementById('event_".$event_id."').index;";
																}
															?>
														}
													};
													xhttp.open("GET", "event_list.php?event_type_id="+event_type_id, true);
													xhttp.send();
											}
											function addSelectOption(item, index) {
												var option = document.createElement("option");
												item=item.split("_");
												option.value = item[0];
												option.text = item[1];
												option.id = "event_"+item[0];
												select_element.add(option);
											}
											<?php
												if(isset($_GET["event_type_id"])&&isset($_GET["event_id"])){
													$event_type_id = $_GET["event_type_id"];	
													$event_id = $_GET["event_id"];	
													echo "updateEvents($event_type_id);";
												}
											?>
										</script>
										<div class="col-6 form-group">
											<label>First Name:</label>
											<input type="text" name="event-registration-first-name" id="event-registration-first-name" class="form-control required" value="" placeholder="Enter your First Name">
										</div>
										<div class="col-6 form-group">
											<label>Last Name:</label>
											<input type="text" name="event-registration-last-name" id="event-registration-last-name" class="form-control required" value="" placeholder="Enter your Last Name">
										</div>
										<div class="col-12 form-group">
											<label>Email:</label>
											<input type="email" name="event-registration-email" id="event-registration-email" class="form-control required" value="" placeholder="Enter your Email Address">
										</div>
										<div class="col-12">
											<div class="form-group">
												<label>How did you hear about the Event?</label>
												<select class="form-control required" name="event-registration-know-us" id="event-registration-know-us">
													<option value="">-- Select One --</option>
													<option value="Google">Google</option>
													<option value="Social Media">Social Media</option>
													<option value="Friends">Friends</option>
													<option value="Advertisement">Advertisement</option>
													<option value="Others">Others</option>
												</select>
											</div>
										</div>
										<div class="col-12 d-none">
											<input type="text" id="event-registration-botcheck" name="event-registration-botcheck" value="" />
										</div>
										<div class="col-12">
											<button type="submit" name="event-registration-submit" class="btn btn-secondary">Register</button>
												<a class='btn btn-secondary' href="javascript:window.location.replace(location.protocol + '//' + location.host + location.pathname);">Reset</a>
										</div>
										<input type="hidden" name="prefix" value="event-registration-">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php 
				include "footer.php" 
			?>
		</div>
		<div id="gotoTop" class="icon-angle-up"></div>
		<script src="js/jquery.js"></script>
		<script src="js/plugins.min.js"></script>
		<script src="js/functions.js"></script>
		<script>
			jQuery(document).ready( function(){
				
			})
		</script>
	</body>
</html>