<?php
	session_start();
	require "connect.php";
	if (isset($_POST['submit'])) {

		$user = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM login WHERE email = '$user' AND password = '$password'";
		$result = mysqli_query($conn, $sql);

		if ($result -> num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['userlevel'] = $row['userlevel'];
			if ($_SESSION['userlevel'] == "A") {
				header('location:admin_page.html');
			}
			if ($_SESSION['userlevel'] == "M") {
				header('location:index.html');
			}
		}else{
				echo '<script>
				   setTimeout(function() {
				      swal({
				        title: "เกิดข้อผิดพลาด",
				        type: "error"
				        }, function() {
				        window.location = "login-v2.html"; //หน้าที่ต้องการให้กระโดดไป
				        });
				       }, 1000);
				</script>';
		}
		       
	}
		echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';
 ?>