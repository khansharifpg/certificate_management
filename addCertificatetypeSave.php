<?php 
session_start();
include_once("dbCon.php");

$conn =connect();

$valid=true; 

$_SESSION['c_certificatename']=$_POST["certificatename"];

if($_SESSION['c_certificatename']==null){
	$valid=false;
	$_SESSION['cmsg']='Certificate name field is blank';
	
}

function refresh(){
	unset($_SESSION['c_certificatename']);	
}

if(isset($_POST["certificate_submit"]) && ($valid==true)){
	
	$certificateName =$_POST['certificatename'];
	
	$sql="INSERT INTO certificate_nametype(Certifiate_name) VALUES('$certificateName')";
	
	//echo $sql;

	if($conn->query($sql)){
		refresh();
	
	$_SESSION['cmsg']='Added succesfully';
	header("Location:addCertificatetype.php");
	}
	else {
	 echo "not succesfull";
	}
}elseif($valid==false){
	header("Location:addCertificatetype.php");
}
if(isset($_POST['certificate_reset'])){
	refresh();
	unset($_SESSION['cmsg']);
	header("Location:addCertificatetype.php");
}

?>