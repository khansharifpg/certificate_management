<?php 

session_start();
include_once("dbCon.php");

$conn =connect();

$valid=true; 

$_SESSION['a_localid']=$_POST["localid"];
$_SESSION['a_nccid']=$_POST["nccid"];
$_SESSION['a_studentfullname']=$_POST["studentfullname"];
$_SESSION['a_dateofbirth']=$_POST["dateofbirth"];
$_SESSION['a_studentmail']=$_POST["studentemail"];
$_SESSION['a_phonenumber']=$_POST["phonenumber"];
$_SESSION['a_libraryclearence']=$_POST["libraryclearence"];



if($_POST["phonenumber"]==null){
  $valid=false;
  $_SESSION['amsg']='Input Your Phone Number';
}

if($_POST["studentemail"]==null){
	$valid=false;
	$_SESSION['amsg']='Input Your Email';
	
}

if($_POST["dateofbirth"]==null){
	$valid=false;
	$_SESSION['amsg'] ='Input your DOB';
	
}	

if($_POST["studentfullname"]==null){
	$valid=false;
	$_SESSION['amsg'] ='Input your Full Name';
	
}

if($_POST["nccid"]==null){
	$valid=false;
	$_SESSION['amsg'] ='Input your NCC ID';
	
}

if($_POST["localid"]==null){
	$valid=false;
	$_SESSION['amsg'] ='Input your Local ID';
	
}

function refresh(){
	unset($_SESSION['a_localid']);
	unset($_SESSION['a_nccid']);
	unset($_SESSION['a_studentfullname']);
	unset($_SESSION['a_dateofbirth']);
	unset($_SESSION['a_studentmail']);
	unset($_SESSION['a_phonenumber']);
	unset($_SESSION['a_libraryclearence']);
}



if(isset($_POST['student_submit']) && ($valid==true)){
	
	$Local_Id =$_POST['localid'];
	
	$ncc_Id = $_POST['nccid'];

	$studentfull_name = $_POST['studentfullname'];

	$dateof_birth = $_POST['dateofbirth'];

	$student_email = $_POST['studentemail'];
	
	$phone_number = $_POST['phonenumber'];

	$Library_clearence = $_POST['libraryclearence'];

	
	$sql="INSERT INTO students_info(local_id, ncc_id, full_name, dob, email, phone, library_clearance) VALUES('$Local_Id', '$ncc_Id', '$studentfull_name', '$dateof_birth', '$student_email', '$phone_number', '$Library_clearence')";
	
		if($conn->query($sql)){
	refresh();
	$_SESSION['amsg']='Added successfully';
	header('Location:viewStudentInfo.php');
	}
	else {
	$_SESSION['amsg']="not succesfull";
	header('Location:viewStudentInfo.php');
	}
}elseif($valid==false){
	header('Location:addStudentInfo.php');
}


?>