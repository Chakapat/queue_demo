<?php 

	$queue = $_GET['queue'];
	require 'connect.php';
	$sql = "SELECT * FROM contacted_table WHERE queue = $queue";
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
	<title>Outpatient Department Update Page</title>
	<style type="text/css">
		.disabled-input {
                     pointer-events: none;
                     background: #dddddd;
                    }
	</style>

</head>
<body>
	<div class="container">


		<br><form name="update" method="post" action="contacted_table_update_code.php">

			<div class="form-group">
				<label>QUEUE</label>
				<input type="text" name="queue" class="form-control disabled-input" value="<?php echo $row[0] ?>">
			</div>

			<br><div class="form-group">
				<label>ชื่อ-สกุล (Name)</label>
				<input type="text" name="user_name" class="form-control" value="<?php echo $row[1] ?>">
			</div>

			<br><div class="form-group">
				<label>เลขบัตรประจำตัว</label>
				<input type="text" name="user_idcard" class="form-control" value="<?php echo $row[2] ?>">
			</div>

			<br><div class="form-group">
				<label>เบอร์โทร</label>
				<input type="text" name="user_phone" class="form-control" value="<?php echo $row[3] ?>">
			</div>

			<br><div class="custom-select" style="width:100%;" value="<?php echo $row[4] ?>">
                <select name="topic_contact" id="topic_contact" required>
                <option value="t0">ติดต่อเรื่อง</option>
                <option value="ห้องตรวจโรคทั่วไป">ห้องตรวจโรคทั่วไป</option>
                <option value="ห้องตรวจแผนกกระดูกและข้อ">ห้องตรวจแผนกกระดูกและข้อ</option>
                <option value="ห้องตรวจกุมารเวช">ห้องตรวจกุมารเวช</option>
                <option value="ห้องตรวจแผนกอายุรกรรมโรคหัวใจ">ห้องตรวจแผนกอายุรกรรมโรคหัวใจ</option>
                <option value="ห้องตรวจแผนกจักษุกรรม">ห้องตรวจแผนกจักษุกรรม </option>
                <option value="ห้องตรวจแผนกหู คอ จมูก">ห้องตรวจแผนกหู คอ จมูก</option>
                </select>
            </div>

            <br><div class="form-group">
				<label>วันที่</label>
				<input type="date" name="user_date" class="form-control" value="<?php echo $row[5] ?>">
			</div><br>

            <div class="custom-select" style="width:100%;">
              <select name="department" id="department"  value="<?php echo $row[6] ?>" required>
                <option value="t0">ติดต่อแผนก</option>
                <option value="คลินิกกายภาพบำบัด">คลินิกกายภาพบำบัด</option>
                <option value="คลินิกแพทย์แผนไทย">คลินิกแพทย์แผนไทย</option>
                <option value="คลินิกผู้ป่วยทั่วไป">คลินิกผู้ป่วยทั่วไป</option>
                <option value="คลินิกพิเศษ(โรคเรื้อรัง)">คลินิกพิเศษ(โรคเรื้อรัง)</option>
                <option value="คลินิกทันตกรรม">คลินิกทันตกรรม</option>
                <option value="คลินิกสุขภาพเด็กดี">คลินิกสุขภาพเด็กดี</option>
                <option value="คลินิกวางแผนครอบครัว">คลินิกวางแผนครอบครัว </option>
              </select>
          </div>

			<br><button class="btn btn-success" type="submit">บันทึก</button>
			<button class="btn btn-danger" type="reset">ล้าง</button>

		</form>
	</div>
</body>
</html>