<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';

?>  

	<section class="content-header">
      <h1>      
         <a class="btn btn-primary"  href="addCertificatetype.php" role="button" style="background-color:green" > <i class="fa fa-plus" aria-hidden="true"></i> Add Course Name </a>
      </h1>
	  
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-10"> 
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">All Course Names Table </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								  <th>Course Name</th> 
								  <th>Session</th> 
								  <th>Action</th>
								</tr>
							</thead>
							<tbody>	
								<?php 
								include_once("dbCon.php"); 
								$conn =connect(); 
								$sql= "SELECT * FROM course_info";
								//echo $sql; 
								$result=$conn->query($sql);
								//print_r($result); 
								foreach($result as $value){ 
								?> 
								<tr>
								  <td><?=$value['course']?></td>
								  <td><?php
								  $id=$value['id'];
								  $sql= "SELECT * FROM session_info Where course_id='$id'";
							
								$result=$conn->query($sql);
								//print_r($result); 
								foreach($result as $row){ 
								
								echo $row['session'];echo '  &nbsp; | &nbsp;  ';
								}
								  
								  ?></td>
								  <td><a type="button" class="btn btn-primary" href="addCertificatetype.php?id=<?=$value['id']?>">Edit</td> 
								</tr>
								<?php
								}
								?>
							</tbody>
							<tfoot>
								<tr>
								  <th>Course Name</th>
								  <th>Session</th>
								  <th>Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>      
		</div>
    </section>

<?php
include_once 'includes/footer.php';
?>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php
include_once 'includes/footer_2.php';
?> 