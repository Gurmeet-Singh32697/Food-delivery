
<?php
session_start();
$_SESSION = array();
$_SESSION['loggedIn'] = null;
session_destroy();
	header("location:./index.php");
?>