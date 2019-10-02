<?php
session_start();
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';
?>
<?php

if(isset($_GET['id'])){
	//echo $_GET['id'];

include_once("dbCon.php");
$conn =connect();

$id=$_GET['id'];

$sql= "SELECT * FROM accounts_detail  WHERE id=$id";
//echo $sql;

$result=$conn->query($sql);
//print_r($result);
//var_dump($result);

$row=mysqli_fetch_assoc($result);
}
?>

<!-- Content Header (Page header) -->

<?php
if(isset($_GET['id'])){


$id=$_GET['id'];

				include_once("dbCon.php");
				$conn =connect();
				$sql="SELECT * FROM accounts_detail WHERE id='$id'";
				$result= $conn->query($sql);
	            //var_dump ($result);
				
				$row=mysqli_fetch_assoc($result);
	           }

?>

    <section class="content-header">
      <h1>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
	<section>
		<div class="col-md-4 col-sm-offset-3">		
			<div class="box box-info" >
					<div class="box-header with-border">
					  <h3 style="color:orange;" class="box-title"  >Account Information Form </h3>
					</div>
					
				<p class="login-box-msg"><?php if (isset($_SESSION['amsg'])){echo $_SESSION['amsg'];}?></p>
						<form class="form-horizontal" action="addAccountDetailSave.php" method="POST">
						<input type="hidden" name="id" value="<?=$row['id'];?>">
							<div class="box-body">
								<div class="form-group">
								  <label for="StudentID" class="col-sm-4 control-label">Student ID</label>

								  <div class="col-sm-8">
<<<<<<< HEAD
									<input type="text" class="form-control" name="studentid" placeholder="Student Id" value="<?php if(isset($_SESSION['a_student_id'])){echo $_SESSION['a_student_id'];}elseif(isset($row['StudentId'])){echo $row['StudentId'];}?>">
=======
									<input type="number" class="form-control" name="studentid" placeholder="Student Id" value= "<?php 
									if(isset($row['StudentId'])){	
										echo $row['StudentId'];}
									?>">
>>>>>>> develop
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Payable" class="col-sm-4 control-label">Payable Amount</label>

								  <div class="col-sm-8">
<<<<<<< HEAD
									<input type="text" class="form-control" name="payableamount" placeholder="Payable amount" value="<?php if(isset($_SESSION['a_payable_amount'])){echo $_SESSION['a_payable_amount'];}elseif(isset($row['payable_amount'])){echo $row['payable_amount'];}?>">
=======
									<input type="number" class="form-control" name="payableamount" placeholder="Payable amount" value= "<?php 
									if(isset($row['payable_amount'])){	
										echo $row['payable_amount'];}
									?>">
>>>>>>> develop
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="PAID" class="col-sm-4 control-label">Paid Amount</label>

								  <div class="col-sm-8">
<<<<<<< HEAD
									<input type="text" class="form-control" name="paidamount" placeholder="Paid Amount" value="<?php if(isset($_SESSION['a_paidamount'])){echo $_SESSION['a_paidamount'];}elseif(isset($row['paid_amount'])){echo $row['paid_amount'];}?>" >
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="due" class="col-sm-4 control-label">Due</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="due" placeholder="Due" value="<?php if(isset($_SESSION['a_due'])){echo $_SESSION['a_due'];}elseif(isset($row['due'])){echo $row['due'];}?>">
								  </div>
								</div>
=======
									<input type="Number" class="form-control" name="paidamount" placeholder="Paid Amount" value= "<?php 
									if(isset($row['paid_amount'])){	
										echo $row['paid_amount'];}
									?>">
								  </div>
								</div>
								
							
>>>>>>> develop
								<div class="form-group">
								  <label for="fine" class="col-sm-4 control-label">Fine</label>

								  <div class="col-sm-8">
<<<<<<< HEAD
									<input type="text" class="form-control" name="fine" placeholder="Fine" value="<?php if(isset($_SESSION['a_fine'])){echo $_SESSION['a_fine'];}elseif(isset($row['fine'])){echo $row['fine'];}?>">
=======
									<input type="Number" class="form-control" name="fine" placeholder="Fine" value= "<?php 
									if(isset($row['fine'])){	
										echo $row['fine'];}
									?>">
>>>>>>> develop
								  </div>
								</div>								
							</div>
							   <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewAccountDetail.php" role="button" style="background-color:red">Back</a>
								
								<?php if(isset($_GET['id'])){?>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="acount_edit">Edit</button> <?php } else{?>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="acount_submit">Submit</button>
								<button type="submit" class="btn btn-default pull-right" style="margin-right: 14px" name="acount_reset" >Reset</button><?php }?>
								
								
							</div>
						</form>			
			</div> 									
		</div>
	</section>           

<?php

//Addd new content
include_once 'includes/footer.php';
include_once 'includes/footer_2.php';

?>