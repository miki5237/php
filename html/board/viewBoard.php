<?php 
    include '../connect/connect.php';
    include '../connect/session.php';
    include '../connect/checkSession.php';
?>
<!doctype html>
<html lang="ko">
    <head>
        <?php
            include '../dom/head-meta.php';
        ?>
        <title>PHP Reference</title>
        <?php
            include '../dom/head-link.php';
        ?>
        
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
        </style>
    </head>
    <body>
        <div class="container">
            <!-- blog-header -->
            <?php
                include '../dom/blog-header.php';
            ?>
            <!-- //blog-header -->

            <!-- blog-nav -->
            <?php
                include '../dom/blog-nav.php';
            ?>
            <!-- //blog-nav -->

            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h2 class="display-5">무엇이든지 물어보세요!! 게시판</h2>
                    <p class="my-3">PHP를 이용한 간단한 게시판입니다.</p>
                </div>
            </div>
        </div>


        
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-12 blog-main">
                    <div class="board table-responsive">

                        <table class="table">
                            <colgroup>
                                <col style="width: 20%;">
                                <col style="width: 80%;">
                            </colgroup>
                            <tbody>
                                <?php
                                if(isset($_GET['boardID']) && (int) $_GET['boardID'] > 0){
                                    $boardID = $_GET['boardID'];
                                    $sql = "SELECT b.title, b.content, m.nickname, b.regTime FROM board b JOIN member m ON (b.memberID = m.memberID) WHERE b.boardID = {$boardID}";
                                    $result = $dbConnect->query($sql);

                                    if($result){
                                        $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
                                        echo "<tr><th>제목</th><td>{$contentInfo['title']}</td></tr>";
                                        echo "<tr><th>등록자</th><td>{$contentInfo['nickname']}</td></tr>";
                                        $regDate = date("Y-m-d h:i");
                                        echo "<tr><th>등록일</th><td>{$regDate}</td></tr>";
                                        echo "<tr><th>내용</th><td style='height:400px'>{$contentInfo['content']}</td></tr>";
                                    }
                                } else {
                                    
                                }
                                ?>




                                <!--tr>
                                    <th>제목</th>
                                    <td>얼마전에~~ 사실 나~</td>
                                </tr>
                                <tr>
                                    <th>등록자</th>
                                    <td>박*자</td>
                                </tr>
                                <tr>
                                    <th>등록일</th>
                                    <td>2007.04.03</td>
                                </tr>
                                <tr>
                                    <th>내용</th>
                                    <td>나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~나 그런 사람아니야~~~<br>나 그런 사람 아니야~~</td>
                                </tr-->
                            </tbody>
                        </table>
                        <a href="listBoard.php" class="btn btn-primary mb-5 float-right">목록보기</a>
                    </div>
                </div>
                <!-- //col-md-8 -->
                
            </div>
            <!— //row —> 
        </main>
        <!— //container —>
        
        <!— blog-footer —>
        <?php
            include '../dom/blog-footer.php';
        ?>
        <!— //blog-footer —>

        <!— script —>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>