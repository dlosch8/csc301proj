<?php
include('config.php');

$error = "";
$success = "";

$action = get('action');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if($action == 'edit') {
    $name = $_POST['name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
    
    $sql = file_get_contents('sql/editUser.sql');
    $params = array(
        'name' => $name,
        'address' => $address,
        'city' => $city,
        'state' => $state,
        'userid' => $user['userid']
    );

    $statement = $database->prepare($sql);
    $statement->execute($params);
    $success = "Account information updated";
}
else {
    $password = $_POST['password'];
    $sql = file_get_contents('sql/changePassword.sql');
    $params = array(
        'password' => $password,
        'userid' => $user['userid']
    );

    $statement = $database->prepare($sql);
    $statement->execute($params);
    $success = "Password successfully changed";
}
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
    <h3 style="color:red"><?php echo $error; ?></h3>
    <h3 style="color:green"><?php echo $success; ?></h3>
    <?php if ($action == 'edit') { ?>
		<h2>Edit Profile Information</h2>
		<form action="" method="POST">
            <input type="text" name="name" placeholder="Enter your full name" value="<?php print_r($user['name']);?>" /><br>
            <input type="text" name="address" placeholder="Address" value="<?php print_r($user['address']);?>" /><br>
            <input type="text" name="city" placeholder="City" value="<?php print_r($user['city']);?>" /><br>
            <div class="row uniform">
				<div class="12u">
					<div class="select-wrapper">
						<select name="state" id="category">
							<option value="<?php print_r($user['state']);?>"><?php print_r($user['state']);?></option>
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AZ">AZ</option>
                            <option value="AR">AR</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="LA">IA</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="ME">ME</option>
                            <option value="MD">MD</option>
                            <option value="MA">MA</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MS">MS</option>
                            <option value="MO">MO</option>
                            <option value="MT">MT</option>
                            <option value="NE">NE</option>
                            <option value="NV">NV</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>
                            <option value="NY">NY</option>
                            <option value="NC">NC</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VA">VA</option>
                            <option value="WV">WV</option>
                            <option value="WI">WI</option>
                            <option value="WY">WY</option>
						</select>
					</div>
				</div>
			</div><br>
			<input readonly type="text" name="username" placeholder="Username" value="<?php print_r($user['username']);?>" /><br>
			<input class="button big" type="submit" value="Submit" /> &nbsp&nbsp&nbsp&nbsp
            <input class="button big" type="reset" value="Reset" /><br><br>
		</form>
	</div>
    </section>
    <?php } 
    else { ?>
        <h2>Change Password</h2>
        <form action="" method="POST">
        <input type="password" name="password" placeholder="Enter new password" /><br>
        <input class="button big" type="submit" value="Submit" />
        </form>
    <?php } ?>
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