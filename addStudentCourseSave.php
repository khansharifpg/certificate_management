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

// ajax for certificate info
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM session_info where course_id='$id' ";
	$result = $conn->query($sql);
	$array;
	while($row=mysqli_fetch_array($result)){
		$array[] = [
		   'course_id'=>$row['course_id'],
		   'session'=>$row['session'],
		];
	};
	echo json_encode($array);
	
}

?>