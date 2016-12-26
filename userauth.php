<?php
	
	$EMAIL_INDEX = "2";
	$PASSWORD_INDEX = "4";
	session_start();
	
	$members = fopen("members.txt", "r");	// The members database will be opened so that it can be read 
	$email = $_POST["email"];	// Login Email
	$password = $_POST["password"]; // Login Password
	$error = false;	// Used to indicate if an error has occured
	$match = false;	// Indicates if a match has been made
	
	/* While the file is not at the end, we will get the next line and check if it matches  *
	 * the desired user. If so, then $match is set to true. 																*/
	while(!feof($members)){
		$entry = fgets($members);
		$user_val = explode("~", $entry);	// An array of Strings will be created, using '~' as the delimiter
		
		/* We will check if the values at the EMAIL_INDEX and PASSWORD_INDEX are set. If they are, *
		 * we will check if they match the requested account. If they do, match is set to True and *
		 * the loop will be broken. 																															 */
		if(isset($user_val[$EMAIL_INDEX]) && isset($user_val[$PASSWORD_INDEX])){
			if( ($user_val[$EMAIL_INDEX] == $email) && ($user_val[$PASSWORD_INDEX] == $password) ){
				$match = true;
				break;
			}
		}
	}
	fclose($members);
	
	/* If a match was made, then the session variable "login" will be set to true, * 
	 * indicating that the user has successfully logged in. 											 */
	if($match){
		$_SESSION["login"] = true;
		$title = "Success";
	} else {
		$_SESSION["login"] = false;
		$title = "Uh Oh";
	}
	
?>


<!DOCTYPE html>
<html>
	<head lang="en">
		<title>
			<?php echo $title ?> | Der Biermarkt</title>
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
		
			<!-- Depending on if the user successfully has logged in, different messages will be displayed -->
			<?php if($match){ ?>
				<h2>Success</h2>
				<p>You have successfully logged into your account! Please feel free to make a purchase.</p>
			<?php } else { ?>
				<h2>Unsuccessful Login Attempt</h2>
				<p>We're sorry, but we were unable to find your account. Please try again!</p>
			<?php } ?>
			
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>