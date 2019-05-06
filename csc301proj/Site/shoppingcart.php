<?php

include('config.php');
if (!isset($user['userid'])) {
    header("Location:index.php");
    echo "You must be logged in to view your shopping cart.";
    sleep(3);
    
}
$total = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['key'])) {
        $_SESSION['cart']->remove($_POST['key']);
    }
    
    if (isset($_POST['checkout'])) {
        foreach ($_SESSION['cart'] as $key => $qty) {
            $price = $qty * 99.99;
            $params = array(
                'partname' => $key,
                'qty' => $qty,
                'price' => $price,
                'userid' => $user['userid']
            );
            checkout($_SESSION['cart'], $params, $database);
            $success = "Order placed successfully!";
        }
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
                        <li><a href="shoppingcart.php">View Cart</a></li>
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
		<h2>My Shopping Cart</h2>
        <?php if (isset($success)){
            echo $success; 
        }?>

									<div class="table-wrapper">
										<table style="color: white;">
											<thead style="color: white;">
												<tr>
													<th>Quantity</th>
													<th>Part Name</th>
													<th>Price</th>
												</tr>
											</thead>
											<tbody>
                                            <?php foreach($_SESSION['cart'] as $key => $qty) : ?>
												<tr>
													<td><?php print_r($qty); ?></td>
													<td><?php print_r($key); ?></td>
													<td>$<?php echo ($qty * 99.99); ?></td>
                                                    
                                                    <td>
                                                        <form action="" method="POST">
                                                        <ul class="actions">
                                                            <input type="hidden" name="key" value="<?php echo $key;?>" />
                                                            <button class="button small" type="submit" >Remove</li>
                                                        </ul>
                                                        </form>
                                                    </td>
												</tr>
                                                <?php $total += (99.99 * $qty); ?>
                                            <?php endforeach; ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="1"></td>
                                                    <td>Total</td>
													<td>$<?php echo $total; ?></td>
												</tr>
											</tfoot>
										</table>
                                        <form action="" method="POST">
                                                        <ul class="actions">
                                                            <input type="hidden" name="checkout" value="checkout" />
                                                            <button class="button small" type="submit" >Checkout</li>
                                                        </ul>
                                                        </form>
									</div>
        
	</div>
    </section>

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