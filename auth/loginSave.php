<?php 
session_start();

include_once("../dbCon.php");

$conn =connect();

$valid=true;

$_SESSION['mail']= $_POST["email_username"];
$_SESSION['pass'] = $_POST["password"];

if($_SESSION['pass']==null){
	$valid=false;
	$_SESSION['lmsg'] = 'Please input your password';
}
if($_SESSION['mail']==null){
	$valid=false;
	 $_SESSION['lmsg'] = 'Please input your Email/Username';
}




if(isset($_POST["login"])&& $valid==true){
$email_username=$_POST['email_username'];
$password=md5($_POST['password']);

$sql=" SELECT * FROM user where email ='$email_username' 
								OR username='$email_username' 
								AND pass='$password'";
								
$result = $conn->query($sql);
					
if($result->num_rows>0){
	
	$_SESSION['lmsg']="ok";
	unset ($_SESSION["mail"]);
	unset ($_SESSION["pass"]);
	header('Location:login.php');
}else{
	$_SESSION['lmsg']="invalid login";
	unset ($_SESSION["pass"]);
	header('Location:login.php');
}
}elseif($valid==false){
	
	header('Location:login.php');
	
}
?>