$(document).ready(function(){



});
var value1=/^[가-힣]{2,6}$/;
var value2=/^[0-1]{3}-[0-9]{4}-[0-9]{4}$/;
var value3=/^[\w]+@[a-zA-Z]+\.[a-zA-Z]+$/;
var value4=/^[1-9]{6,8}$/;
var check=[true,true,true,true,true];

function checkName(name){
  if(name.value.match(value1)){
    document.getElementById("txtName").innerHTML = "성공";
    check[0]=true;
  }else{
    document.getElementById("txtName").innerHTML = "한글(2~6 글자) 사용";
    check[0]=false;
  }
}
function checkPhone(name){
  if(name.value.match(value2)){
    document.getElementById("txtPhone").innerHTML = "성공";
    check[1]=true;
  }else{
    document.getElementById("txtPhone").innerHTML = "010-0000-0000의 양식에 맞춰 입력";
    check[1]=false;
  }
}
function checkEmail(name){
  if(name.value.match(value3)){
    document.getElementById("txtEmail").innerHTML = "성공";
    check[2]=true;
  }else{
    document.getElementById("txtEmail").innerHTML = "xxx1xx@x1xx.xx등의 이메일 형식 요망";
    check[2]=false;
  }
}
function checkPass(name){
  if(name.value.match(value4)){
    document.getElementById("txtPass").innerHTML = "성공";
    check[3]=true;
  }else{
    document.getElementById("txtPass").innerHTML = "숫자(6~12 글자) 사용";
    check[3]=false;
  }
}
function checkPassCheck(checkname,name){
  if(name.value.match(value4)==checkname.value){
    document.getElementById("txtPassCheck").innerHTML = "일치";
    check[4]=true;
  }else{
    document.getElementById("txtPassCheck").innerHTML = "불일치";
    check[4]=false;
  }
}
function join(){
  var allcheck = true;
  for (var i=0; i<check.length; i++){
    console.log(check[i]);
    if(!check[i]){
      allcheck=false;
    }
  }

  if(allcheck){
    document.modifyform.submit();
  }else{
    alert("필수항목을 모두 알맞게 기입해주세요.");
  }
}
