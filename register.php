<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Register | Der Biermarkt</title>
		<meta charset="utf-8" />
		<link href='https://fonts.googleapis.com/css?family=Germania+One' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="exercise6.css" />
		<script type="text/javascript" src="exercise6.js"></script>
	</head>
	
	<body onload="showTime()">
		<header>
			<h1>Der Biermarkt</h1>
			<p id="clock"></p>
		</header>
		
		<!-- NAVIGATION -->
		<?php
			include("navigation.inc");
		?>
		<div id="content">
			<h2>Make an Account</h2>
			<div id="form">
			
			<!-- The following form will hold all the fields that need to be collected.
					 It will be validated by the verify_entry() method -->
				<form id="register" onsubmit="return verify_entry()" method="POST">
					<div class="field">
						<label id="firstNameLabel">First Name: </label>
						<input type="text" name="first_name" id="first_name" />
					</div>
					<div class="field">
						<label id="lastNameLabel">Last Name: </label>
						<input type="text" name="last_name" id="last_name" />
					</div>
					<div class="field">
						<label id="emailLabel">Email: </label>
						<input type="text" name="email" id="email" />
					</div>
					<div class="field">
						<label id="phoneLabel">Telephone Number: </label>
						<input type="text" name="phone_number" id="phone_number" /><br />
					</div>
					<div class="field">
						<label>Password: </label>
						<input type="password" name="password" id="password" />
					</div>
					<div class="field">
						<label>Confirm Password: </label>
						<input type="password" name="confpass" id="confpass" />
					</div>
					<div class="field">
						<input type="submit" value="Submit" /><input type="reset" value="Clear" />
					</div>
				</form>
			</div>
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>