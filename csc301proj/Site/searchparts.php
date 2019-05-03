<?php
include('config.php');

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['term'])) {
        $term = $_POST['term'];
        $parts = searchParts($term, $database);
    }
    if (empty($parts)) {
        $error = "No parts were found";
    } 
        $_POST['addpart'] = array(1, 'bumper');
        $_SESSION['cart'] = 1;

}
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
		<h2>Search for Parts</h2>
		<form action="" method="POST">
            <input type="text" name="term" placeholder="Enter search term" /><br>
			<input class="button big" type="submit" value="Search" />
		</form> 
        <h3 style="color:red"><?php echo $error; ?></h3>
        <h3 style="color:green"><?php echo $success; ?></h3>
	</div>
    </section>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Part</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                foreach($parts as $part) {
                 ?><tr>
                    <td><?php print_r($part['makename']);?></td>
                    <td><?php print_r($part['modelname']);?></td>
                    <td><?php print_r($part['partname']);?></td>
                    <td>$</td>
                    <td>
                    	<div class="3u 12u(2)">
							<ul class="actions vertical small">
                                <form action="" method="POST">
                                    <input type="hidden" name="addpart" value="<?php print_r($part['partname']);?>" ></input>
								<li><button class="button special small" type="submit" >Add to Cart</a></li>
                                </form>
							</ul>
						</div>
                    </td>
                   </tr>
                <?php }
            }?>
                
            </tbody>
        </table>
    </div>
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