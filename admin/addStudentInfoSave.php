<?php 

session_start();
include_once("dbCon.php");

$conn =connect();

if(isset($_POST['student_submit'])){
	
	$Local_Id = $_POST['localid'];
	$ncc_Id = $_POST['nccid'];
	$studentfull_name = $_POST['studentfullname'];
	$dateof_birth = $_POST['dateofbirth'];
	$student_email = $_POST['studentemail'];
	$phone_number = $_POST['phonenumber'];
	$Library_clearence = $_POST['libraryclearence'];
	
	$sql="INSERT INTO students_info(local_id, ncc_id, full_name, dob, email, phone, library_clearance) VALUES('$Local_Id', '$ncc_Id', '$studentfull_name', '$dateof_birth', '$student_email', '$phone_number', '$Library_clearence')";
	//echo $sql;exit;
		if($conn->query($sql)){

	$_SESSION['amsg']='Added successfully';
	header('Location:addStudentInfo.php');
	}
	else{
	$_SESSION['emsg']="Something Went wrong!! Try Again later";
	header('Location:addStudentInfo.php');
	}
}


//Edit sql
if(isset($_POST["student_edit"])){
	
	$Local_Id = $_POST['localid'];
	$ncc_Id = $_POST['nccid'];
	$studentfull_name = $_POST['studentfullname'];
	$dateof_birth = $_POST['dateofbirth'];
	$student_email = $_POST['studentemail'];
	$phone_number = $_POST['phonenumber'];
	$Library_clearence = $_POST['libraryclearence'];
	
	$sql="UPDATE students_info SET local_id='$Local_Id', ncc_id='$ncc_Id', full_name='$studentfull_name',
	dob='$dateof_birth', email='$student_email', phone='$phone_number', library_clearance='$Library_clearence' WHERE local_id='$Local_Id'";
	
	//echo $sql;
	//exit;
	if($conn->query($sql)){

	$_SESSION['amsg']='Edited successfully';
	header('Location:addStudentInfo.php');
	}
	else{
	$_SESSION['emsg']="Something Went wrong!! Try Again later";
	header('Location:addStudentInfo.php');
	}
}


?>