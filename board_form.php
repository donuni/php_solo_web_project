<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
<header>
    <?php include "header.php";?>
</header>
<section>
  <?php
    $newinsert=false;
    if(isset($_GET["boardmode"])){
      $mode  = $_GET["boardmode"];
      if($mode == "new"){
        $newinsert = true;
      	$subject = "";
      	$content = "";
        $modeaction = "board_insert.php";
      }
    }else if(isset($_GET["num"]) && isset($_GET["page"])){
      $num  = $_GET["num"];
    	$page = $_GET["page"];

    	$con = mysqli_connect("localhost", "root", "123456", "phpsolo");
    	$sql = "select * from board where num=$num";
    	$result = mysqli_query($con, $sql);
    	$row = mysqli_fetch_array($result);
    	$name       = $row["name"];
    	$subject    = $row["subject"];
    	$content    = $row["content"];
    	$file_name  = $row["file_name"];
      $modeaction = "board_modify.php?num=$num&page=$page";
    }

   ?>
   	<div id="board_box">
	    <h3 id="board_title">
        <?php
          if($newinsert){
        ?>
         게시판 > 글 쓰기
        <?php
      }else{
        ?>
         게시판 > 글 수정하기
        <?php
      }
         ?>
		</h3>



    <form  name="board_form" method="post" action=<?=$modeaction?> enctype="multipart/form-data">
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
        <li>
          <?php
            if($newinsert){
          ?>
           <span class="col1"> 첨부 파일</span>
           <span class="col2"><input type="file" name="upfile"></span>
          <?php
        }else{
          ?>
          <span class="col1"> 첨부 파일 : </span>

          <span class="col2"><?=$file_name?>
        </li>
        <li>
          <span class="col1"> 수정할 파일 : </span>
          <span class="col2"><input type="file" name="upfile"></span>
          <?php
        }
           ?>
        </li>
          </ul>
      <ul class="buttons">
        <?php
          if($newinsert){
        ?>
        <li><button type="button" onclick="check_input()">완료</button></li>
        <?php
      }else{
        ?>
        <li><button type="button" onclick="check_input()">수정하기</button></li>
        <?php
      }
         ?>
         <li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
    </ul>
    </form>




    

	</div> <!-- board_box -->
</section>
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
