<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
</head>
<body>
<?php
	session_start();

	$_SESSION['member'] = "뿌뿌뿡";

	if(isset($_SESSION['member'])){
		echo "GOOD : {$_SESSION['member']}";
	} else {
		echo "No!!";
	}
?>
</body>
</html>