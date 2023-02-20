<?php 

	$user_idcard = $_GET['user_idcard'];
	require 'connect.php';
	$sql = "SELECT * FROM vaccien_department where user_idcard = $user_idcard ORDER BY queue DESC LIMIT 1";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style-queue.css">
  <title>SHOW QUEUE PAGE</title>
   
</head>
<body>


  <div class="card">

    <div class="card__content">
      <p class="queue">คิวที่ : <?php echo $row[0] ?></p><br>
      <p class="username"><?php echo $row[1] ?></p></p><br>
      <p class="vaccien">วัคซีนที่รับ : <?php echo $row[5] ?></p><br>
      <p class="date"><?php echo $row[6] ?></p><br>
      <p class="date">แผนก : <?php echo $row[7] ?></p>
    </div>

  </div>

  




</body>
</html>