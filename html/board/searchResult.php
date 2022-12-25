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
               <table class="table table-hover text-center">
                  <colgroup>
                     <col style="width: 10%;">
                     <col style="width: 65%;">
                     <col style="width: 10%;">
                     <col style="width: 15%;">
                  </colgroup>
                  <thead class="thead-light">
                     <tr>
                        <th scope="col">번호</th>
                        <th scope="col">제목</th>
                        <th scope="col">등록자</th>
                        <th scope="col">등록일</th>
                     </tr>
                  </thead>
                  <tbody>   
                  <?php

                      $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);
                      $searchOption = $dbConnect->real_escape_string($_POST['option']);

                      if($searchKeyword == '' || $searchKeyword == null){
                         echo "검색어가 없습니다.";
                         exit;
                      }

                      switch ($searchOption) {
                         case 'title':
                         case 'content':
                         case 'tandc':
                            break;
                         default:
                            echo "검색 옵션이 없습니다.";
                            exit;
                            break;
                      }

                      $sql = "SELECT b.boardID, b.title, m.nickname, b.regTime FROM board b JOIN member m ON (b.memberID = m.memberID)" ;


                      switch ($searchOption) {
                         case 'title':
                            $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
                            break;
                         case 'content':
                            $sql .= "WHERE b.content LIKE '%{$searchKeyword}%'";
                            break;
                         case 'tandc':
                            $sql .= "WHERE b.title LIKE '%{$searchKeyword}%' AND b.content LIKE '%{$searchKeyword}%'";
                            break;
                      }

                      if(isset($_GET['page'])){
									$page = (int)$_GET['page'];
								} else {
									$page = 1;
								}
								// LIMIT 0, 20  //(20 * 1) - 20 -> {$numView * $page} - $numView
								// LIMIT 20, 20 //(20 * 2) - 20 -> {$numView * $page} - $numView
								// LTMIT 40, 20 //(20 * 3) - 20 -> {$numView * $page} - $numView
								$numView = 20;
								$firstLimitValus = ($numView * $page) - $numView;

								$sql .= "DESC LIMIT {$firstLimitValus}, {$numView}";
								$result = $dbConnect->query($sql);

								if($result){
									$dataCount = $result->num_rows;

									if($dataCount > 0){
										for($i=0; $i<$dataCount; $i++){ 
											$memberInfo = $result->fetch_array(MYSQLI_ASSOC);
											echo "<tr>";
											echo "<td scope='row'>".$memberInfo['boardID']."</td>";
											echo "<td><a href='viewBoard.php?boardID={$memberInfo['boardID']}'>".$memberInfo['title']."</a></td>";
											echo "<td>".$memberInfo['nickname']."</td>";
											echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
											echo "</tr>";
										}
									}
								} else {
									//게시글이 없을 경우
									echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
								}
               ?>               
                  </tbody>                  
               </table>
               <?php
					include 'nextPageLink.php';
				?>
               <div class="form-group mb-5 text-right">
                  <a href="listBoard.php"><input type="submit" value="목록보기" class="btn btn-primary"></a>
               </div>         
            </div>
         </div>
         <!-- //col-md-8 -->

      </div>
      <!-- //row --> 
   </main>
   <!-- //container -->

   <!-- blog-footer -->
   <?php
   include '../dom/blog-footer.php';
   ?>
   <!-- //blog-footer -->
      <!-- script -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="../assets/js/bootstrap.min.js"></script>
   </body>
</html>