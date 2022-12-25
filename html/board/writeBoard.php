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
					<p class="my-3">궁금한 부분을 적어주세요!!!.</p>
				</div>
			</div>
		</div>

		
		<main role="main" class="container">
			<div class="row">
				<div class="col-md-12 blog-main">
					<div class="board table-responsive">
						<form action="saveBoard.php" name="boardWrite" method="post">
							<div class="form-group">
								<label for="title">제목</label>
								<input type="text" name="title" class="form-control" id="title" required>
							</div>
							<div class="form-group">
								<label for="content">내용</label>
								<textarea class="form-control" name="content" id="content" rows="13" required></textarea>
							</div>
							<div class="form-group mb-5 text-right">
								<input type="submit" value="저장하기" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
				<!— //col-md-8 —>
				
			</div>
			<!— //row —> 
		</main>
		<!— //container —>
		
		<!— blog-footer —>
		<?php
		    include '../dom/blog-footer.php';
		?>
		<!— //blog-footer —>

	</body>
</html>