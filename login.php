<?php

session_start();
if(isset($_POST['sub'])){

$user = $_POST['user'];
$pass = $_POST['pass'];
$loginerror = "";

$con = mysqli_connect("localhost", "skychatroot", "root12", "skychatlive");

$res1 = mysqli_query($con, "SELECT * FROM account where user='$user' and pass='$pass'");

$rows = mysqli_num_rows($res1);



if($rows == 1){
	$_SESSION['verify'] = $user;
	header("location: /");
}else{
	header("location: signin.php?incorrectlogin");
	$loginerror = "*Incorrect Login";
}

}




?>