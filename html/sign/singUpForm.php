
<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>회원가입</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }


        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input {
            margin-bottom: 2px;
        }

    </style>
</head>

<body class="text-center">
    
    <form class="form-signin mt-5" name="signUp" method="post" action="signUpSave.php">
        <h1 class="h3 mb-3 font-weight-normal">회원가입 페이지입니다.</h1>
        
        <label for="userEmail" class="sr-only" >Email address</label>
        <input type="email" name="userEmail" id="userEmail" class="form-control" placeholder="이메일을 적어주세요." required autofocus>

        <label for="userNickName" class="sr-only">NickName</label>
        <input type="text" name="userNickName" id="userNickName" class="form-control" placeholder="닉네임을 적어주세요." required>

        <label for="userPw" class="sr-only">Password</label>
        <input type="password" name="userPw" id="userPw" class="form-control" placeholder="패스워드" required>
        
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="birthYear">년도</label>
                <select class="custom-select d-block w-100" id="birthYear" name="birthYear" required>
                    <?php
                        $thisYear = date('Y', time());

                        for($i = $thisYear; $i >= 1930; $i--){
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                    ?>
                </select>   
            </div>
            <div class="col-md-4 mt-3">
                <label for="birthMonth">생월</label>
                <select class="custom-select d-block w-100" id="birthMonth" name="birthMonth" required>
                    <?php
                        for($i = 1; $i <= 12; $i++){
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="birthDay">생일</label>
                <select class="custom-select d-block w-100" id="birthDay" name="birthDay" required>
                    <?php
                        for($i = 1; $i <= 31; $i++){
                            echo "<option value='{$i}'>{$i}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" value="가입하기">가입하기</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>

</html>















