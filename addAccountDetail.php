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
		<div class="col-md-6 col-sm-offset-3">		
			<div class="box box-info" >
					<div class="box-header with-border">
					  <h3 style="color:orange;" class="box-title"  >Account Information Form </h3>
					</div> 
				
						<form class="form-horizontal" onsubmit="return nullcheck();" action="addAccountDetailSave.php" method="POST">
							<div class="box-body">
								<div class="form-group">
								  <label for="StudentID" class="col-sm-4 control-label">Local ID</label>

								  <div class="col-sm-8">
									<input type="text" id="local_id" class="form-control" name="studentid" oninput="ontype();" placeholder="Student Id" value= "<?php 
									if(isset($row['StudentId'])){	
										echo $row['StudentId'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="Payable" class="col-sm-4 control-label">Payable Amount</label>

								  <div class="col-sm-8">
									<input type="text" id="pay_amount" class="form-control" name="payableamount" oninput="ontype();" placeholder="Payable amount" value= "<?php 
									if(isset($row['payable_amount'])){	
										echo $row['payable_amount'];}
									?>">
								  </div>
								</div>
								
								<div class="form-group">
								  <label for="PAID" class="col-sm-4 control-label">Paid Amount</label>

								  <div class="col-sm-8">
									<input type="text" id="paid_amount"  class="form-control" name="paidamount" oninput="ontype();" placeholder="Paid Amount" value= "<?php 
									if(isset($row['paid_amount'])){	
										echo $row['paid_amount'];}
									?>">
								  </div>
								</div>
								
							
								<div class="form-group">
								  <label for="fine" class="col-sm-4 control-label">Fine</label>

								  <div class="col-sm-8">
									<input type="text" id="a_fine" oninput="ontype();" class="form-control" name="fine" placeholder="Fine" value= "<?php 
									if(isset($row['fine'])){	
										echo $row['fine'];}
									?>">
								  </div>
								</div>								
							</div>
							   <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewAccountDetail" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" id="acount_submit" name="acount_submit" >Submit</button>
							</div>
						</form>			
			</div> 									
		</div>
	</section> 

<script>
	function nullcheck(){
			
		$(".error").remove(); 
		
		if($('#local_id').val()==''){
			$('#local_id').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#pay_amount').val()==''){
			$('#pay_amount').after('<span class="error">* This field is required</span>');
			return false;
		}
		
		if($('#paid_amount').val()==''){
			$('#paid_amount').after('<span class="error">* This field is required</span>');
			return false;
		}
		
	
	}
 
 function ontype(){
    $(".error").remove();
	
	$('#acount_submit').removeAttr('disabled',true);
	
	 if (isNaN( $("#local_id").val() )) {
		 
		$('#local_id').after('<span class="error">* Local Id is numeric!!</span>');
		$('#acount_submit').attr('disabled',true);
		
	}else if($("#local_id").val() <= 0){
		
		$('#local_id').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#acount_submit').attr('disabled',true);
		
	}else if(isNaN($("#pay_amount").val() )){
		
		$('#pay_amount').after('<span class="error">* Payable amount is numeric!!</span>');
		$('#acount_submit').attr('disabled',true);
		
	}else if($("#pay_amount").val() <= 0){
		
		$('#pay_amount').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#acount_submit').attr('disabled',true);
		
	}else if(isNaN($("#paid_amount").val() )){
		$('#paid_amount').after('<span class="error">* Paid amount is numeric!!</span>');
		$('#acount_submit').attr('disabled',true);
		
	}else if($("#paid_amount").val() <= 0){
	
		$('#paid_amount').after('<span class="error">* 0 or minus value not accepted!!</span>');
		$('#acount_submit').attr('disabled',true);
	
   }else if(isNaN($("#a_fine").val() )){
		$('#a_fine').after('<span class="error">* Paid amount is numeric!!</span>');
		$('#acount_submit').attr('disabled',true);
	}else if($("#a_fine").val() < 0){
	
		$('#a_fine').after('<span class="error">* minus value not accepted!!</span>');
		$('#acount_submit').attr('disabled',true);
	
   }
	
	
	
 }
</script>	

<?php

//Addd new content
include_once 'includes/footer.php';

?>
</body>
</html>