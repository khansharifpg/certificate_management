<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
?>
<script>

function  datacourse(){
	//alert('ok');
	var id = $('#courseID').val();
	var sess = $('#session');
	$.ajax({
	type:'POST',
	url:'addStudentCourseSave.php',
	data:{id,id},
	dataType:"json",
	success : function(response){
		//console.log(response);
		for(var i=0;i<response.length ;i++){
					$('#session').empty();
				for(var i=0;i<response.length ;i++){
					$('#session').append('<option value="'+response[i].id+'">'+response[i].session+'</option>');
				}
			}
		}
		})
	
}
</script>

<?php
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php'
?>
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
		<div class="col-md-6 col-sm-offset-3">		
			<div class="box box-info">
					<div class="box-header with-border">
					  <h3 style="color:orange;" class="box-title">Student Certificate Info Form</h3>
					</div>
					<form class="form-horizontal" action="addStudentCourseSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Ncc ID</label>

								  <div class="col-sm-8">
									<input type="number" class="form-control" name="ncc_id" placeholder="Ncc Id">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Course Name" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<select onchange="datacourse()" id="courseID" class="form-control select2" name="course" style="width: 100%;">
									<option>Select Course name</option>
									<?php 
										include_once("dbCon.php");
										$conn =connect();
										$sql="SELECT * FROM course_info";
										$result= $conn->query($sql);
										foreach($result as $value){
										
										
									?>
									  <option value="<?=$value['id']?>" ><?=$value['course']?></option>
									 <?php
										}
									 ?>
									</select>
								  </div>
								</div> 
								<div class="form-group">
								  <label for="text" class="col-sm-4 control-label">Session</label>

								  <div class="col-sm-8">
									<select class="form-control select2" name="session" id = "session" style="width: 100%;">
									
									</select>
								  </div>
								</div>  
								
							</div>
							  <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewStudentCourse.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="student_submit">Save & Send Mail</button>
							</div>
					</form>				
			</div> 									
		</div>
	</section>
           

<?php

//Addd new content
include_once 'includes/footer.php';
?>
</body>
</html>
