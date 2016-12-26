<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<title>Log In | Der Biermarkt</title>
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
			<h2>Log In</h2>
			<form id="login" action="userauth.php" method="POST">
				<div class="field">
					<label>Email Address: </label>
					<input type="text" placeholder="joe@example.com" name="email" id="email" required/>
				</div>
				<div class="field">
					<label>Password: </label>
					<input type="password" name = "password" id="password" required />
				</div>
				<div class="field">
					<input type="submit" value="Submit" />
				</div>
			</form>
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>