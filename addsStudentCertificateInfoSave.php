<?php 

include_once("dbCon.php");

$conn =connect();

if(isset($_POST["student_submit"])){
	
	$Student_Id =$_POST['Studentid'];
	
	$course_Name = $_POST['coursename'];

	$Entry_Date = $_POST['entrydate'];

	$deliveryDate = $_POST['deliverydate'];
	
	$certificateRemarks = $_POST['certificateremarks'];
	
	$Certifciate_Id= $_POST['certifciate_ID'];


	$sql="INSERT INTO student_certificateinfo(studentId, course_name, entry_date, delivery_date, remarks, certifciateId) VALUES('$Student_Id', '$course_Name','$Entry_Date', '$deliveryDate', '$certificateRemarks','$Certifciate_Id')";
		
	echo $sql;
	if($conn->query($sql)){
	echo "Added successfully";
	}
	else {
	 echo "not succesfull";
	}
}

?>