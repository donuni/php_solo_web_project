<?php

$conn = mysqli_connect("localhost", "root", "123456", "phpsolo");
define('SCALE', 10);
//*****************************************************
$sql=$result=$total_record=$total_page=$start="";
$row="";
$memo_id=$memo_num=$memo_date=$memo_content="";
$total_record=0;
//*****************************************************

if(isset($_GET["mode"])&&$_GET["mode"]=="search"){
  //제목, 내용, 아이디
  $find = test_input($_POST["find"]);
  $search = test_input($_POST["search"]);

  $q_search = mysqli_real_escape_string($conn, $search);
  $sql="SELECT * from `qna` where $find like '%$q_search%' order by num desc;";
}else{
  $sql="SELECT * from `qna` order by group_num desc, ord asc;";
}

$result=mysqli_query($conn,$sql);
if(!$result){
  $result=0;
  $total_record=0;
}else{
$total_record=mysqli_num_rows($result);

}
$total_page=($total_record % SCALE == 0 )?
($total_record/SCALE):(ceil($total_record/SCALE));

//2.페이지가 없으면 디폴트 페이지 1페이지
if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}
if (isset($_GET["nowpagelist"])){
  $now_page_list = $_GET["nowpagelist"];
  $first_num=$now_page_list-9;
}else{
  $now_page_list=10;
  $first_num=1;
}
//3.현재페이지 시작번호계산함.
$start=($page -1) * SCALE;
//4. 리스트에 보여줄 번호를 최근순으로 부여함.
$number = $total_record - $start;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>코멘트 게시판 > 목록보기</title>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/board.css">
</head>
<body>
<header>
    <?php include "./header.php";?>
</header>
<section>
  <div id="board_box">
	    <h3>
	    	코멘트 게시판 > 목록보기
		</h3>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
        <?php
                    for ($i = $start; $i < $start+SCALE && $i<$total_record; $i++){
                      mysqli_data_seek($result,$i);
                      $row=mysqli_fetch_array($result);
                      $num=$row['num'];
                      $id=$row['id'];
                      $name=$row['name'];
                      $hit=$row['hit'];
                      $regist_day= substr($row['regist_day'],0,10);
                      $subject=$row['subject'];
                      $subject=str_replace("\n", "<br>",$subject);
                      $subject=str_replace(" ", "&nbsp;",$subject);
                      $depth=(int)$row['depth'];//공간을 몆칸을 띄어야할지 결정하는 숫자임
                      $space="";
                      for($j=0;$j<$depth;$j++){
                        $space="&nbsp;&nbsp;".$space;
                      }
                  ?>
				<li>
					<span class="col1"><?=$num?></span>
					<span class="col2"><a href="comment_view.php?num=<?=$num?>&page=<?=$page?>&hit=<?=$hit+1?>"><?=$space.$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>
<?php
   	   $num--;
   }
   mysqli_close($conn);

?>
	    	</ul>
        <div id="page_button">





          <ul id="page_num">
          <?php
          $now_page_list_add=$now_page_list;
          	if ($total_page>=2 && $page >= 2)
          	{
          		$new_page = $page-1;

              if($page>10){
                  $now_page_list_minas=$now_page_list-10;
                  $next_new_page=$now_page_list_minas-1;
          		    echo "<li><a href='comment_list.php?page=$next_new_page&nowpagelist=$now_page_list_minas'>◀◀&nbsp;</a> </li>";
              }
              if(($new_page)==($now_page_list_add-10)){

                  $new_page=$now_page_list_add-11;
                  $now_page_list_add-=10;
                echo "<li><a href='comment_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;◀</a> </li>";
              }else{
            		echo "<li><a href='comment_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;◀</a> </li>";
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
          			echo "<li><a href='comment_list.php?page=$i&nowpagelist=$now_page_list'> $i </a><li>";
          		}
             	}
             	if ($total_page>=2 && $page != $total_page)
             	{
          		$new_page = $page+1;




              if (($now_page_list_add-1)==$page) {
                $new_page=$now_page_list_add+1;
                $now_page_list_add+=10;
                echo "<li><a href='comment_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;▶</a> </li>";
              }else{
                echo "<li><a href='comment_list.php?page=$new_page&nowpagelist=$now_page_list_add'>&nbsp;▶</a> </li>";
              }


          		// echo "<li> <a href='comment_list.php?page=$new_page&nowpagelist=$now_page_list'>▶&nbsp;</a> </li>";

              if($now_page_list+10<floor($total_record/SCALE)){
                $now_page_list_add=$now_page_list+10;
                $next_new_page=$now_page_list+1;
            		echo "<li> <a href='comment_list.php?page=$next_new_page&nowpagelist=$now_page_list_add'>&nbsp;▶▶</a> </li>";
              }
          	}
          	else
          		echo "<li>&nbsp;</li>";
          ?>
          			</ul> <!-- page -->



			<ul class="buttons">
				<li><button onclick="location.href='comment_list.php'">목록</button></li>
				<li>
<?php
    if($userid) {
      $boardmode="new";

?>
					<button onclick="location.href='comment_write_edit_form.php'">글쓰기</button>
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
    <?php include "./footer.php";?>
</footer>
</body>
</html>
