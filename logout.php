<?php

	// The session will be started and all values will be unset.
	session_start();
	session_unset();
	
	// The session will be destroyed.
	session_destroy();
	
	// The user will be redirected to the home page.
	header("Location: index.php");
?>