<?php
	$host = "localhost";
	$user = "pella522";
	$pw = "zkfltmak5237!";
	$dbName = "pella522";
	$dbConnect = new mysqli($host, $user, $pw, $dbName);
	$dbConnect->set_charset("utf8");
	
	if(mysqli_connect_errno()){
		echo "database connect false";
	}
?>