<?php

	require 'connect.php';
	$sql = "ALTER TABLE contacted_table AUTO_INCREMENT = 1";
	$result = mysqli_query($conn,$sql);

	echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

	if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "RE-QUEUE SUCCESS",
                  type: "success"
              }, function() {
                  window.location = "contacted_table_edit_page.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
		}else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "contacted_table_edit_page.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }
    mysqli_close($conn);
 ?>