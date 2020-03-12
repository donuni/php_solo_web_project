<?php
$conn = mysqli_connect("localhost", "root", "123456", "phpsolo");
//*****************************************************
$num=$id=$subject=$day=$name=$hit="";
//*****************************************************

if(empty($_GET['page'])){
  $page=1;
}else{
  $page=$_GET['page'];
}

if(isset($_GET["num"])&&!empty($_GET["num"])){

  	$num  = $_GET["num"];
    $sql = "select * from qna where num=$num";

    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }
    $row=mysqli_fetch_array($result);
    $id=$row['id'];
    $name=$row['name'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    $regist_day=$row['regist_day'];
    $hit=$_GET["hit"];

    $q_num = mysqli_real_escape_string($conn, $num);

    $sql="update qna set hit=$hit where num=$q_num";

    $result = mysqli_query($conn,$sql);
    if (!$result) {
      die('Error: ' . mysqli_error($conn));
    }

    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>게시판 > 내용보기</title>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/board.css">
<script>
function check_delete(num) {
var result=confirm("삭제하시겠습니까?\n Either OK or Cancel.");
if(result){
      window.location.href='./comment_dml_board.php?mode=delete&num='+num;
}
}
</script>
</head>
<body>
<header>
    <?php include "./header.php";?>
</header>
<section>
  <div id="board_box">
    <h3 class="title">
    게시판 > 내용보기
  </h3>

    <ul id="view_content">
    <li>
      <span class="col1"><b>제목 :</b> <?=$subject?></span>
      <span class="col2"><?=$name?> | <?=$regist_day?></span>
    </li>
    <li>
      <?=$content?>
    </li>
    </ul>
    <ul class="buttons">
      <li><button onclick="location.href='comment_list.php?page=<?=$page?>'">목록</button></li>
      <?php
      if($id == $userid){
      ?>
     <li><button onclick="location.href='comment_write_edit_form.php?num=<?=$num?>&mode=update'">수정</button></li>
     <li><button onclick="check_delete(<?=$num?>)">삭제</button></li>
      <?php
      }
      $boardmode="new";
       ?>
      <li><button onclick="location.href='comment_write_edit_form.php?mode=response&num=<?=$num?>'">답변</button></li>
      <li><button onclick="location.href='comment_write_edit_form.php'">글쓰기</button></li>
  </ul>
</div> <!-- board_box -->
</section>
<footer>
    <?php include "./footer.php";?>
</footer>
</body>
</html>
