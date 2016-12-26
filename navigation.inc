<nav>
		<ul>
				<li id="first"><a href="index.php">Home</a></li>
				<li><a href="register.php">Register</a></li>
				<?php
					if(isset($_SESSION["login"]) && $_SESSION["login"]){
				?>
				<li><a href="cart.php">Shopping Cart</a></li>
				<li id="last"><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li id ="last"><a href="login.php">Log In</a></li>
				<?php } ?>

		</ul>
</nav>