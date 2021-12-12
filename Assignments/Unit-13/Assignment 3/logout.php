<?php
	session_start();						//Allows  access to the sessions on this page
	session_unset();						//Unsets session
	session_destroy();						//Removes session connections
	header("Location: login.php");			//Headers redirect to new pages. Headers arrive first, no ECHOS
?>