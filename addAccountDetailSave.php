<?php 

session_start();
include_once("dbCon.php");


$conn =connect();

$valid=true; 

$_SESSION['a_studentid']=$_POST["studentid"];
$_SESSION['a_payableamount']=$_POST["payableamount"];
$_SESSION['a_paidamount']=$_POST["paidamount"];

$_SESSION['a_fine']=$_POST["fine"];

<<<<<<< HEAD
//--->Numeric value validation start
if(!is_numeric($_SESSION['a_fine'])){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for fine';
	
}

if(!is_numeric($_SESSION['a_due'])){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for due';
	
}

if(!is_numeric($_SESSION['a_paidamount'])){
=======

//Insert sql
if($_POST["paidamount"]==null){
  $valid=false;
  $_SESSION['amsg']='Input Your Paid Amount';
}

if($_POST["payableamount"]==null){
>>>>>>> develop
	$valid=false;
	$_SESSION['amsg']='Input Your Amount';
	
}

<<<<<<< HEAD
if(!is_numeric($_SESSION['a_payable_amount'])){
=======
if($_POST["studentid"]==null){
>>>>>>> develop
	$valid=false;
	$_SESSION['amsg'] ='Input your id';
	
}	

<<<<<<< HEAD
if(!is_numeric($_SESSION['a_student_id'])){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for student id';
=======
function refresh(){
	unset($_SESSION['a_studentid']);
	unset($_SESSION['a_payableamount']);
	unset($_SESSION['a_paidamount']);
>>>>>>> develop
	
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