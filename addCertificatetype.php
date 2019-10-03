<?php
session_start();
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';
include_once("dbCon.php");
$conn =connect();
?>

<?php 
if(isset($_GET['id'])){
	$id=$_GET['id'];
	//$sql= "SELECT * FROM certificate_nametype  WHERE id=$id";
	//echo $sql;
	//$result=$conn->query($sql);
}
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
		<div class="col-md-5 col-sm-offset-3">		
			<div class="box box-info">
				<div class="box-header with-border">
				  <h3 style="color:orange;" class="box-title">Course Name Form </h3>
				</div>
				<p class="login-box-msg" style="color:red;"><?php if(isset($_SESSION['cmsg'])){echo $_SESSION['cmsg'];}?></p>
					<form class="form-horizontal" action="addCertificatetypeSave.php" method="POST" >
						<div class="box-body">
							  <div class="box-body">
								<div class="form-group">
								  <label for="Certificate Name" class="col-sm-4 control-label">Course Name</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="course" placeholder="Certificate Name">
								  </div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" >Session</label>
									
									<div class="col-sm-8">
									<select class="select2" name="session[]" multiple="multiple" data-placeholder="Select a Session"
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
								 <a class="btn btn-danger" href="viewCertificatetype.php" role="button">Back</a>
								<?php if (isset($_GET['id'])){ ?>
								<button type="submit" class="btn btn-info pull-right" name="certificate_submit">Edit</button>
								<?php }else{ ?>
								<button type="submit" class="btn btn-success pull-right" name="certificate_submit">Submit</button>
								<?php } ?>
								<button type="submit" class="btn btn-default pull-right" style="margin-right: 14px" name="certificate_reset" >Reset</button>
							</div>
						</div>	
					</form>
			</div> 									
		</div>
	</section>
 
<?php
include_once 'includes/footer.php';
?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
 </script>
 
 <?php
include_once 'includes/footer_2.php';
?>