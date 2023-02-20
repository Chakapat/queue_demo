<?php 

	$user_idcard = $_GET['user_idcard'];
	require 'connect.php';
	$sql = "SELECT * FROM contacted_table where user_idcard = $user_idcard ORDER BY queue DESC LIMIT 1";
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
   
    <style>

        .topic_contact{
            font-size:2rem;
        }

    </style>

</head>
<body>


  <div class="card">

    <div class="card__content">
      <p class="queue">คิวที่ : <?php echo $row[0] ?></p><br>
      <p class="user_name"><?php echo $row[1] ?></p></p><br>
      <p class="user_date"><?php echo $row[5] ?></p><br>
      <p style="font-size:2.5rem;"class="dapartment">แผนก : <?php echo $row[6] ?></p><br>
    </div>

  </div>

  




</body>
</html>