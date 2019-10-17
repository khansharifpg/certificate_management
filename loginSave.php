<?php 
session_start();

include_once("admin/dbCon.php");

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
$email_username=$_POST['email'];
$password=$_POST['password'];

$sql=" SELECT * FROM students_info where email ='$email_username' AND password='$password'";
			
            $result = $conn->query($sql);
					
              if($result->num_rows>0){
	               $_SESSION['isLoggedIn']=TRUE;
					foreach($result as $row){
							$_SESSION['email']=$row['email'];
							$_SESSION['fullname']=$row['full_name'];
							$_SESSION['local_id'] = $row['local_id'];
							$_SESSION['ncc_id'] = $row['ncc_id'];
							$_SESSION['lc'] = $row['library_clearance'];
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