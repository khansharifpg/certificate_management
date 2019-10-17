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
		header("Location:mailsent.php?id=$id&&cd=$course_Name&&ss=$session");
	}
	else {
	 $_SESSION['emsg']="Something Went wrong!! Try Again later";
	 header('Location:addStudentCourse');
	}
}

// ajax for certificate info
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM session_info where course_id='$id' ";
	$result = $conn->query($sql);
	while($row=mysqli_fetch_array($result)){
		echo "<option value=".$row['id']." >".$row['session']."</option>";
	}
	exit;
	
}

?>