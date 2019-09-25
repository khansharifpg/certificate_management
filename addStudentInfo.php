<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';?>
<!-- Content Header (Page header) -->
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
			<div class="box box-info">
					<div class="box-header with-border">
					  <h3 style="color:orange;" class="box-title">Student Information Form </h3>
					</div>
					<form class="form-horizontal" action="addStudentInfoSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">LOCAL ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="localid" placeholder="Local Id">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Ncc ID" class="col-sm-4 control-label">NCC ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="nccid" placeholder="NCC Id">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Full Name" class="col-sm-4 control-label">FULL NAME</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="studentfullname" placeholder="Studnet full Name">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Date of birth" class="col-sm-4 control-label">DATE OF BIRTH</label>

								  <div class="col-sm-8">
									<input type="date" class="form-control" name="dateofbirth" placeholder="Date of birth">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Email" class="col-sm-4 control-label">EMAIL</label>

								  <div class="col-sm-8">
									<input type="email" class="form-control" name="studentemail" placeholder="Email">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Phone Number" class="col-sm-4 control-label">PHONE NUMBER</label>

								  <div class="col-sm-8">
									<input type="tel" class="form-control" name="phonenumber" placeholder="Phone Number">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Library clearence" class="col-sm-4 control-label">LIBRARY CLEARENCE</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="libraryclearence" placeholder="Library clearence">
								  </div>
								</div>
								
								
							</div>
							  <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewAccountDetail.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="student_submit">Submit</button>
								<button type="submit" class="btn btn-default pull-right" style="margin-right: 14px" name="student_reset" >Reset</button>
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