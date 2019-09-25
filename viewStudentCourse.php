<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
include_once 'includes/sidenavbar.php';
include_once 'includes/maincontenthome.php';
?>  

	<section class="content-header">
       <h1>      
         <a class="btn btn-primary"  href="addStudentCourse.php" role="button" style="background-color:green"> <i class="fa fa-plus" aria-hidden="true"></i> Add Student Course </a>
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
								  <th>Rendering engine</th>
								  <th>Browser</th>
								  <th>Platform(s)</th>
								  <th>Engine version</th>
								  <th>CSS grade</th>
								</tr>
							</thead>
							<tbody>		
								
								<tr>
								  <td>Tasman</td>
								  <td>Internet Explorer 4.5</td>
								  <td>Mac OS 8-9</td>
								  <td>-</td>
								  <td>X</td>
								</tr>
								<tr>
								  <td>Tasman</td>
								  <td>Internet Explorer 5.1</td>
								  <td>Mac OS 7.6-9</td>
								  <td>1</td>
								  <td>C</td>
								</tr>

							</tbody>
							<tfoot>
								<tr>
								  <th>Rendering engine</th>
								  <th>Browser</th>
								  <th>Platform(s)</th>
								  <th>Engine version</th>
								  <th>CSS grade</th>
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