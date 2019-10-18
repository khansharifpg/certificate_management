<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>
<!-- Content Header (Page header) -->
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

<?php
include_once("dbCon.php");
$conn =connect();
if(isset($_GET['id'])){
$id=$_GET['id'];
				$sql="SELECT * FROM students_info WHERE local_id='$id'";
				//echo $sql;exit;
				$result= $conn->query($sql);
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
					<?php if (isset($_SESSION['amsg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['amsg']?></p></div>
					<?php unset ($_SESSION['amsg']);} ?>
					<?php if (isset($_SESSION['emsg'])){?>
					<div class="callout callout-danger msg" ><p><?php echo $_SESSION['emsg'];?></p></div>
					<?php unset ($_SESSION['emsg']); }?>
					
					<form class="form-horizontal" onsubmit="return nullcheck();" action="addStudentInfoSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="Local ID" class="col-sm-4 control-label">LOCAL ID</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" id="local_iid" oninput="ontype();" name="localid" placeholder="Local Id" value="<?php 
									if(isset($row['local_id'])){	
										echo $row['local_id'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Ncc ID" class="col-sm-4 control-label">NCC ID</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" id="ncc_iid" oninput="ontype();"  name="nccid" placeholder="NCC Id" value="<?php 
									if(isset($row['ncc_id'])){	
										echo $row['ncc_id'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Full Name" class="col-sm-4 control-label">FULL NAME</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="studentfullname" id="Student_name" oninput="ontype();" placeholder="Studnet full Name" value="<?php 
									if(isset($row['full_name'])){	
										echo $row['full_name'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Date of birth" class="col-sm-4 control-label">DATE OF BIRTH</label>

								  <div class="col-sm-8">
									<input type="date" class="form-control" id="dob" oninput="ontype();" name="dateofbirth" placeholder="Date of birth" value="<?php 
									if(isset($row['dob'])){	
										echo $row['dob'];}
									?>">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Email" class="col-sm-4 control-label">EMAIL</label>

								  <div class="col-sm-8">
									<input type="email" class="form-control" id="email" oninput="ontype();" name="studentemail" placeholder="Email" value="<?php 
									if(isset($row['email'])){	
										echo $row['email'];}
									?>">
								  </div>
								</div>
								<div class="form-group">
								  <label for="Phone Number" class="col-sm-4 control-label">PHONE NUMBER</label>

								  <div class="col-sm-8">
									<input type="tel" class="form-control" id="Phone_number" oninput="ontype();" name="phonenumber" placeholder="Phone Number" value="<?php 
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
								 <a class="btn btn-primary" href="viewStudentInfo" role="button" style="background-color:red">Back</a>
								
								<?php if(isset($_GET['id'])){?>
								<button type="submit" class="btn btn-info pull-right" name="student_edit">Edit</button> <?php } else{?>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="student_submit" id="student_submit">Submit</button> <?php }?>
							</div>
					</form>	
					
			</div> 									
		</div>
	</section>

<script>
	function nullcheck(){
			
		$(".error").remove(); 
		
		if($('#local_iid').val()==''){
			$('#local_iid').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#ncc_iid').val()==''){
			$('#ncc_iid').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#Student_name').val()==''){
			$('#Student_name').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#dob').val()==''){
			$('#dob').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#email').val()==''){
			$('#email').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#Phone_number').val()==''){
			$('#Phone_number').after('<span class="error">* This field is required</span>');
			return false;
		}
		
	
	}
 
 function ontype(){
    $(".error").remove();
	
	$('#student_submit').removeAttr('disabled',true);
	
	 if (isNaN( $("#local_iid").val() )) {
		 
		$('#local_iid').after('<span class="error">* Local Id is numeric!!</span>');
		$('#student_submit').attr('disabled',true);
		
	}else if($("#local_iid").val() <= 0){
		
		$('#local_iid').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#student_submit').attr('disabled',true);
		
	}else if(isNaN($("#ncc_iid").val() )){
		
		$('#ncc_iid').after('<span class="error">* Ncc Id is numeric!!</span>');
		$('#student_submit').attr('disabled',true);
		
	}else if($("#ncc_iid").val() <= 0){
		
		$('#ncc_iid').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#student_submit').attr('disabled',true);
		
	}else if(!/^[a-z ]+$/i.test($("#Student_name").val())){
		
		$('#Student_name').after('<span class="error">* Name can not be numeric!!</span>');
		$('#student_submit').attr('disabled',true);	
	
	
	}else if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($("#email").val())){
		
		$('#email').after('<span class="error">* Type a valid email!!</span>');
		$('#student_submit').attr('disabled',true);	
			
	}else if(isNaN($("#Phone_number").val() )){
		$('#Phone_number').after('<span class="error">* Phone Number is numeric!!</span>');
		$('#student_submit').attr('disabled',true);
		
	}else if(! /^[0-9]{11}$/.test($("#Phone_number").val())){
	
		$('#Phone_number').after('<span class="error">* Input exactly 11 numbers!!</span>');
		$('#student_submit').attr('disabled',true);
	
   }
	
	
	
 }
</script> 	
<?php
include_once 'includes/footer.php';
?>
</body>
</html>
           

