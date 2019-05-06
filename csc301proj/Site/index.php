<?php
include('config.php');
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt skel-layers-fixed">
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
                        
                        <?php if (!isset($_SESSION['userid'])) { ?>
                        <li><a href="login.php">Log In</a></li>
                        <?php } ?>
                        
                        <li><a href="signup.php">Sign-Up</a></li>
						<li><a href="" class="icon fa-angle-down">Menu</a>
							<ul>
								<li><a href="searchparts.php">Search All Parts</a></li>
							</ul>
						</li>
                        <?php if (isset($_SESSION['userid'])) { ?>
                        <li><a href="">Logged in: <?php print_r($user['username']); ?></a></li>
                        <li><a href="logout.php">Log Out?</a></li>
                        <li><a href="shoppingcart.php">View Cart</a></li>
                        <li><a href="settings.php">User Settings</a></li>
                        <?php if ($user['userid'] == 1) { ?>
                            <li><a href="admin.php">Admin Controls</a></li>
                        <?php } ?>
                        <?php } ?>
					</ul>
				</nav>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Car Parts R Us</h2>
					<p>Find the Parts You Need Today!</p>
					<ul class="actions">
						<li><a href="signup.php" class="button big scrolly">Sign-Up</a></li>
                        <li><a href="login.php" class="button big scrolly">Login</a></li>
					</ul>
				</div>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="container">
					<header class="major">
						<h2>Overview</h2>
						<p>Our parts are 100% original factory made.</p>
					</header>
					<div class="slider">
						<span class="nav-previous"></span>
						<div class="viewer">
							<div class="reel">
								<div class="slide">
									<img src="images/slide01.jpg" alt="Uh-oh" />
								</div>
								<div class="slide">
									<img src="images/slide02.jpg" alt="Uh-oh" />
								</div>
								<div class="slide">
									<img src="images/slide03.jpg" alt="Uh-oh" />
								</div>
							</div>
						</div>
						<span class="nav-next"></span>
					</div>
				</div>
			</section>
			
		<!-- Two -->
			<section id="two" class="wrapper style2">
				<div class="container">
                    <header class="major">
				</div>
			</section>
			
		<!-- Three -->
			<section id="three" class="wrapper style1">
				<div class="container">
					<header class="major">
                    
					</header>
				</div>
			</section>
			
		<!-- CTA -->
			<section id="cta" class="wrapper style3">
				
				<ul class="actions">
					
				</ul>
			</section>
			
		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Envelope</span></a></li>
				</ul>
				<ul class="menu">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<span class="copyright">
					&copy; Copyright. All rights reserved. Design by <a href="http://www.html5webtemplates.co.uk">Responsive Web Templates</a>
				</span>
			</footer>

	</body>
</html>