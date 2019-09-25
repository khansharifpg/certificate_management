
<?php 
include_once("../dbCon.php");

session_start();

$conn =connect();

$valid=true; 

$_SESSION['r_fullname']=$_POST["fullname"];
$_SESSION['r_username']=$_POST["username"];
$_SESSION['r_email']=$_POST["email"];
$_SESSION['r_pass']=$_POST["password"];




if($_POST['repassword']==null){
	$valid=false;
	$_SESSION['rmsg']='Retype Password field is blank';

}
	
if($_SESSION['r_pass']!==$_POST["repassword"]){
	$valid=false;
	echo'Password does not match';
	
}	




if($_SESSION['r_pass']==null){
	$valid=false;
	$_SESSION['rmsg']='Password is blank';
	
}
if($_SESSION['r_email']==null){
	$valid=false;
	$_SESSION['rmsg']='Email field is blank';
	
}

if($_SESSION['r_username']==null){
	$valid=false;
	$_SESSION['rmsg']='User Name field is blank';
	
}

if($_SESSION['r_fullname']==null){
	$valid=false;
	$_SESSION['rmsg']='Full Name field is blank';
	
}

function refresh(){
	unset($_SESSION['r_fullname']);
	unset($_SESSION['r_username']);
	unset($_SESSION['r_email']);
	unset($_SESSION['r_pass']);
	
}

if(isset($_POST["register"]) && ($valid==true)){

	$fullName = $_POST['fullname'];
	$username =$_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$ssql = "SELECT email FROM user WHERE email='$email'";
	$ql = "SELECT username FROM user WHERE username='$username'";
	//echo $ssql;
	$result = $conn->query($ssql);
	$resultdata = $conn->query($ql);
	if($result->num_rows>0){
		
		$_SESSION['rmsg']='Email  already in use';
		header("Location:register.php");
		
	}elseif($resultdata->num_rows>0){
		$_SESSION['rmsg']='Username already in use';
		header("Location:register.php");
		
	}
	else{

	$sql="INSERT INTO user (fullname, username, email, pass ) VALUES ('$fullName','$username','$email','$password')";
	//echo $sql;
	if($conn->query($sql)){
		refresh();
		header("Location:login.php");
		
	}else{
		echo "404 not found";
	}
	}
}elseif($valid==false){
	header("Location:register.php");
}

if(isset($_POST['reset'])){
	refresh();
	unset($_SESSION['rmsg']);
}

?>