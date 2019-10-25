<?php
$title = 'Add Course | DIA';
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';

if(isset($_GET['id'])){
	$id=$_GET['id'];
}
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
				  <h3 style="color:orange;" class="box-title">Course Name Form </h3>
				</div> 
				<?php if (isset($_SESSION['cmsg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['cmsg']?></p></div>
					<?php unset ($_SESSION['cmsg']);} ?>
					<form class="form-horizontal" onsubmit="return nullcheck();"  action="addCertificatetypeSave.php" method="POST" >
						<div class="box-body">
							  <div class="box-body">
								<div class="form-group">
								  <label for="Certificate Name" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<input type="text" id="certificate" class="form-control" name="course" oninput="ontype();" placeholder="Certificate Name">
								  </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" >Session</label>
									
									<div class="col-sm-8 ">
									<select id="selectSess" class="select2" name="session[]" multiple="multiple" data-placeholder="Select a Session"
											style="width: 100%;">
									  <option value="March" >March</option>
									  <option value="June">June</option>
									  <option value="September">September</option>
									  <option value="December">December</option>
									</select>
									</div>
								  </div>
							  </div>
							   <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-danger" href="viewCertificatetype" role="button">Back</a>
								<?php if (isset($_GET['id'])){ ?>
								<button type="submit" class="btn btn-info pull-right" name="certificate_submit">Edit</button>
								<?php }else{ ?>
								<button type="submit" id="certifi_submit" class="btn btn-success pull-right" name="certificate_submit">Submit</button>
								<?php } ?> 
							</div>
						</div>	
					</form>
			</div> 									
		</div>
	</section>
	
<script>
  	function nullcheck(){
			
		$(".error").remove(); 
		
		if($('#certificate').val()==''){
			$('#certificate').after('<span class="error">* Please type a certificate Name</span>');
			return false;
		}
		
		
		if($('#selectSess').val()==''){
			$('#selectSess').after('<span class="error">* Please select particular sessions</span>');
			return false;
		}
		
	}
		function ontype(){
		$(".error").remove();
		
		
 }
</script> 
 
<?php
include_once 'includes/footer.php';
?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
 </script>
 
</body>
</html>