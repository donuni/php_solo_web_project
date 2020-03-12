<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="./css/LJ.css">
<title>회원가입</title>
<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="./join.js">
</script>
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/member.css">

</head>
<body>
	<header>
    	<?php include "header.php";?>
    </header>
    <section>
          <div id="main_content">
        		<div id="join_box">
              <form action="member_insert.php" name="joinform" method="post">
      <div class="join">
        <div class="jointop">
          <h2>회원가입</h2>
        </div>
        <div class="jointop">
          <h4>필수항목</h4>
        </div>
        <div class="joininputdiv1">
          <input id="inId"onkeyup="checkId(document.getElementById('inId'));"class="joininput" type="text" name="id" value="asdasd">
          <p id="txtId" class="joinp2">알파벳과 숫자(6~15글자)만 사용</p>
	        <a class="idcheck"
	        onclick="check_id()">중복확인</a>
        </div>
        <div class="joininputdiv1">
          <input id="inPassword"onkeyup="checkPass(document.getElementById('inPassword'));"class="joininput" type="text" name="pass" value="123123">
          <p id="txtPass" class="joinp">숫자(6~12 글자) 사용</p>
          <input id="inPasswordCheck"onkeyup="checkPassCheck(document.getElementById('inPasswordCheck'),document.getElementById('inPassword'));" class="joininput" type="text" name="" value="123123">
          <p id="txtPassCheck" class="joinp1">불일치</p>
        </div>
        <div class="joininputdiv1">
          <input id="inName"onkeyup="checkName(document.getElementById('inName'));"class="joininput" type="text" name="name" value="하하하">
          <p id="txtName" class="joinp">한글(2~6 글자) 사용</p>
        </div>
        <div class="joininputdiv1">
          <input id="inPhone"onkeyup="checkPhone(document.getElementById('inPhone'));"class="joininput" type="text" name="phone" value="010-0000-0000">
          <p id="txtPhone" class="joinp">010-0000-0000의 양식 사용</p>
        </div>
        <div class="joininputdiv1">
          <input id="inEmail"onkeyup="checkEmail(document.getElementById('inEmail'));"class="joininput" type="text" name="email" value="asdasd@maasd.asd">
          <p id="txtEmail" class="joinp">xxx1xx@x1xx.xx등의 이메일 형식 요망</p>
        </div>
        <div class="jointop">
          <input class="agreeinput" type="radio" name="emailradio"value="허용" checked>
          <span class="agreetext">이메일 수신 동의</span>
          <input class="agreeinput" type="radio" name="emailradio"value="거부">
          <span class="agreetext">이메일 수신 거부</span><br>
        </div>
      </div>
      <div class="jointop">
        <input id="agreeage"class="agreeinput" type="radio" name="agreeage" value="만 14세 이상">
        <span class="agreetext">만 14세 이상입니다.</span><br>
        <input id="agreeterms" class="agreeinput" type="radio" name="agreeterms" value="이용 약관 동의">
        <span class="agreetext">이용 약관 동의 <button class="termsbtn" type="button">내용보기</button></span><br>
        <input id="agreeprivacy" class="agreeinput" type="radio" name="agreeprivacy" value="개인정보 수집 및 동의">
        <span class="agreetext">개인정보 수집 및 동의 <button class="termsbtn" type="button">내용보기</button></span>
      </div>

      <div class="jointop">
        <table>
          <tr>
            <td class="td2">구분</td>
            <td class="td2">목적</td>
            <td class="td2">항목</td>
            <td class="td2">보유 및 이용기간</td>
          </tr>
          <tr>
            <td class="td1">필수</td>
            <td class="td1">이용자 식별, 서비스 이행을 위한 연락</td>
            <td class="td1">이름, 아이디, 비밀번호, 이메일</td>
            <td class="td1">회원탈퇴 후 5일까지</td>
          </tr>
        </table>
      </div>
      <div class="jointop">
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
      </div>
      <div class="joininputdiv2">
        <a class="btnjoin"
        onclick="join()">회원가입</a>
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
