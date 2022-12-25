<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그아웃</title>
</head>
<body>
<?php
    include '../connect/session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['nickname']);
    echo "로그아웃 되었습니다.";
    echo "<a href='../main/index.html'>메인으로 이동</a>";
?>
</body>
</html>