<?php 
include_once ('signinchecker.php');


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Dashboard | DIA </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand"><b>C</b>MS</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            
            <!-- User Account Menu -->
            <li>
              <!-- Menu Toggle Button -->
              <a>
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php if(isset($_SESSION['fullname'])){echo $_SESSION['fullname'];}?></span>
              </a>
            </li>
			<li>
              <!-- Menu Toggle Button -->
              <a href="logout.php">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Sign Out</span>
              </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Your Certificate's Information :
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
	  <?php 
	  include_once("dbCon.php");
		$conn =connect();
	  
	  $id = $_SESSION['local_id'];
			
			$sql = "SELECT * from accounts_detail as a, students_info as s Where a.local_id=s.local_id and a.local_id='$id'";
	
			$result = $conn->query($sql);
		foreach($result as $row){
	  
	  
	  if(( $row['library_clearance']==1) || ($row['due'] > 0)){?>
	  <div class="callout callout-danger">
          <h3>Notice!</h3>
		<?php if( $row['library_clearance']==1){?>
          <h4>You don't have library clearance. To collect your certificate, you need to have library clearance.</h4>
        
	  <?php } ?>
	  <?php if($row['due'] > 0){?>
          <h4>You have total <?=$row['due']?> taka due. To collect your certificate pay your dues.</h4>
        
	  <?php } ?>
	  </div>
		<?php } } ?>
		
		
		<?php 

		include_once("dbCon.php");
		$conn =connect();
		$id=$_SESSION['ncc_id'];
		$sql="SELECT * FROM `student_course` as s, course_info as c ,
		session_info as si WHere s.`session`=si.id AND s.`course_id`=c.id And s.`ncc_id` = '$id'";
		$result= $conn->query($sql);
		foreach($result as $value){


		?>
       
			<?php 
			
			
			
			
			
			if($value['delivery_date'] == null){ ?>
		<div class="callout callout-info">
		<div class="row" >
          <h4 class="col-md-8" >Certificate Name: <?=$value['course']?></h4>
          <h4 class="col-md-4" >Session : <?=$value['session']?></h4>
		  </div>
          <p>Your <?=$value['course']?> certificate is ready to collect!  </p>
		  </div>
			<?php }else{ ?>
			<div class="callout callout-success">
		<div class="row" >
          <h4 class="col-md-8" >Certificate Name: <?=$value['course']?></h4>
          <h4 class="col-md-4" >Session : <?=$value['session']?></h4>
		  </div>
          <p>You have collected you <?=$value['course']?> certificate on <?=$value['delivery_date']?>!  </p>
		  </div>
			<?php } ?>
        
		
		<?php } ?>
        
       
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 <footer class="main-footer">
<div class="pull-right hidden-xs">
  <b>Version</b> 2.4.18
</div>
<strong>Copyright &copy; 2014-2019 CMS</strong> All rights
reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
