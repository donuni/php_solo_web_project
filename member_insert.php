<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email  = $_POST["email"];

    $mailallowing = $_POST["emailradio"];
    $phone  = $_POST["phone"];
    $inyear  = $_POST["inyear"];
    $month  = $_POST["month"];
    $day  = $_POST["day"];
    $hobbycheck  = $_POST["hobby"];
    $gender  = $_POST["gender"];

    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
    $birth_day = $inyear."-".$month."-".$day;
    for($i=0 ; $i<count($hobbycheck); $i++){
      if($i===0){
        $hobby=$hobbycheck[$i];
      }else{
        $hobby=$hobby.", ".$hobbycheck[$i];
      }
    }
    $con = mysqli_connect("localhost", "root", "123456", "phpsolo");

	$sql = "insert into members(id, pass, name, email, regist_day, level,
    point, mailallowing, phone, birth, hobby, gender) ";
	$sql .= "values('$id', '$pass', '$name', '$email', '$regist_day', 9, 0, '$mailallowing', '$phone', '$birth_day', '$hobby', '$gender')";

	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
    mysqli_close($con);

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
