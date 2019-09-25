<?php
session_start();
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
				  <h3 style="color:orange;" class="box-title">Certificate Name Form </h3>
				</div>
				<p class="login-box-msg" style="color:red;"><?php if(isset($_SESSION['cmsg'])){echo $_SESSION['cmsg'];}?></p>
					<form class="form-horizontal" action="addCertificatetypeSave.php" method="POST" >
						<div class="box-body">
							  <div class="box-body">
								<div class="form-group">
								  <label for="Certificate Name" class="col-sm-4 control-label">Certificate Name</label>

								  <div class="col-sm-8">
									<input type="text" class="form-control" name="certificatename" placeholder="Certificate Name">
								  </div>
								</div>
							  </div>
							   <!-- /.box-body -->
							<div class="box-footer">
								 <a class="btn btn-primary" href="viewCertificatetype.php" role="button" style="background-color:red">Back</a>
								<button type="submit" class="btn btn-info pull-right" style="background-color:green" name="certificate_submit">Submit</button>
								<button type="submit" class="btn btn-default pull-right" style="margin-right: 14px" name="certificate_reset" >Reset</button>
							</div>
						</div>	
					</form>
			</div> 									
		</div>
	</section>
 
<?php
include_once 'includes/footer.php';
include_once 'includes/footer_2.php';
?>