  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			  <img  class="img-circle" >
			</div>
			<div class="pull-left info">
			  <p><?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?></p>
			  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
			<li><a href="index"><i class="fa fa-th"></i> <span>Dashboard</span></a></li>			
			<li><a href="viewStudentInfo"><i class="fa fa-circle-o text-yellow"></i> <span>All Students Information</span></a></li>
			<li><a href="viewCertificatetype"><i class="fa fa-circle-o text-aqua"></i> <span>All Course Name</span></a></li>
			<li><a href="viewAccountDetail"><i class="fa fa-circle-o text-yellow"></i> <span>All Account Details</span></a></li>
			<li><a href="viewStudentCourse"><i class="fa fa-circle-o text-red"></i> <span>All Students Certificate Info</span></a></li>
        
       <!-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li> -->
		
     <!--   <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li> -->
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">