<footer id="footer" style="background-color: #333333;">
	<div id="copyrights" style='background-color: black;color:white;'>
		<div class="container" >
			<div class="row justify-content-between">
				<div class="col-md-6 col-sm-12 text-center text-lg-left order-last order-lg-first">
					<div id="logo"  class="col-lg-6 standard-logo" >
						<img src="img/logo.png" alt="Canvas Logo" style='max-height: 75px;' class='mt-2 mb-2 mr-2'>
						<img src="img/deepwoods.png" alt="Canvas Logo"  style='max-height: 75px;' class='mt-2 mb-2'>
					</div>
					<br>
				</div>
				<div class="col-md-6 col-sm-12 col-lg-auto text-center text-lg-right dark">
					<div class="copyrights-menu copyright-links">
						<?php
							if ($page=="Home") {
								echo "<a href='#' id='home_btn_1'>Home</a>/";
							}else{
								echo "<a href='index.php' id='home_btn_1'>Home</a>/";
							}
						?>
						<?php 
							if ($page=="Home") {
						?>
							<a id='intro_btn_1' href="#">Introduction</a>/
						<?php
							}
						?>
						<a href="about.php">About</a>/
						<?php
							if ($page=="Home") {
								echo "<a href='#' id='event_btn_1'>Events</a>/";
							}else{
								echo "<a href='registration.php' id='event_btn_1'>Register</a>/";
							}
						?>
						<?php
							if ($page=="Home") {
								echo "<a href='#' id='gall_btn_1'>Gallery</a>/";
							}else{
								echo "<a href='gallery.php' id='gall_btn_1'>Gallery</a>";
							}
						?>
						<?php 
							if ($page=="Home") {
						?>
						<a id='cont_btn_1' href="#">Contact</a>
						<?php
							}
						?>
					</div>
					<a href="https://www.facebook.com/deepwoodsmcc/" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>
					<a href="https://instagram.com/deepwoodsmcc/" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-instagram">
						<i class="icon-instagram"></i>
						<i class="icon-instagram"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-gplus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-pinterest">
						<i class="icon-pinterest"></i>
						<i class="icon-pinterest"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-vimeo">
						<i class="icon-vimeo"></i>
						<i class="icon-vimeo"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-yahoo">
						<i class="icon-yahoo"></i>
						<i class="icon-yahoo"></i>
					</a>
					<a href="#" target="_blank" class="social-icon inline-block si-small si-borderless mb-0 si-linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>
				</div>
			</div>
			<div class='row'>
				<div class="col-md-6 col-sm-12">
					Copyrights &copy; 2021 All Rights Reserved by <a href='https://www.mcc.edu.in/' class="author_name">Madras Christian College</a>.
				</div>
				<div class="col-md-6 col-sm-12 text-lg-right">
					Website Developed and Maintained by <a href='https://ebenezer-isaac.github.io/' class="author_name">Ebenezer Isaac</a>
				</div>
				<style>
					.author_name{
						color:white;
					}
					.author_name:hover{
						color:#03A1CF;
					}
				</style>
			</div>
		</div>
	</div>
	<script src="js/jquery.js"></script>
	<?php 
		if ($page=="Home") {
	?>
	<script type="text/javascript">
		$("#home_btn").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_home").offset().top
			}, 700);
		});
		$("#intro_btn").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_intro").offset().top
			}, 700);
		});
		$("#event_btn").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_events").offset().top
			}, 700);
		});
		$("#gall_btn").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#gallery_scroll").offset().top
			}, 700);
		});
		$("#cont_btn").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#contact_scroll").offset().top
			}, 700);
		});

		$("#home_btn_1").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_home").offset().top
			}, 700);
		});
		$("#intro_btn_1").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_intro").offset().top
			}, 700);
		});
		$("#event_btn_1").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#section_events").offset().top
			}, 700);
		});
		$("#gall_btn_1").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#gallery_scroll").offset().top
			}, 700);
		});
		$("#cont_btn_1").click(function() {
			$([document.documentElement, document.body]).animate({
		    	scrollTop: $("#contact_scroll").offset().top
			}, 700);
		});
	</script>
	<?php
		}
	?>
	
</footer>