<?php
session_start();
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';
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
							<div class="box-body">
								<div class="form-group">
								  <label for="StudentID" class="col-sm-4 control-label">Local ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="studentid" placeholder="Student Id" value= "<?php 
									if(isset($row['StudentId'])){	
										echo $row['StudentId'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Payable" class="col-sm-4 control-label">Payable Amount</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="payableamount" placeholder="Payable amount" value= "<?php 
									if(isset($row['payable_amount'])){	
										echo $row['payable_amount'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="PAID" class="col-sm-4 control-label">Paid Amount</label>

								  <div class="col-sm-8">
									<input type="Number" class="form-control" name="paidamount" placeholder="Paid Amount" value= "<?php 
									if(isset($row['paid_amount'])){	
										echo $row['paid_amount'];}
									?>">
								  </div>
								</div>
								
							
								<div class="form-group">
								  <label for="fine" class="col-sm-4 control-label">Fine</label>

								  <div class="col-sm-8">
									<input type="Number" class="form-control" name="fine" placeholder="Fine" value= "<?php 
									if(isset($row['fine'])){	
										echo $row['fine'];}
									?>">
								  </div>
								</div>								
							</div>
							   <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewAccountDetail.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="acount_submit">Submit</button>
								<button type="submit" class="btn btn-default pull-right" style="margin-right: 14px" name="acount_reset" >Reset</button>
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