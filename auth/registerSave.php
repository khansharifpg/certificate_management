
<?php 
include_once("../dbCon.php");

session_start();

$conn =connect();

$valid=true; 

if($_POST['repassword']==null){
	$valid=false;
	$_SESSION['rmsg']='Retype Password field is blank';

}
	
if($_POST['password']!==$_POST["repassword"]){
	$valid=false;
	echo'Password does not match';
	
}	
if($_POST['email']==null){
	$valid=false;
	$_SESSION['rmsg']='Email field is blank';
	
}

if($_POST['fullname']==null){
	$valid=false;
	$_SESSION['rmsg']='User Name field is blank';
	
}


if(isset($_POST["register"]) && ($valid==true)){

	$fullName = $_POST['fullname'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$ssql = "SELECT email FROM user WHERE email='$email'";
	//echo $ssql;
	$result = $conn->query($ssql);
	if($result->num_rows>0){
		
		$_SESSION['rmsg']='Email  already in use';
		header("Location:register.php");
		
	}
	else{

	$sql="INSERT INTO user (fullname, email, pass ) VALUES ('$fullName','$email','$password')";
	//echo $sql;
	if($conn->query($sql)){
		header("Location:login.php");
		
	}else{
		echo "404 not found";
	}
	}
}elseif($valid==false){
	header("Location:register.php");
}


?>