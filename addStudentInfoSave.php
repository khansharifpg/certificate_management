<?php 

include_once("dbCon.php");

$conn =connect();

if(isset($_POST["student_submit"])){
	
	$Local_Id =$_POST['localid'];
	
	$ncc_Id = $_POST['nccid'];

	$studentfull_name = $_POST['studentfullname'];

	$dateof_birth = $_POST['dateofbirth'];

	$student_email = $_POST['studentemail'];
	
	$phone_number = $_POST['phonenumber'];

	$Library_clearence = $_POST['libraryclearence'];

	
	$sql="INSERT INTO students_info(local_id, ncc_id, full_name, dob, email, phone, library_clearance) VALUES('$Local_Id', '$ncc_Id', '$studentfull_name', '$dateof_birth', '$student_email', '$phone_number', '$Library_clearence')";
	
		echo $sql;
	if($conn->query($sql)){
	echo "Added successfully";
	}
	else {
	 echo "not succesfull";
	}
}

?>