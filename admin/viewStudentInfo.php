<?php
$title = 'View Student Info | DIA';
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>  

<section class="content-header">
      <h1>      
         <a class="btn btn-primary"  href="addStudentInfo" role="button" style="background-color:green" > <i class="fa fa-plus" aria-hidden="true"></i> Add Student Information</a>
      </h1>
	  
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<!-- Main content -->
       <section class="content">
		<div class="row">
			<div class="col-xs-12">
				  
				<div class="box">
					<div class="box-header">
					  <h3 class="box-title">Students Data Table </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					<?php if (isset($_SESSION['cmsg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['cmsg']?></p></div>
					<?php unset ($_SESSION['cmsg']);} ?>
					<?php if (isset($_SESSION['amsg'])){?>
					<div class="callout callout-success msg"  ><p><?=$_SESSION['amsg']?></p></div>
					<?php unset ($_SESSION['amsg']);} ?>
					<?php if (isset($_SESSION['emsg'])){?>
					<div class="callout callout-danger msg" ><p><?php echo $_SESSION['emsg'];?></p></div>
					<?php unset ($_SESSION['emsg']); }?>
								<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								  <th>Local ID</th>
								  <th>NCC ID</th>
								  <th>Student Name</th>
								  <th>Date Of Birth</th>
								  <th>Email</th>
								  <th>Phone Number</th>
								  <th>Library Clearance</th>
								  <th>Add Account</th>
								  <th>Add Certificate</th>
								  <th>Edit</th>
								</tr>
							</thead>
							<tbody>		
								<?php
								include_once("dbCon.php");
								$conn =connect();
								$sql="SELECT s.*,a.local_id as lid FROM students_info as s LEFT JOIN accounts_detail as a ON s.local_id = a.local_id ";
								$result= $conn->query($sql);
								foreach($result as $value){
								 
								
								
								?>
								<tr>
								  <td><?=$value['local_id']?></td>
								  <td><?=$value['ncc_id']?></td>
								  <td><?=$value['full_name']?></td>
								  <td><?=$value['dob']?></td>
								  <td><?=$value['email']?></td>
								  <td><?=$value['phone']?></td>
								  <td><?php if ($value['library_clearance']==0){
									  echo "YES";
								  }else{
									  echo "No";
								  }?></td> 
								  
								  <td>
								  <?php
									if($value['lid']==null){
								  ?>
									<a type="button" class="btn btn-info" href="addAccountDetail?add_id=<?=$value['local_id']?>">Add Acc
								  <?php
										}else{
										echo 'Already Added';
									}
								  ?>
								  </td>
								  <td>
								   <?php
									if($value['lid']!==null){
								  ?>
									
								  <a type="button" class="btn btn-warning" href="addStudentCourse?ncc_id=<?=$value['ncc_id']?>&&name=<?=$value['full_name']?>">Add Certificate</td>
								  <?php
										}else{
										echo 'Account not added';
									}
								  ?>
								  </td>
								  
								  <td><a type="button" class="btn btn-primary" href="addStudentInfo?id=<?=$value['local_id']?>">Edit</td>
								</tr>
							<?php } ?>
								

							</tbody>
							<tfoot>
								<tr>
								  <th>Local ID</th>
								  <th>NCC ID</th>
								  <th>Student Name</th>
								  <th>Date Of Birth</th>
								  <th>Email</th>
								  <th>Phone Number</th>
								  <th>Library Clearance</th>
								  <th>Add Account</th>
								  <th>Add Certificate</th>
								  <th>Edit</th>
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
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>