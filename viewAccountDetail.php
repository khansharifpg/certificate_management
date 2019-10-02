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
								  <th>Paybale Amount</th>
								  <th>Paid Amount</th>
								  <th>Due Amount</th>
								  <th>Fine</th>
<<<<<<< HEAD
								  <th>Action</th>
=======
								  <th>Edit</th>
>>>>>>> develop
								</tr>
							</thead>
							<tbody>		
								<?php
								include_once("dbCon.php");
								$conn =connect();
								$sql="SELECT * FROM accounts_detail";
								$result= $conn->query($sql);
								foreach($result as $value){
								 
								
								
								?>
								<tr>
								  <td><?=$value['StudentId']?></td>
								  <td>Internet Explore</td>
								  <td><?=$value['payable_amount']?></td>
								  <td><?=$value['paid_amount']?></td>
								  <td><?php $a = ($value ['payable_amount'] - $value['paid_amount']); echo $a;?></td>
								  <td><?=$value['fine']?></td>
								  <td><a href="addAccountDetail.php?id=<?=$value['id']?>"><button>Edit</button></td>
								</tr>
<<<<<<< HEAD
								<?php
								}
								?>
=======
							<?php } ?>
>>>>>>> develop
								
							</tbody>
							<tfoot>
								<tr>
								  <th>Student ID</th>
								  <th>Student Name</th>
								  <th>Paybale Amount</th>
								  <th>Paid Amount</th>
								  <th>Due Amount</th>
								  <th>Fine</th>
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
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<?php
include_once 'includes/footer_2.php';
?>