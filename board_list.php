<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>게시판 > 목록보기</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
   	<div id="board_box">
	    <h3>
	    	게시판 > 목록보기
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col4">첨부</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	if (isset($_GET["nowpagelist"])){
		$now_page_list = $_GET["nowpagelist"];
    $first_num=$now_page_list-9;
  }else{
    $now_page_list=10;
    $first_num=1;
  }

	$con = mysqli_connect("localhost", "root", "123456", "phpsolo");
	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 글 수

	$scale = 10;

	// 전체 페이지 수($total_page) 계산
	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;

	// 표시할 페이지($page)에 따라 $start 계산
	$start = ($page - 1) * $scale;

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
	  $num         = $row["num"];
	  $id          = $row["id"];
	  $name        = $row["name"];
	  $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $hit         = $row["hit"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.gif'>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="board_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num">
<?php
$now_page_list_add=$now_page_list;
	if ($total_page>=2 && $page >= 2)
	{
		$new_page = $page-1;
    if($page>10){
        $now_page_list_minas=$now_page_list-10;
        $next_new_page=$now_page_list_minas-1;
		    echo "<li><a href='board_list.php?page=$next_new_page&nowpagelist=$now_page_list_minas'>◀◀&nbsp;</a> </li>";
    }else{

    }
    if (($now_page_list-10)==$page) {
      echo "<li><a href='board_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;◀</a> </li>";
    }else{
  		echo "<li><a href='board_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;◀</a> </li>";
    }
	}
	else
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=$first_num;$i<$now_page_list; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i &nbsp;</b></li>";
		}
		else
		{
			echo "<li><a href='board_list.php?page=$i&nowpagelist=$now_page_list'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;




    if (($now_page_list_add+11)==$page) {
      $now_page_list_add+=10;
      $new_page+=10;
      echo "<li><a href='board_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;▶</a> </li>";
    }else{
      echo "<li><a href='board_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;▶</a> </li>";
    }


		// echo "<li> <a href='board_list.php?page=$new_page&nowpagelist=$now_page_list'>▶&nbsp;</a> </li>";

    if($now_page_list+10<floor($total_record/$scale)){
      $now_page_list_add=$now_page_list+10;
      $next_new_page=$now_page_list+1;
  		echo "<li> <a href='board_list.php?page=$next_new_page&nowpagelist=$now_page_list_add'>&nbsp;▶▶</a> </li>";
    }
	}
	else
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->
			<ul class="buttons">
				<li><button onclick="location.href='board_list.php'">목록</button></li>
				<li>
<?php
    if($userid) {
      $boardmode="new";

?>
					<button onclick="location.href='board_form.php?boardmode=<?=$boardmode?>'">글쓰기</button>
<?php
	} else {
?>
					<!-- <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a> -->
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
