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
					  <h3 style="color:orange;" class="box-title">Student Course Form</h3>
					</div>
					<form class="form-horizontal" action="addStudentCourseSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Student ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="StudentId" placeholder="Student Id">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Batch Name" class="col-sm-4 control-label">Batch No.</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="batcheNo" placeholder="Batch No.">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="text" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="CourseName" placeholder="Course Name">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Date of birth" class="col-sm-4 control-label">Year</label>

								  <div class="col-sm-8">
									<input type="date" class="form-control" name="EnYear" placeholder="Year">
								  </div>
								</div>
								
							</div>
							  <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewStudentCourse.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="course_submit">Submit</button>
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