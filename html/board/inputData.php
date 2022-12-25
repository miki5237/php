<?php
    include '../connect/session.php';
    include '../connect/connect.php';
    include '../connect/checkSession.php';

    for($i = 1; $i <= 200; $i++){
    	$time = time();
    	$sql = "INSERT INTO board (memberID, title, content, regTime) ";
    	$sql .= "VALUES (1, '{$i}번째 제목입니다.', '{$i}번째 내용입니다. 내용입니다.  내용입니다.', {$time})";
    	$result = $dbConnect->query($sql);

    	if($result){
    		echo "{$i} data input complete";
    	} else {
    		echo "{$i} data input false";
    	}
    	echo "<br>";
    }


?>