<?php 

session_start();
include_once("dbCon.php");


$conn =connect();

$valid=true; 

$_SESSION['a_studentid']=$_POST["studentid"];
$_SESSION['a_payableamount']=$_POST["payableamount"];
$_SESSION['a_paidamount']=$_POST["paidamount"];

$_SESSION['a_fine']=$_POST["fine"];


//Insert sql
if($_POST["paidamount"]==null){
  $valid=false;
  $_SESSION['amsg']='Input Your Paid Amount';
}

if($_POST["payableamount"]==null){
	$valid=false;
	$_SESSION['amsg']='Input Your Amount';
	
}

if($_POST["studentid"]==null){
	$valid=false;
	$_SESSION['amsg'] ='Input your id';
	
}	

function refresh(){
	unset($_SESSION['a_studentid']);
	unset($_SESSION['a_payableamount']);
	unset($_SESSION['a_paidamount']);
	
	unset($_SESSION['a_fine']);
}



if((isset($_POST["acount_submit"]))&& ($valid==true)){
	
	$student_id =$_POST['studentid'];
	
	$payable_amount = $_POST['payableamount'];

	$paid_amount = $_POST['paidamount'];

	


	$fine_a = $_POST['fine'];
	
	$sql="INSERT INTO accounts_detail(StudentId, payable_amount, paid_amount, due, fine ) VALUES('$student_id', '$payable_amount', '$paid_amount', '$due_a', '$fine_a')";
	
	//echo $sql;
	if($conn->query($sql)){
	refresh();
	$_SESSION['amsg']='Added successfully';
	header('Location:viewAccountDetail.php');
	}
	else {
	$_SESSION['amsg']="not succesfull";
	header('Location:viewAccountDetail.php');
	}
}elseif($valid==false){
	header('Location:addAccountDetail.php');
}


//Edit sql
if((isset($_POST["acount_edit"]))&& ($valid==true)){
	
	$id=$_POST['id'];
	
	$student_id =$_POST['studentid'];
	
	$payable_amount = $_POST['payableamount'];

	$paid_amount = $_POST['paidamount'];

	

	$fine_a = $_POST['fine'];
	
	$sql="UPDATE accounts_detail SET StudentId='$student_id', payable_amount='$payable_amount', paid_amount='$paid_amount', fine='$fine_a' WHERE id='$id'";
	//echo $sql;
	//exit();
	
	//echo $sql;
	if($conn->query($sql)){
	refresh();
	$_SESSION['amsg']='Added successfully';
	header('Location:viewAccountDetail.php');
	}
	else {
	$_SESSION['amsg']="not succesfull";
	header('Location:viewAccountDetail.php');
	}
}elseif($valid==false){
	header('Location:addAccountDetail.php');
}


?>