<?php
include_once 'signinchecker.php';
if((!isset($_GET['ncc_id']))&&(!isset($_GET['name']))){
	header('Location:viewStudentInfo');
}
include_once 'includes/header.php';
?>
<script>

function  datacourse(){
	//alert('ok');
	var id = $('#courseID').val();
	$.ajax({
	type:'POST',
	url:'addStudentCourseSave.php',
	data:{id,id},
	success : function(response){
		//console.log(response);
		for(var i=0;i<response.length ;i++){
					
				document.getElementById("session").innerHTML=response;
			}
		}
		})
	
}
</script>

<?php
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';

?>

<!-- INLINE CSS -->
<style>
form label {
  display: inline-block;
  width: 100px;
}

form div {
  margin-bottom: 5px;
}

.error {
  color: red;
  margin-left: 5px;
  font-weight:bold;
  font-size:15px;
}

label.error {
  display: inline;
}

</style>
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
					
					<form class="form-horizontal" onsubmit="return nullcheck();"  action="addStudentCourseSave.php" method="POST">
						<input type="hidden" name='ncc_id' value='<?=$_GET['ncc_id']?>'	>
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Student Name :</label>

								  <div class="col-sm-6">
									<label class=" control-label" ><?=$_GET['name']?></label>
									</div>
								</div>
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Ncc ID :</label>

								  <div class="col-sm-8">
									<label class="control-label" ><?=$_GET['ncc_id']?></label>
									</div>
								</div>
								
								<div class="form-group">
								  <label for="Course Name" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<select  onchange="datacourse()" id="courseID" class="form-control select2" oninput="ontype();"  name="course" style="width: 100%;">
									<option >Select Course name</option>
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
								 <a class="btn btn-danger" href="viewStudentInfo" role="button" >Back</a>
								<button type="submit" class="btn btn-success pull-right"  name="student_submit" id="couserSubmit">Save</button>
							</div>
					</form>				
			</div> 									
		</div>
	</section>
           
<script>
  	function nullcheck(){
			
		$(".error").remove(); 
		
		
		
		if($('#courseID').val()==''){
			$('#courseID').after('<span class="error">* Please select a course name</span>');
			return false;
		}
		
		

	}


</script>       
<?php

include_once 'includes/footer.php';
?>
</body>
</html>
