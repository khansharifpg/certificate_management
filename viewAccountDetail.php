<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';
?>  

	<section class="content-header">
       <h1>      
         <a class="btn btn-primary"  href="addAccountDetail.php" role="button" style="background-color:green"> <i class="fa fa-plus" aria-hidden="true"></i>  Add Account details </a>
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
					  <h3 class="box-title">Students Account details Data Table </h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								  <th>Student ID</th>
								  <th>Student Name</th>
								  <th>Payable Amount</th>
								  <th>Paid Amount</th>
								  <th>Due</th>
								  <th>Fine</th>
								</tr>
							</thead>
							<tbody>		
								<?php							

								include_once("dbCon.php");

								$conn =connect();

								$sql= "SELECT * FROM accounts_detail";
								//echo $sql;
								
								$result=$conn->query($sql);
								//print_r($result);
								
								foreach($result as $value){
								
								?>
								<tr>
								  <td><?=$value['StudentId']?></td>
								  <td>Student name</td>
								  <td><?=$value['payable_amount']?></td>
								  <td><?=$value['paid_amount']?></td>
								  <td><?=$value['due']?></td>
								  <td><?=$value['fine']?></td>
								n</tr>
								<?php
								}
								?>
								

							</tbody>
							<tfoot>
								<tr>
								 <th>Student ID</th>
								  <th>Student Name</th>
								  <th>Payable Amount</th>
								  <th>Paid Amount</th>
								  <th>Due</th>
								  <th>Fine</th>
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
<?php
include_once 'includes/footer_2.php';
?>