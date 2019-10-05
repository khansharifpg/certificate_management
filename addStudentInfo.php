<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>
<!-- Content Header (Page header) -->

<?php
if(isset($_GET['id'])){


$id=$_GET['id'];

				include_once("dbCon.php");
				$conn =connect();
				$sql="SELECT * FROM students_info WHERE id='$id'";
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
		<div class="col-md-6 col-sm-offset-3">		
			<div class="box box-info">
					<div class="box-header with-border">
					  <h3 style="color:orange;" class="box-title">Student Information Form </h3>
					</div>
					
					<p class="login-box-msg"><?php if (isset($_SESSION['amsg'])){echo $_SESSION['amsg'];}?></p>
					<form class="form-horizontal" action="addStudentInfoSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">LOCAL ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="localid" placeholder="Local Id" value="<?php 
									if(isset($row['local_id'])){	
										echo $row['local_id'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Ncc ID" class="col-sm-4 control-label">NCC ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="nccid" placeholder="NCC Id" value="<?php 
									if(isset($row['ncc_id'])){	
										echo $row['ncc_id'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Full Name" class="col-sm-4 control-label">FULL NAME</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="studentfullname" placeholder="Studnet full Name" value="<?php 
									if(isset($row['full_name'])){	
										echo $row['full_name'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Date of birth" class="col-sm-4 control-label">DATE OF BIRTH</label>

								  <div class="col-sm-8">
									<input type="date" class="form-control" name="dateofbirth" placeholder="Date of birth" value="<?php 
									if(isset($row['dob'])){	
										echo $row['dob'];}
									?>">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Email" class="col-sm-4 control-label">EMAIL</label>

								  <div class="col-sm-8">
									<input type="email" class="form-control" name="studentemail" placeholder="Email" value="<?php 
									if(isset($row['email'])){	
										echo $row['email'];}
									?>">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Phone Number" class="col-sm-4 control-label">PHONE NUMBER</label>

								  <div class="col-sm-8">
									<input type="tel" class="form-control" name="phonenumber" placeholder="Phone Number" value="<?php 
									if(isset($row['phone'])){	
										echo $row['phone'];}
									?>">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Library clearence" class="col-sm-4 control-label">LIBRARY CLEARENCE</label>

								   <div class="col-sm-8">
									<select class="form-control select2" name="libraryclearence" style="width: 100%;">
									  <option value="0" selected="selected">Yes</option>
									  <option value="1">No</option>
									</select>
								  </div>
								</div>
								
								
							</div>
							  <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewStudentInfo.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="student_submit">Submit</button> 
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