<div class="pig">
	<ul class="pagination justify-content-center">
		<?php
			//전체 레코드 수 구하기
			$sql = "SELECT count(boardID) FROM board";
			$result = $dbConnect->query($sql);

			$boardTotalCount = $result->fetch_array(MYSQLI_ASSOC);
			$boardTotalCount = $boardTotalCount['count(boardID)'];

			//총 페이지 수
			$totalPage = ceil($boardTotalCount / $numView);

			//현재 페이지를 기준으로 앞뒤에 페이지 수 표시
			$pageTerm = 5;

			//처음 표시할 페이지를 현재 페이지를 기준으로 5개 이전까지만 표시
			$startPage = $page - $pageTerm;
			$lastPage = $page + $pageTerm;

			//음수인 경우
			if($startPage < 1){
				$startPage = 1;
			}

			//마지막 페이지보다 수가 경우
			if($lastPage >= $totalPage){
				$lastPage = $totalPage;
			}

			//처음 페이지
			if($page != 1){
				echo "<li class='page-item'><a class='page-link' href='./listBoard.php?page=1'><span aria-hidden='true'>&laquo;</span></a></li>";
			}

			//이전 페이지
			if($page != 1){
				$prevPage = $page - 1;

				echo "<li class='page-item'><a class='page-link' href='./listBoard.php?page={$prevPage}'><span aria-hidden='true'>&lsaquo;</span></a></li>";
			}

			for($i=$startPage; $i<=$lastPage; $i++){
				$active = '';

				if($i == $page){
					$active = 'active';
				}

				echo "<li class='page-item {$active}'><a class='page-link' href='./listBoard.php?page={$i}'>{$i}</a></li>";
			}

			//다음 페이지
			if($page != $totalPage){
				$nextPage = $page + 1;

				echo "<li class='page-item'><a class='page-link' href='./listBoard.php?page={$nextPage}'><span aria-hidden='true'>&rsaquo;</span></a></li>";
			}

			//마지막 페이지
			if($page != $totalPage){
				echo "<li class='page-item'><a class='page-link' href='./listBoard.php?page={$totalPage}'><span aria-hidden='true'>&raquo;</span></a></li>";
			}
		?>

		<!--<li class="page-item disabled">
			<a class="page-link" href="#" tabindex="-1" aria-disabled="true">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li> 
		<li class="page-item">
			<a class="page-link" href="#">
				<span aria-hidden="true">&lsaquo;</span>
			</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item active" aria-current="page">
			<a class="page-link" href="#">3</a> 
		</li>
		<li class="page-item"><a class="page-link" href="#">4</a></li>
		<li class="page-item"><a class="page-link" href="#">5</a></li>
		<li class="page-item"><a class="page-link" href="#">6</a></li>
		<li class="page-item"><a class="page-link" href="#">7</a></li>
		<li class="page-item">
			<a class="page-link" href="#">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">
				<span aria-hidden="true">&rsaquo;</span>
			</a>
		</li>-->
	</ul>
</div>