<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" href="./css/LJ.css">
<link rel="stylesheet" href="./css/common.css">
<script src="./login.js">
</script>
</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
          		<form id="login_form" name="login_form" method="post" action="login.php">
								<div class="mainlogin">
									<div class="mainlogotext">
										<img class="mainlogo" src="./images/login_logo.png" alt="">
										<h3 class="mainhead">로그인</h3>
									</div>
									<div class="memberRadiogroup">
										<input class="memberRadio" type="radio" name="" value="회원">
										<p class="memberRadiotext">회원</p>
										<input id="notmember"class="memberRadio" type="radio" name="" value="비회원">
										<p class="memberRadiotext">비회원</p>
									</div>
									<div class="idpass">
										<div class="idpasstextdiv">
											<p class="idtext">아이디</p>
											<p class="idtext">비밀번호</p>
										</div>
										<div class="idpassinputdiv">
											<input id="loginInId"class="idpassinput" type="text" name="id" value="">
											<input id="loginInPass"class="idpassinput" type="text" name="pass" value="">
										</div>
										<div class="idpassbtndiv">
											<a class="btnlogin"
											onclick="check_input();">Login</a>
										</div>
									</div>
									<div class="memberRadiogroup">
										<input class="memberRadio" type="radio" name="" value="아이디 저장">
										<p class="memberRadiotext1">아이디 저장</p>
										<input class="memberRadio1" type="radio" name="" value="키보드 보안 접속">
										<p class="memberRadiotext1">키보드 보안 접속</p>
										<span><button class="btnq"type="button" name="button">?</button></span>
									</div>
									<div class="btnbottomdiv">
										<a class="btnbottom" href="./member_form.php">회원가입</a>
										<a class="btnbottom" href="#">아이디 찾기</a>
										<a class="btnbottom" href="#">비밀번호 찾기</a>
									</div>
								</div>
           		</form>
	</section>
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
