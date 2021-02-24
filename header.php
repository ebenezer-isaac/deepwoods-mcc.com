<header id="header" 
	class="full-header border-full-header transparent-header header-size-custom dark" data-sticky-shrink="true" style="background:#000000;">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row">
				<div id="logo"  class="order-lg-2 col-auto px-0 col-lg-2 mr-lg-0">
					<a href="index.html" class="standard-logo" style="margin-left:auto;margin-right:auto;" data-dark-logo="img/logo.png">
					<img src="img/logo.png" alt="Canvas Logo" class='mt-2 mb-2 mr-2'>
					<img src="img/deepwoods.png" alt="Canvas Logo" class='mt-2 mb-2'>
					</a>
					<a href="index.html" class="retina-logo" style="margin-left:auto;margin-right:auto;" data-dark-logo="img/logo.png">
					<img src="img/logo.png" alt="Canvas Logo" class='mt-2 mb-2 mr-2'>
					<img src="img/deepwoods.png" alt="Canvas Logo" class='mt-2 mb-2'>
					</a>
				</div>
				<div id="primary-menu-trigger">
					<svg class="svg-trigger" viewBox="0 0 100 100">
						<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
						<path d="m 30,50 h 40"></path>
						<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
					</svg>
				</div>
				<!-- Primary Navigation
					============================================= -->
				<nav class="primary-menu order-lg-1 col-lg-5 px-0" style="position:inherit;">
					<ul class="menu-container" data-easing="easeInOutExpo" data-speed="1250" data-offset="35">
						<li class="menu-item">
							<?php
								if ($page=="Home") {
									echo "<a href='#' id='home_btn' class='menu-link'>";
								}else{
									echo "<a href='index.php' id='home_btn' class='menu-link'>";
								}
							?>
							
								<div>Home</div>
							</a>
						</li>
						<?php 
							if ($page=="Home") {
						?>
						<li class="menu-item">
							<a href="#" id='intro_btn' class="menu-link">
								<div>Introduction</div>
							</a>
						</li>
						<?php
							}
						?>
						<li class="menu-item">
							<a href="about.php" class="menu-link">
								<div>About</div>
							</a>
						</li>
						
					</ul>
				</nav>
				<nav class="primary-menu order-lg-3 col-lg-5 px-0" style="position:inherit;">
					<div class="menu-container justify-content-lg-end">
						<li class="menu-item">
							<?php
								if ($page=="Home") {
									echo "<a href='#' id='event_btn' class='menu-link'><div>Events</div>";
								}else{
									echo "<a href='registration.php' id='event_btn' class='menu-link'><div>Register</div>";
								}
							?>
							</a>
						</li>
						<li class="menu-item">
							<?php
								if ($page=="Home") {
									echo "<a href='#' id='gall_btn' class='menu-link'>";
								}else{
									echo "<a href='gallery.php' id='gall_btn' class='menu-link'>";
								}
							?>
								<div>Gallery</div>
							</a>
						</li>
						<?php 
							if ($page=="Home") {
						?>
						<li class="menu-item">
							<a href="#" id='cont_btn' class="menu-link">
								<div>Contact</div>
							</a>
						</li>
						<?php
							}
						?>
					</div>
				</nav>
				<!-- #primary-menu end -->
			</div>
		</div>
	</div>
	<div class="header-wrap-clone"></div>
</header>