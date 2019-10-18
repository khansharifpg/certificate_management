<?php
include_once 'signinchecker.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';

?>  

	
<!-- Main content -->
    <section class="content">
			
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Remarks Section:</h3>
			</div>
			<!-- /.box-header -->
			<div class="form-group">
			  <label>Comment here:</label>
			  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
</body>
</html>