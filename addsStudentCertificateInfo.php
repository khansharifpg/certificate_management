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
					  <h3 style="color:orange;" class="box-title">Student Certificate Info Form</h3>
					</div>
					<form class="form-horizontal" action="addsStudentCertificateInfoSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Ncc ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="Studentid" placeholder="Student Id">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Course Name" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="coursename" placeholder="Course Name">
								  </div>
								</div> 
								<div class="form-group">
								  <label for="text" class="col-sm-4 control-label">Session</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="certificateremarks" placeholder="Session">
								  </div>
								</div>  
								
							</div>
							  <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewStudentCertificateInfo.php" role="button" style="background-color:red">Back</a>
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