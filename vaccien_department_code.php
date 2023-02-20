<?php

if(isset($_POST['user_name']) && isset($_POST['user_idcard']) && isset($_POST['user_phone']) && isset($_POST['user_detail'])
&& isset($_POST['user_vaccien']) && isset($_POST['user_date']) && isset($_POST['department'])){

  require 'connect.php';
  $sql = "INSERT INTO vaccien_department VALUES(NULL, '$_POST[user_name]','$_POST[user_idcard]','$_POST[user_phone]',
  '$_POST[user_detail]','$_POST[user_vaccien]','$_POST[user_date]','$_POST[department]')";
  $result = mysqli_query($conn,$sql);   

 echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

 if($result){
     echo '<script>
          setTimeout(function() {
           swal({
               title: "เพิ่มข้อมูลสำเร็จ",
               type: "success"
           }, function() {
               window.location = "vaccien_department_page.php";
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
               window.location = "vaccien_department_page.php";
           });
         }, 1000);
     </script>';
 }
 mysqli_close($conn);
}

?>

