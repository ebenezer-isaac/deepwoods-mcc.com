<!DOCTYPE html>
<html dir="ltr" lang="en-US">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>D E E P W O O D S | Gallery</title>
		<meta name="description" content="Deepwoood, the age-old extravagant cultural show, showcasing the beautiful and artistic cultures of MCC">
		<meta name="author" content="Ebenezer Isaac">
		<link rel="icon" type="image/png" href="img/logo_og.png"/>
		<meta name="theme-color" content="#000000">
		<meta name="keywords" content="deepwoods, deep woods, deepwoods mcc, mcc cultural event, mcc event, mcc student union, mcc, deepwoods chennai">
		<meta property="og:title" content="Deepwoods 2021 | MCC" />
		<meta property="og:site_name" content="Click To Register Now">
		<meta property="og:url" content="https://www.deepwoods-mcc.com/about.php" />
		<meta property="og:description" content="Extravagant Cultural Show">
		<meta property="og:image" content="https://www.deepwoods-mcc.com/img/logo_og.png">
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
			#myImg {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				padding-top: 100px; /* Location of the box */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			}

			/* Modal Content (image) */
			.modal-content {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
			}

			/* Caption of Modal Image */
			#caption {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
				text-align: center;
				color: #ccc;
				padding: 10px 0;
				height: 150px;
			}

			/* Add Animation */
			.modal-content, #caption {	
				-webkit-animation-name: zoom;
				-webkit-animation-duration: 0.6s;
				animation-name: zoom;
				animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
				from {-webkit-transform:scale(0)} 
				to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
				from {transform:scale(0)} 
				to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
				position: absolute;
				top: 15px;
				right: 35px;
				color: #f1f1f1;
				font-size: 40px;
				font-weight: bold;
				transition: 0.3s;
			}

			.close:hover,
			.close:focus {
				color: #bbb;
				text-decoration: none;
				cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
				.modal-content {
					width: 100%;
				}
			}
		</style>
	</head>
	<body class="stretched">
		<div id="wrapper" class="clearfix">
			<?php 
				$page = "About";
				include "header.php" 
			?>
			<section id="page-title" style='background:#333333;'>
				<div class="container clearfix">
					<h1 style='color:white'>Image Gallery</h1><br>
					<a href="registration.php" data-scrollto="#section-about" data-offset="70"  data-animate="fadeInUp" data-delay="600" class="button m-0 button-circle button-large text-white" style="background-color: #03A2D0;"><i class="icon-line-arrow-left"></i>Go Home</a>
				</div>
			</section>
			<section id="content" style='background:#333333;'>
				<div class="content-wrap">
					<div class="container clearfix dark">
						<div class="row col-mb-50">
							<div class="col-12 portfolio-single-image">
								<div class="fslider" data-arrows="true" data-animation="slide" style="background-color: black;">
									<div class="flexslider">
										<div class="slider-wrap">
											<?php
												$counter = 1;
												while($counter<=118){
													echo "<div class='slide'><a href='#'><img style='height:720px;object-fit: contain;' src='img/gallery/pic_".
													sprintf('%03d', $counter).".jpg' alt='Image'></a></div>";
													$counter = $counter +1;
												}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="content" style='background:#333333;'>
				<div class="content-wrap">
					<div class="container clearfix">
						<div id="portfolio" class="portfolio row grid-container gutter-30" data-layout="fitRows">
							<?php
								$counter = 1;
								while($counter<=118){?>
									<article class="portfolio-item col-md-4 col-sm-6 col-12 pf-illustrations">
										<div class="grid-inner" style='background:black;'>
											<div class="portfolio-image">
											<?php 
												echo "<a href=\"javascript:enlarge('img_".sprintf('%03d', $counter)."')\">";
													echo "<img id='img_".sprintf('%03d', $counter).
													"' href=\"\" src='img/gallery/pic_".sprintf('%03d', $counter).".jpg' style='height:200px;object-fit: contain;'>";?>
												</a>
											</div>
										</div>
									</article>									
									<?php
									$counter = $counter +1;
								}
							?>
						</div>
					</div>
				</div>
			</section>
			<div id="myModal" class="modal">
				<span class="close">&times;</span>
				<img class="modal-content" id="img_display" style="background:black;max-height: 100%;object-fit: contain;">
			</div>
			<?php 
				include "footer.php" 
			?>
		</div>
		<div id="gotoTop" class="icon-angle-up"></div>
		<script src="js/jquery.js"></script>
		<script src="js/plugins.min.js"></script>
		<script src="js/functions.js"></script>
		<script>
			var modal = document.getElementById("myModal");
			var modalImg = document.getElementById("img_display");
			function enlarge(img_id){
				var img = document.getElementById(img_id);
				modal.style.display = "block";
				modalImg.src = img.src;
				$('#myModal').click(function(event) {
    				if (this === event.target) { 
        				modal.style.display = "none";
    				}
				});
			}
			var span = document.getElementsByClassName("close")[0];
			span.onclick = function() { 
				modal.style.display = "none";
			}
		</script>
	</body>
</html>
<?php
	$page="Deepwoods Gallery";
	include '../web-traffic-analysis/logger.php';
?>