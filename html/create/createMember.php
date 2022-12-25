<?php
	include '../connect/connect.php';

	$sql = "CREATE TABLE member (";
	$sql .= "memberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
	$sql .= "email varchar(40) UNIQUE NOT NULL,";
	$sql .= "nickname varchar(10) NOT NULL,";
	$sql .= "pw varchar(20) DEFAULT NULL,";
	$sql .= "birthday varchar(10) NOT NULL,";
	$sql .= "regTime int(11) NOT NULL,";
	$sql .= "PRIMARY KEY (memberID)";
	$sql .= ") CHARSET=utf8";

	$res = $dbConnect->query($sql);

	if($res){
		echo "Create Table Complete";
	} else {
		echo "Create Table False";
	}
?>