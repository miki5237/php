<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
</head>
<body>
<?php
    include '../connect/session.php';
    include '../connect/connect.php';

    $email = $_POST['userEmail'];
    $pw = $_POST['userPw'];

    function goSignInPage($alert){
        echo $alert.'<br>';
        echo "<a href='signInForm.php'>로그인폼으로 이동</a>";
        return;
    }

    //유효성 검사
    //이메일 검사
    if(!filter_Var($email, FILTER_VALIDATE_EMAIL)){
        goSignInPage('올바른 이메일이 아닙니다.');
        exit;
    }

    //비밀번호 검사
    if($pw == null || $pw == '') {
        goSignInPage('비밀번호를 입력해 주세요.');
        exit;
    }

    //$pw = sha1('php200'.$pw);

    $sql = "SELECT email, nickname, memberID FROM member ";
    $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'";
    $result = $dbConnect->query($sql);

    if($result){
        if($result->num_rows == 0){
            goSignInPage('로그인 정보가 일치하지 않습니다.');
            exit;
        } else {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['nickname'] = $memberInfo['nickname'];
            Header("Location:../main/index.html");
        }
    }
?>
</body>
</html>