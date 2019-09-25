<?php 
session_start();

include_once("dbCon.php");


$conn =connect();

$valid=true; 

$_SESSION['a_student_id']=$_POST["studentid"];
$_SESSION['a_payable_amount']=$_POST["payableamount"];
$_SESSION['a_paidamount']=$_POST["paidamount"];
$_SESSION['a_due']=$_POST["due"];
$_SESSION['a_fine']=$_POST["fine"];

//-->Negative value validation start
if($_SESSION['a_fine']<0 ){
	$valid=false;
	$_SESSION['amsg']='Please input only positive value for fine';
	unset($_SESSION['a_fine']);
}
if($_SESSION['a_due']<0 ){
	$valid=false;
	$_SESSION['amsg']='Please input only positive value for due';
	unset($_SESSION['a_due']);
}

if($_SESSION['a_paidamount']<0 ){
	$valid=false;
	$_SESSION['amsg']='Please input only positive value for Paid amount';
	unset($_SESSION['a_paidamount']);
}
if($_SESSION['a_payable_amount']<0 ){
	$valid=false;
	$_SESSION['amsg']='Please input only positive value payable amount';
	unset($_SESSION['a_payable_amount']);
}
if($_SESSION['a_student_id']<0 ){
	$valid=false;
	$_SESSION['amsg']='Please input only positive value for Student Id';
	unset($_SESSION['a_student_id']);
}
//Negative value validation done-->


//--->Numeric value validation start
if($_SESSION['a_fine']!==is_numeric ){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for fine';
	
}

if($_SESSION['a_due']!==is_numeric ){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for due';
	
}

if($_SESSION['a_paidamount']!==is_numeric ){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for paid amount';
	
}

if($_SESSION['a_payable_amount']!==is_numeric ){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for payable amount';
	
}

if($_SESSION['a_student_id']!==is_numeric ){
	$valid=false;
	$_SESSION['amsg']='Please input only numeric value for student id';
	
}
//Numeric value validation done-->


//--->Null value validation start
if($_SESSION['a_fine']==null){
	$valid=false;
	$_SESSION['amsg']='Fine field is blank';
	
}

if($_SESSION['a_due']==null){
	$valid=false;
	$_SESSION['amsg']='Due field is blank';
	
}
	
if($_SESSION['a_paidamount']==null){
	$valid=false;
	$_SESSION['amsg']='Paidamount is blank';
	
}

if($_SESSION['a_payable_amount']==null){
	$valid=false;
	$_SESSION['amsg']='Payable amount field is blank';

}	

if($_SESSION['a_student_id']==null){
	$valid=false;
	$_SESSION['amsg']='Student Id field is blank';

}
//Null value validation done-->//

function refresh(){
	unset($_SESSION['a_student_id']);
	unset($_SESSION['a_payable_amount']);
	unset($_SESSION['a_paidamount']);
	unset($_SESSION['a_due']);
	unset($_SESSION['a_fine']);
	unset($_SESSION['amsg']);
}


if(isset($_POST["acount_submit"]) && ($valid==true)){
	
	$student_id =$_POST['studentid'];
	
	$payable_amount = $_POST['payableamount'];

	$paid_amount = $_POST['paidamount'];

	$due_a = $_POST['due'];

	$fine_a = $_POST['fine'];
	
	$sql="INSERT INTO accounts_detail(StudentId, payable_amount, paid_amount, due, fine ) VALUES('$student_id', '$payable_amount', '$paid_amount', '$due_a', '$fine_a')";
	
	echo $sql;
	if($conn->query($sql)){
	echo "Added successfully";
	}
	else {
	 echo "not succesfull";
	}
}elseif($valid==false){
	header("Location:addAccountDetail.php");
}
if(isset($_POST['acount_reset'])){
	refresh();
	header("Location:addAccountDetail.php");
}

?>