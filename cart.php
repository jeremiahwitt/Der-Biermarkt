<?php
	
	session_start();
	
	/* If the user is not logged in and they try to access the cart, they will be *
	 * sent to the home page. 																										*/
	if(!isset($_SESSION["login"])){
		header("Location: index.php");
	}
	
	/* First, we will check if a cart has been started. If it has, we will grab it *
	 * from the session. If it has not, then we will create a new cart.						 */
	if(isset($_SESSION["cart"])){
		$cart = $_SESSION["cart"];	// Array that will be holding the cart
	} else {
		$cart = array();
	}
	/* If $_POST is set (meaning that the user has tried to add items to their cart), *
	 * then the following script will be processed. 																	*/
	if(isset($_POST)){
		
		// If the user tried to purchase Weihenstephaner, then this will be added to their cart
		if(isset($_POST["add_weihen"])){
			$cart["Weihenstephaner Weissbier"] = 6.89;
		}
		
		// If the user tried to purchase Ayinger, then this will be added to their cart
		if(isset($_POST["add_ayinger"])){
			$cart["Ayinger"] = 5.72;
		}
		
		// If the user tried to purchase Erdinger, then this will be added to their cart
		if(isset($_POST["add_erdinger"])){
			$cart["Erdinger Weissbier"] = 7.22;
		}
		
		// If the user tried to purchase Schneider, then this will be added to their cart
		if(isset($_POST["add_schneider"])){
			$cart["Schneider Weisse"] = 2.50;
		}
	}
	
	$_SESSION["cart"] = $cart;	// The current cart will now be stored in the session

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Shopping Cart | Der Biermarkt</title>
		<meta charset="utf-8" />
		<link href='https://fonts.googleapis.com/css?family=Germania+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="exercise6.css" />
		<script type="text/javascript" src="exercise6.js"></script>
		
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
			<h2>Shopping Cart</h2>
			<!-- This table will show the contents of the shopping cart -->
			<table id="checkout">
				<tr>
					<th>Item Name</th>
					<th>Price</th>
				</tr>
				<?php
				
					// This loop will print each item in a new row
					foreach($cart as $name=>$price){
						printf("<tr><td>%s</td><td>$%.2f</td></tr>",$name, $price);
					}
					
					#TOTAL
					print "<tr><th id=\"total\">Total:</th><td>";
					$total = 0;
					// Will sum up the cost of each item
					foreach($cart as $val){
						$total += $val;
					}
					printf("$%.2f</td></tr>", $total);
				?>
			</table>
			<form id="checkoutForm">
				<input type="button" value="Continue Shopping" onclick="location.href='index.php'" />
				<input type="submit" value="Checkout" />
			</form>
			
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>