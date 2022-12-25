<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
</head>
<body>
	<?php
	include '../connect/connect.php';
	include '../connect/session.php';

	$email = $_POST['userEmail'];
	$nickname = $_POST['userNickName'];
	$pw = $_POST['userPw'];
	$birthYear = (int) $_POST['birthYear'];
	$birthMonth = (int) $_POST['birthMonth'];
	$birthDay = (int) $_POST['birthDay'];

	function goSignUpPage($alert) {
		echo $alert.'<br>';
		echo "<a href='signUpForm.php'>회원가입 페이지로 이동</a>";
		return;
	};

	//이메일 유효성 검사
	if(!filter_Var($email, FILTER_VALIDATE_EMAIL)) {
		goSignUpPage("올바른 이메일 형식이 아닙니다.");
		exit;
	};

	//닉네임 유효성 검사(한글만) 정규식 표현 방법
	$nickNameRegPattern = '/^[가-힣]{1,}$/';
	if(!preg_match($nickNameRegPattern, $nickname, $matches)) {
		goSignUpPage("닉네임은 한글만 사용이 가능합니다.");
		exit;
	}

	//비밀번호 검사
	if($pw == null || $pw == '') {
		goSignUpPage("비밀번호를 입력하세요.");
		exit;
	}

	//$pw = sha1('webs'.$pw);

	//생일년도 검사
	if($birthYear == 0) {
		goSignUpPage("년도를 선택해주세요.");
		exit;
	}

	//생일 월 검사
	if($birthMonth == 0) {
		goSignUpPage("생월을 선택해주세요.");
		exit;
	}

	//생일 일 검사
	if($birthDay == 0) {
		goSignUpPage("생일을 선택해주세요.");
		exit;
	}

	$birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;

	//이메일 중복 검사
	$isEmailCheck = false;

	//이메일 찾는 쿼리문
	$sql = "SELECT email FROM member WHERE email = '{$email}'";
	$result = $dbConnect -> query($sql);

	if($result) {
		$count = $result -> num_rows;
		if($count == 0) {
			$isEmailCheck = true;
		} else {
			goSignUpPage("이미 존재하는 이메일입니다.");
			exit;
		}
	} else {
		echo "에러 발생 : 관리자 문의 요망";
		exit;
	}

	//닉네임 중복 검사
	$isNickNameCheck = false;

	//닉네임 찾는 쿼리문
	$sql = "SELECT nickname FROM member WHERE nickname = '{$nickname}'";
	$result = $dbConnect -> query($sql);

	if($result) {
		$count = $result -> num_rows;
		if($count == 0) {
			$isNickNameCheck = true;
		} else {
			goSignUpPage("이미 존재하는 닉네임입니다.");
			exit;
		}
	} else {
		echo "에러 발생 : 관리자 문의 요망";
		exit;
	}

	//이메일, 닉네임 true --> 가입
	if($isEmailCheck == true && $isNickNameCheck == true) {
		$regTime = time();
		$sql = "INSERT INTO member(email, nickname, pw, birthday, regTime)";
		$sql .= "VALUES('{$email}','{$nickName}','{$pw}','{$birth}','{$regTime}')";
		$result = $dbConnect -> query($sql);

		if($result){
			$_SESSION['memberID'] = $dbConnect->insert_id;
			$_SESSION['nickname'] = $nickName;
			Header("Location:../main/index.html");
		}
	} else {
		goSignUpPage("이메일 또는 닉네임이 중복됩니다.");
		exit;
	}
?>
</body>
</html>