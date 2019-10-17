<?php 
session_start();
include_once("../dbCon.php");

$conn =connect();

if(isset($_POST["certificate_submit"])){
	
	function generateRandomString()  {
        $characters = '0123456789';
        $length = 6;
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
                                        }
	$id = generateRandomString();
	
	$course =$_POST['course'];
	$session = $_POST['session'];
	
	$sql="INSERT INTO course_info (id,course) VALUES('$id','$course')";
	$conn->query($sql);
	
	$totalUsername = sizeof($session);
	
	for($i=0;$i<$totalUsername;$i++) {
		
    $InsertUsername = $session[$i];
    $query = "INSERT INTO `session_info`(`course_id`,`session`) VALUES ('$id','$InsertUsername')";
	$conn->query($query);

}

	$_SESSION['cmsg']='Added succesfully';
	header("Location:addCertificatetype.php");
	
}



?>