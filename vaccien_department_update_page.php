<?php 

	$queue = $_GET['queue'];
	require 'connect.php';
	$sql = "SELECT * FROM vaccien_department WHERE queue = $queue";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<title>Vaccien Department Update Page</title>
	<style type="text/css">
		.disabled-input {
                     pointer-events: none;
                     background: #dddddd;
                    }
	</style>

</head>
<body>
	<div class="container">

		<h3 class="text-center">queue</h3>

		<form name="update" method="post" action="vaccien_department_update_code.php">

			<div class="form-group">
				<label>QUEUE</label>
				<input type="text" name="queue" class="form-control disabled-input" value="<?php echo $row[0] ?>">
			</div>

			<div class="form-group">
				<label>ชื่อ-สกุล (Name)</label>
				<input type="text" name="user_name" class="form-control" value="<?php echo $row[1] ?>">
			</div>

			<div class="form-group">
				<label>เลขบัตรประจำตัว</label>
				<input type="text" name="user_idcard" class="form-control" value="<?php echo $row[2] ?>">
			</div>

			<div class="form-group">
				<label>เบอร์โทร</label>
				<input type="text" name="user_phone" class="form-control" value="<?php echo $row[3] ?>">
			</div>

			<div class="form-group">
				<label>แพ้ยา</label>
				<input type="text" name="user_detail" class="form-control" value="<?php echo $row[4] ?>">
			</div>

			<br><div class="select_viccien">
                        <span>โปรดเลือกชนิดวัคซีน : </span>
                        <select style="width:500px;"name="user_vaccien" id="user_vaccien"  value="<?php echo $row[5] ?>" required>
                            <option value="v0">----------</option>
                            <option value="Sinovac">Sinovac</option>
                            <option value="AstraZenaca">AstraZenaca</option>
                            <option value="Johnson & Johnson">Johnson & Johnson</option>
                            <option value="Pfizer">Pfizer</option>
                            <option value="Moderna ">Moderna</option>
                        </select>
                </div>

            <br><div class="form-group">
				<label>วันที่</label>
				<input type="date" name="user_date" class="form-control" value="<?php echo $row[6] ?>">
			</div>

			<br><div class="form-group">
				<label>แผนก</label>
				<input type="text" name="department" class="form-control" value="<?php echo $row[7] ?>">
			</div>

			<br><button class="btn btn-success" type="submit">บันทึก</button>
			<button class="btn btn-danger" type="reset">ล้าง</button>

		</form>
	</div>
</body>
</html>