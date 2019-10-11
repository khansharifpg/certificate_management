<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
?>
<script>

function datasession(){
		var id = $('#courseID').val();
		var sess = $('#session');
		$.ajax({
			type:'POST',
			url:'addStudentCourseSave.php',
			data:{id:id},
			dataType:"json",
			success : function(response){
					$('#session').empty();
				for(var i=0;i<response.length ;i++){
					$('#session').append('<option value="'+response[i].id+'">'+response[i].session+'</option>');
				}
			}
		});
	}
</script>
<?php
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>
<?php
include_once("dbCon.php");
$conn =connect();
if(isset($_POST['delivery'])){
	$date = date('d-m-Y');
	$ncc = $_POST['ncc_id'];
	$course = $_POST['course'];
	$session = $_POST['session'];
	$sql= "UPDATE student_course SET delivery_date='$date'
			WHERE ncc_id='$ncc' AND course_id='$course' AND session='$session'";
	//echo $sql;

	$conn->query($sql);


}
?>

	<section class="content-header">
       <h1>
         <a class="btn btn-primary"  href="addStudentCourse" role="button" style="background-color:green"> <i class="fa fa-plus" aria-hidden="true"></i> Add Student Certificate Info </a>
      </h1>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<!-- Main content -->
    <section class="content">

	<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Search students </h3>
        </div>
        <div class="box-body">
			<form method="get" >
		<div class="col-sm-5">

          	<div class="form-group">
			  <label for="Certificate Name" class="col-sm-4 control-label">Course :</label>
			  <div class="col-sm-8">
				<select onchange="datasession()" id="courseID"  class="form-control select2" name="course" style="width: 100%;">
					<option>Select from here</option>
				<?php
					include_once("dbCon.php");
					$conn =connect();
					$sql="SELECT * FROM course_info";
					$result= $conn->query($sql);
					foreach($result as $value){
				?>
				  <option value="<?=$value['id']?>" ><?=$value['course']?></option>
				 <?php
					}
				 ?>
				</select>
				</div>
			</div>
		</div>
		<div class="col-sm-5">
          	<div class="form-group">
			  <label for="Certificate Name" class="col-sm-4 control-label">Session :</label>
			  <div class="col-sm-8">
				<select class="form-control select2" name="session" id = "session" style="width: 100%;">

				</select>
				</div>
			</div>
		</div>
		<div class="col-sm-2">
			  <button class="btn btn-success form-control" id="but" >Search</button>
		</div>
		</form>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

		<?php if(isset($_GET['course'])){ ?>
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
								  <th>Local ID</th>
								  <th>NCC ID</th>
								  <th>Student FullName</th>
								   <th>Account Clearence</th>
								  <th>Library Clearence</th>
								  <th>Delivery Status </th>
								  <th>Remarks</th>
								  <th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include_once("dbCon.php");
								$conn =connect();
								$id = $_GET['course'];
								$session = $_GET['session'];
								$sql="SELECT *,si.id as sid FROM students_info as s,student_course as sc ,accounts_detail as a ,session_info as si, course_info as c
								where s.ncc_id=sc.ncc_id AND sc.session=si.id AND s.local_id = a.local_id and  c.id = sc.course_id AND c.id = '$id' AND si.id = '$session'";
									//echo $sql;
								$result= $conn->query($sql);
								foreach($result as $value){

								?>
								<tr>
								  <td><?=$value['local_id']?></td>
								  <td><?=$value['ncc_id']?></td>
								  <td><?=$value['full_name']?></td>
								  <td><?=$value['due']?> tk</td>
								  <td><?php if ($value['library_clearance']==0){
									  echo "YES";
								  }else{
									  echo "No";
								  }?></td>
								  <td><?php if(($value['library_clearance']==1) || ($value['due']>0)){
									  //echo 'dd';

										  echo "Pay due";
									  ?>

									  <?php }
									  elseif(($value['library_clearance']==0) && ($value['due']==0)){
											if($value['delivery_date']!= null){
										  echo $value['delivery_date'];
									  }else{

												?>
										<form method="POST" >
										<input type ="hidden" value="<?=$value['ncc_id']?>" name="ncc_id" >
										<input type ="hidden" value="<?=$value['course_id']?>" name="course" >
										<input type ="hidden" value="<?=$value['sid']?>" name="session" >
										<button class="btn btn-primary" name="delivery" >Deliver</button>
									   </form>
									  <?php }}?>
								  </td>


								  <td><form method="POST">
										<button class="btn btn-danger" name="delivery" >Remarks</button>
									</form></td>
								   <td><a type="button" class="btn btn-primary" href="addsStudentCertificateInfo.php?id=<?=$value['id']?>">Edit</td>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
								  <th>Local ID</th>
								  <th>NCC ID</th>
								  <th>Student Name</th>
								   <th>Account Clearence</th>
								  <th>Library Clearence</th>
								  <th>Delivery Status</th>
								  <th>Remarks</th>
								  <th>Edit</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
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
  $('#checkAll').click(function () {
     $('input:checkbox').prop('checked', this.checked);
 });


</script>
</html>
</body>
