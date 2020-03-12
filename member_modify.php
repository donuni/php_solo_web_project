<?php
    $id = $_GET["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email  = $_POST["email"];
    $phone  = $_POST["phone"];


    $con = mysqli_connect("localhost", "root", "123456", "phpsolo");
    $sql = "update members set pass='$pass', name='$name' , email='$email', phone='$phone'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);
    session_start();
    $_SESSION["userid"] = $id;
    $_SESSION["username"] = $name;

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>
