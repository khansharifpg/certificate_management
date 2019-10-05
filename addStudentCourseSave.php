<?php 

include_once("dbCon.php");

$conn =connect();

if(isset($_POST["student_submit"])){
	
	$id =$_POST['ncc_id'];
	
	$course_Name = $_POST['course'];

	$session = $_POST['session'];


	$sql="INSERT INTO student_course(ncc_id, session, course_id) 
		  VALUES('$id', '$session', '$course_Name')";
		
	//echo $sql;
	if($conn->query($sql)){
		header("Location:mailsent.php?id=$id");
	}
	else {
	 echo "not succesfull";
	}
}

?>