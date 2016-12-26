<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home | Der Biermarkt</title>
		<meta charset="utf-8" />
		<link href='https://fonts.googleapis.com/css?family=Germania+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="exercise6.css" />
		<script type="text/javascript" src="exercise6.js"></script>
		<script type="text/javascript" src="cart.js"></script>
		
		<!-- This PHP/JS combo will be used to determine if the user is logged in, for use with JS functions -->
		<script type="text/javascript">
		<!--
			<?php if(isset($_SESSION["login"]) && $_SESSION["login"]){?> 
							var loggedin = true;
			<?php } else { ?>
							var loggedin = false;
			<?php } ?>		
			
		//-->		
		</script>
	</head>
	
	<body onload="showTime()" >
		<header>
			<h1>Der Biermarkt</h1>
			<p id="clock"></p>
		</header>
		
		<!-- NAVIGATION -->
		<?php
			include("navigation.inc");
		?>
		<div id="content">
			<h2>Make An Order</h2>
			
			<!-- This form will hold all of the items on sale. When the user tries to submit
					 the JS function verify_login() will be called to confirm that they are logged
					 in. If they are, they form will be submitted to cart.php                      -->
			<form method="POST" id="storeForm" onsubmit="verify_login(loggedin)">
				<div id="store">
					<div class="item">
						<div class="thumbnail">
							<img src="images/weihenstephaner.jpeg" alt="Weihenstephaner Beer Bottle" />
						</div>
						<div class="item_name">Weihenstephaner Weissbier
						</div>
						<div class="item_desc">A nice white beer from "The World's Oldest Brewery"
						</div>
						<div class="price">$6.89
						</div>
						<div class="button">
							<input type="submit" name="add_weihen" id="add_weihen" value="Add To Cart"  />
						</div>
					</div>
					<div class="item">
						<div class="thumbnail">
							<img src="images/ayinger.jpeg" alt="Ayinger Beer Bottle" />
						</div>
						<div class="item_name">Ayinger
						</div>
						<div class="item_desc">A darker beer with a chocolate-y taste
						</div>
						<div class="price">$5.72
						</div>
						<div class="button">
							<input type="submit" name="add_ayinger" id="add_ayinger" value="Add To Cart" />
						</div>
					</div>
					<div class="item">
						<div class="thumbnail">
							<img src="images/erdinger.jpeg" alt="Erdinger Beer Bottle" />
						</div>
						<div class="item_name">Erdinger Weissbier
						</div>
						<div class="item_desc">Another white beer with a spicy, fruity flavour
						</div>
						<div class="price">$7.22
						</div>
						<div class="button">
							<input type="submit" name="add_erdinger" id="add_erdinger" value="Add To Cart" />
						</div>
					</div>
					<div class="item">
						<div class="thumbnail">
							<img src="images/schneider.jpeg" alt="Schneider Beer Bottle" />
						</div>
						<div class="item_name">Schneider Weisse
						</div>
						<div class="item_desc">A white beer with a darker colour - also fruity
						</div>
						<div class="price">$2.50
						</div>
						<div class="button">
							<input type="submit" name="add_schneider" id="add_schneider" value="Add To Cart" />
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>