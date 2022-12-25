<?php
	if(!isset($_SESSION['memberID'])){
		Header("Location:../sign/signInForm.php");
		exit;
	}
?>