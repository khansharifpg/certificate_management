<?php 

session_start();
include_once("dbCon.php");

$conn = connect();

if(isset($_POST['acount_submit'])){
	
	$local_id = $_POST['local_id'];
	$payable_amount = $_POST['payableamount'];
	$paid_amount = $_POST['paidamount'];
	$due_a = $payable_amount-$paid_amount;
	$fine_a = $_POST['fine'];
	
	$sql="INSERT INTO accounts_detail(local_id, payable_amount, paid_amount, due, fine ) VALUES('$local_id', '$payable_amount', '$paid_amount', '$due_a', '$fine_a')";
	
	if($conn->query($sql)){

	$_SESSION['amsg']='Added successfully';
	header('Location:viewStudentInfo');
	}
	else{
	$_SESSION['emsg']="Something Went wrong!! Try Again later";
	header('Location:viewStudentInfo');
	}
}

//Edit sql
if(isset($_POST["acount_edit"])){
	
	$id=$_POST['id'];
	
	$payable_amount = $_POST['payableamount'];
	$paid_amount = $_POST['paidamount'];
	$due_a = $payable_amount-$paid_amount;
	$fine_a = $_POST['fine'];
	
	$sql="UPDATE accounts_detail SET local_id='$id', payable_amount='$payable_amount', paid_amount='$paid_amount', due='$due_a' ,fine='$fine_a' WHERE local_id='$id'";
	
	if($conn->query($sql)){

	$_SESSION['amsg']='Edited successfully';
	header('Location:viewAccountDetail');
	}
	else{
	$_SESSION['emsg']="Something Went wrong!! Try Again later";
	header('Location:viewAccountDetail');
	}
}

?>