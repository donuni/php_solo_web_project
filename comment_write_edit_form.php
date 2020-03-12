<?php

//*****************************************************
$num=$id=$subject=$content=$day=$hit="";
$mode="insert";
$checked="";
$disabled="";
//*****************************************************
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
$conn = mysqli_connect("localhost", "root", "123456", "phpsolo");
// 수정글쓰기, 답변글쓰기, New글쓰기 세부분으로 분류했음
if((isset($_GET["mode"])&&$_GET["mode"]=="update")
  ||(isset($_GET["mode"])&&$_GET["mode"]=="response") ){
    $mode=$_GET["mode"];//$mode="update"or"response"
    $num=$_GET["num"];
    $sql="SELECT * from `qna` where num ='$num';";
    $result = mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    $id=$row['id'];
    $subject= htmlspecialchars($row['subject']);
    $content= htmlspecialchars($row['content']);
    $subject=str_replace("\n", "<br>",$subject);
    $subject=str_replace(" ", "&nbsp;",$subject);
    $content=str_replace("\n", "<br>",$content);
    $content=str_replace(" ", "&nbsp;",$content);
    $day=$row['regist_day'];
    $is_html=$row['is_html'];
    $checked=($is_html=="y")? ("checked"):("");
    $hit=$row['hit'];
    if($mode == "response"){
      $subject="[re]".$subject;
      $content="re>".$content;
      $content=str_replace("<br>", "<br>▶",$content);
      $disabled="disabled";
    }
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>코멘트 게시판 작성</title>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요");
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
<header>
    <?php include "./header.php";?>
</header>
<section>
  <div id="board_box">
	    <h3 id="board_title">
        <?php
          if($mode=="insert"){
        ?>
         게시판 > 글 쓰기
         <?php
         }else if($mode=="update"){
         ?>
         게시판 > 글 수정하기
         <?php
         }else if($mode=="response"){
          ?>
          게시판 > 답변 작성하기
          <?php
         }
           ?>



		</h3>



    <form  name="board_form" method="post" action="comment_dml_board.php?mode=<?=$mode?>&num=<?=$num?>" enctype="multipart/form-data">
       <ul id="board_form">
      <li>
        <span class="col1">이름 : </span>
        <span class="col2"><?=$username?></span>
      </li>
        <li>
          <span class="col1">제목 : </span>
          <span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
        </li>
        <li id="text_area">
          <span class="col1">내용 : </span>
          <span class="col2">
            <textarea name="content"><?=$content?></textarea>
          </span>
        </li>
          </ul>
      <ul class="buttons">
        <?php
          if($mode=="insert"){
        ?>
        <li><button type="button" onclick="check_input()">작성완료</button></li>
        <?php
      }else if($mode=="update"){
        ?>
        <li><button type="button" onclick="check_input()">수정하기</button></li>
        <?php
       }else if($mode=="response"){
         ?>
         <li><button type="button" onclick="check_input()">답변하기</button></li>
         <?php
       }
          ?>
         <li><button type="button" onclick="location.href='comment_list.php'">목록</button></li>
    </ul>
    </form>

	</div> <!-- board_box -->
</section>
<footer>
    <?php include "./footer.php";?>
</footer>
</body>
</html>
