<?php
include('config.php');

?>

<!doctype html>
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
        <!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
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
                        <li><a href="settings.php">User Settings</a></li>
                        <?php if ($user['userid'] == 1) { ?>
                            <li><a href="admin.php">Admin Controls</a></li>
                        <?php } ?>
                        <?php } ?>
					</ul>
				</nav>
			</header>
<html lang="en">

<section id="banner">
	<div class="inner">
		<h2>User Settings</h2>
		<h3>Info</h3>
			<ul class="alt">
				<li>Username: <?php print_r($user['username']); ?></li>
				<li>Full name: <?php print_r($user['name']); ?></li>
				<li>Address: <?php print_r($user['address']); ?></li>
                <li>City: <?php print_r($user['city']); ?></li>
                <li>State: <?php print_r($user['state']); ?></li>
			</ul><br>
            
            <ul class="actions">
                <li><a href="editinfo.php?action=edit" class="button">Edit Info</a></li>
                <li><a href="editinfo.php" class="button special">Change Password</a></li>
            </ul>
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