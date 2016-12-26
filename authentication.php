<?php

	session_start();
	$error = false;	// Will indicate if an error has occured in the registration process
	
	// If $_POST is not empty, then we will try to validate its information
	if(!empty($_POST)){
		
		/* This foreach loop will go through each value in $_POST and make sure that	*
		 * no fields were empty. If any are empty, then $error will be set to 'True'	*/
		foreach($_POST as $name=>$value){
			if(empty($_POST[$name])){
				$error = true;
			}
		}
		
		/* Next, we will check that the password fields match. If they do not match, then *
		 * $error will be set to 'True'.																									*/
		if($_POST["password"] != $_POST["confpass"]){
			$error = true;
		}
		
		/* Next, we will make sure that the password field is at least 8 characters. If it *
		 * is not, then $error is set to 'True'. 																					 */
		if(strlen($_POST["password"]) < 8){
			$error = true;
		}
		
		/* If $error is 'False' at this point, then we can save the user's registration! *
		 * We will try to open the file 'members.txt' such that we can append to the end *
		 * of the file. 																															   */
		if($error == false){
			$members = fopen("members.txt", "a");
			
			/* We will go through each element in $_POST and write them to the file, separating *
			 * them with a '~'. 																																*/
			foreach($_POST as $name=>$value){
				fwrite($members, "$value~");
			}
			// A carriage return will be written so that the next member will be added on the next line
			fwrite($members, "\n\n");
			
			// The file will be closed. If something goes wrong, $error will be set
			$error = !fclose($members);
			$title = "Account Created";
		}
	
	/* If we execute this 'else' statement, it means that this page was reached without any *
	 * information being passed in $_POST. $error will be set. 															*/
	} else {
		$error = true;
	}
	
	if($error){
		$title = "Error!";
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $title ?> | Der Biermarkt</title>
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
			<?php if($error){?>
				<h2>Oops!</h2>
				<p>It appears that an error occured during your registration! Please try again!</p>
			<?php } else {?>
				<h2>Success!</h2>
				<p>Your account has been made successfully!</p>
			<?php } ?>
		</div>
		
		<footer>
			<p>&copy; Jeremiah Witt, 2016. Located at 1234 Merkel Drive, Kitchener, ON.</p>
		</footer>
	</body>
</html>