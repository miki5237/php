
<!doctype html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>로그인</title>

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
    <form class="form-signin mt-5" name="signIn" method="post" action="signInProcessing.php">
        <h1 class="h3 mb-3 font-weight-normal">로그인 페이지입니다.</h1>
        
        <label for="userEmail" class="sr-only" >Email address</label>
        <input type="email" type="email" name="userEmail" id="userEmail" class="form-control" placeholder="이메일을 적어주세요." required autofocus>


        <label for="userPw" class="sr-only">Password</label>
        <input type="password" name="userPw" id="userPw" class="form-control" placeholder="패스워드" required>
        
        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" value="로그인">로그인</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </form>
</body>

</html>

















