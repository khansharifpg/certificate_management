<?php 

include_once("dbCon.php");

$conn =connect();

if(isset($_POST["course_submit"])){
	
	$Student_Id =$_POST['StudentId'];
	
	$batche_No = $_POST['batcheNo'];

	$Course_Name = $_POST['CourseName'];

	$EntryYear = $_POST['EnYear'];
	

	$sql="INSERT INTO student_course(StudentId,	batch, 	course_name, year ) VALUES('$Student_Id', '$batche_No','$Course_Name', '$EntryYear')";
		
	echo $sql;
	if($conn->query($sql)){
	echo "Added successfully";
	}
	else {
	 echo "not succesfull";
	}
}

?>