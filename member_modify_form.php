<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>정보수정</title>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="./modify.js">
</script>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/member.css">
<link rel="stylesheet" href="./css/LJ.css">

</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
		<?php

		$con = mysqli_connect("localhost", "root", "123456", "phpsolo");
    $sql    = "select * from members where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];
    $phone = $row["phone"];
    $email = $row["email"];




    mysqli_close($con);
?>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="modifyform" method="post" action="member_modify.php?id=<?=$userid?>">
							<div class="join">
				        <div class="jointop">
				          <h2>정보 수정</h2>
				        </div>
				        <div class="jointop">
				          <h4>필수항목</h4>
				        </div>
				        <div class="joininputdiv1">
									<p class="joininput" type="text" name="id">아이디 : <?=$userid?></p>
				        </div>
				        <div class="joininputdiv1">
				          <input id="inPassword"onkeyup="checkPass(document.getElementById('inPassword'));"class="joininput" type="text" name="pass" value="<?=$pass?>">
				          <p id="txtPass" class="joinp">숫자(6~12 글자) 사용</p>
				          <input id="inPasswordCheck"onkeyup="checkPassCheck(document.getElementById('inPasswordCheck'),document.getElementById('inPassword'));" class="joininput" type="text" name="" value="<?=$pass?>">
				          <p id="txtPassCheck" class="joinp1">불일치</p>
				        </div>
				        <div class="joininputdiv1">
				          <input id="inName"onkeyup="checkName(document.getElementById('inName'));"class="joininput" type="text" name="name" value="<?=$name?>">
				          <p id="txtName" class="joinp">한글(2~6 글자) 사용</p>
				        </div>
				        <div class="joininputdiv1">
				          <input id="inPhone"onkeyup="checkPhone(document.getElementById('inPhone'));"class="joininput" type="text" name="phone" value="<?=$phone?>">
				          <p id="txtPhone" class="joinp">010-0000-0000의 양식 사용</p>
				        </div>
				        <div class="joininputdiv1">
				          <input id="inEmail"onkeyup="checkEmail(document.getElementById('inEmail'));"class="joininput" type="text" name="email" value="<?=$email?>">
				          <p id="txtEmail" class="joinp">xxx1xx@x1xx.xx등의 이메일 형식 요망</p>
				        </div>
				      <!-- <div class="jointop">
				        <h4 class="choice">선택항목</h4>
				      </div>
				      <div class="birthdiv"><span class="bottomtextspan">생년월일</span>
				      &nbsp;
				        <input type="text" name="inyear" size="5" class="birthinput" />
				                  <select name="month" class="birthselect">
				                      <option name="month" value="01">1
				                      <option name="month" value="02">2
				                      <option name="month" value="03">3
				                      <option name="month" value="04">4
				                      <option name="month" value="05">5
				                      <option name="month" value="06">6
				                      <option name="month" value="07">7
				                      <option name="month" value="08">8
				                      <option name="month" value="09">9
				                      <option name="month" value="10">10
				                      <option name="month" value="11">11
				                      <option name="month" value="12">12
				                  </select>
				                  <select name="day" class="birthselect1">
				                      <option name="day" value="01">1
				                      <option name="day" value="02">2
				                      <option name="day" value="03">3
				                      <option name="day" value="04">4
				                      <option name="day" value="05">5
				                      <option name="day" value="06">6
				                      <option name="day" value="07">7
				                      <option name="day" value="08">8
				                      <option name="day" value="09">9
				                      <option name="day" value="10">10
				                      <option name="day" value="11">11
				                      <option name="day" value="12">12
				                      <option name="day" value="13">13
				                      <option name="day" value="14">14
				                      <option name="day" value="15">15
				                      <option name="day" value="16">16
				                      <option name="day" value="17">17
				                      <option name="day" value="18">18
				                      <option name="day" value="19">19
				                      <option name="day" value="20">20
				                      <option name="day" value="21">21
				                      <option name="day" value="22">22
				                      <option name="day" value="23">23
				                      <option name="day" value="24">24
				                      <option name="day" value="25">25
				                      <option name="day" value="26">26
				                      <option name="day" value="27">27
				                      <option name="day" value="28">28
				                      <option name="day" value="29">29
				                      <option name="day" value="30">30
				                      <option name="day" value="31">31
				                  </select>
				                  <input type="radio" class="birthradio" name="gender" value="남자"/> <span class="bottomtextspan">남자</span>
				                  <input type="radio" class="birthradio" name="gender" value="여자"/> <span class="bottomtextspan">여자</span>
				      </div>
				      <div class="jointop">
				        <br><span class="agreetext">당신의 취미를 선택하세요 (다중선택 가능)</span><br><br>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="영화감상">
				        <span class="agreetext">영화감상&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="맛집탐방">
				        <span class="agreetext">맛집탐방&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="독서">
				        <span class="agreetext">독서&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="요가">
				        <span class="agreetext">요가&nbsp</span><br>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="축구">
				        <span class="agreetext">축구&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="자전거">
				        <span class="agreetext">자전거&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="연극">
				        <span class="agreetext">연극&nbsp</span>
				        <input class="agreeinput" type="checkbox" name="hobby[]" value="미술관">
				        <span class="agreetext">미술관&nbsp</span>
				      </div> -->
				      <div class="joininputdiv2">
				        <a class="btnjoin"
				        onclick="join()">정보수정</a>
				      </div>
				      </div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
