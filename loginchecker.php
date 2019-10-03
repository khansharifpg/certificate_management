<?php
			session_start();
			include_once '../dbCon.php';
			$conn = connect();
			if(isset($_POST['submit'])){
				$mail 		= $_POST['email'];
				$password 	= $_POST['password'];
        echo $password;
				$sql = "SELECT * FROM `renter_details` WHERE `email`='$mail' AND `password`='$password'";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					$_SESSION['isLoggedIn'] = TRUE;
					foreach($result as $row){
							$_SESSION['renter_id']=$row['renter_id'];
							$_SESSION['name']=$row['name'];
							$_SESSION['email']=$row['email'];
							$_SESSION['phone']=$row['phone'];
							$_SESSION['role']=$row['role'];
            }
            echo "<script>window.location.href='dashboard.php'</script>";
          } else {
            echo "<script>window.location.href='login.php'</script>";
          }
        }
?>