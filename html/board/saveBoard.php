<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
    include '../connect/session.php';
    include '../connect/connect.php';
    include '../connect/checkSession.php';

    $title = $_POST['title'];
    $content = $_POST['content'];

    if($title != null && $title != ''){
    	$title = $dbConnect->real_escape_string($title);
    } else {
    	echo "제목을 입력하세요~";
    	echo "<a href='writeBoard.php'>작성 페이지로 이동하기</a>";
    	exit;
    }

    if($content != null && $content != ''){
    	$content = $dbConnect->real_escape_string($content);
    } else {
    	echo "내용을 입력하세요~";
    	echo "<a href='writeBoard.php'>작성 페이지로 이동하기</a>";
    	exit;
    }


    $memberID = $_SESSION['memberID'];
    $regTime = time();

    $sql = "INSERT INTO board (memberID, title, content, regTime) ";
    $sql .= "VALUES ('{$memberID}', '{$title}', '{$content}', {$regTime})";
    $result = $dbConnect->query($sql);

    if($result){
    	echo "저장 완료";
    	echo "<a href='listBoard.php'>게시판 목록으로 이동하기</a>";
    	exit;
    } else {
    	echo "저장 실패 - 관리자에게 문의하세요~";
    	echo "<a href='listBoard.php'>게시판 목록으로 이동하기</a>";
    	exit;
    }

?>










</body>
</html>