<?php
include_once 'signinchecker.php';
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
include_once 'includes/sidebar.php'
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
					<?php if (isset($_SESSION['cmsg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['cmsg']?></p></div>
					<?php unset ($_SESSION['cmsg']);} ?>
					<?php if (isset($_SESSION['emsg'])){?>
					<div class="callout callout-danger msg" ><p><?php echo $_SESSION['emsg'];?></p></div>
					<?php unset ($_SESSION['emsg']); }?>
					<form class="form-horizontal" onsubmit="return nullcheck();"  action="addStudentCourseSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">Ncc ID</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" id="nccid" oninput="ontype();" name="ncc_id" placeholder="Ncc Id">
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
								 <a class="btn btn-primary" href="viewStudentCourse" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="student_submit" id="couserSubmit">Save & Send Mail</button>
							</div>
					</form>				
			</div> 									
		</div>
	</section>
           
<script>
  	function nullcheck(){
			
		$(".error").remove(); 
		
		if($('#nccid').val()==''){
			$('#nccid').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		
		if($('#courseID').val()==''){
			$('#courseID').after('<span class="error">* Please select a course name</span>');
			return false;
		}
		
		

	}

	function ontype(){
    $(".error").remove();
	
	$('#couserSubmit').removeAttr('disabled',true);
	
	 if(isNaN($("#nccid").val() )){
		$('#nccid').after('<span class="error">* NCC Id is numeric!!</span>');
		$('#couserSubmit').attr('disabled',true);
	}else if($("#nccid").val() <= 0){
		
		$('#nccid').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#couserSubmit').attr('disabled',true);
	}
	
 }
</script>       
<?php

include_once 'includes/footer.php';
?>
</body>
</html>
