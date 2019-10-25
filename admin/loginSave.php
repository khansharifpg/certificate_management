<?php 
session_start();

include_once("../dbCon.php");

$conn =connect();

$valid=true;


if($_POST['email']==null){
	$valid=false;
	$_SESSION['lmsg'] = 'Please input your password';
}
if($_POST['password']==null){
	$valid=false;
	 $_SESSION['lmsg'] = 'Please input your Email/Username';
}


if(isset($_POST["login"])&& $valid==true){

$email_username= mysqli_real_escape_string($conn,$_POST['email']);
$password= mysqli_real_escape_string($conn,$_POST['password']);

$sql=" SELECT * FROM user where email ='$email_username' AND pass='$password'";
			
            $result = $conn->query($sql);
					
              if($result->num_rows>0){
	               $_SESSION['isLoggedIn']=TRUE;
					foreach($result as $row){
							$_SESSION['email']=$row['email'];
							$_SESSION['fullname']=$row['fullname'];
            }
	
	header('Location:dashboard');
}else{
	$_SESSION['lmsg']="invalid login";
	header('Location:index');
}
}elseif($valid==false){
	$_SESSION['lmsg']="invalid login";
	header('Location:index');
	
}
?>