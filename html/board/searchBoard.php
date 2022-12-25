<div class="navbar navbar-light bg-light mb-2">
	<a class="navbar-brand">게시판</a>
	<form class="form-inline" name="search" method="post" action="searchResult.php">
		<input class="form-control mr-sm-2" type="search" placeholder="검색어를 입력하세요!" aria-label="Search" name="searchKeyword" required>
		<select class="custom-select mr-sm-2" name="option" required>
			<option value="title" selected>제목</option>
			<option value="content">내용</option>
			<option value="tandc">제목과 내용</option>
			<option value="torc">제목 또는 내용</option>
		</select>
		<button type="submit" class="btn btn-secondary my-2 my-sm-0 mr-sm-2">검색</button>
		<a type="button" class="btn btn-primary" href="writeBoard.php">글 쓰기</a>
	</form>
</div>