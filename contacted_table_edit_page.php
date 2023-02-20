<?php

include 'connect.php';
$sql = "SELECT * FROM contacted_table";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="edit-style.css">
    <title>Edit Page Outpetient Department</title>

    <style>

        .top-btn{
            display: flex;
            justify-content: center;
        }

        .top-btn button{
            margin-bottom: 5px;
        }

        table tr{
            text-align: center;
        }

    </style>

</head>
<body>
    
    <div class="container">

        <br><h2 class="text-center">Edit Page Outpetient Department</h2><br>

        <div class="top-btn">
            <a href="contacted_table_page.php"><button class="btn btn-secondary" >BACK TO INSERT PAGE</button></a>

            <form action="contacted_table_deleterow.php">
                &nbsp;&nbsp;<button class="btn btn-danger" onclick = "return confirm('DELETE ROW ALL COMFIRM!')">DELETE ALL ROW</button></a>
            </form>

            <form action="contacted_table_requeue.php">
                &nbsp;&nbsp;<button class="btn btn-danger" onclick = "return confirm('RE QUEUE COMFIRM!')">RE-QUEUE</button></a>
            </form>

        </div>

        <br><table class="table table-striped table-dark">
            <thead>
                <tr class="table-primary">
                <th scope="col">คิว</th>
                <th scope="col">ชื่อ - สกุล</th>
                <th scope="col">เลขบัตรประจำตัว</th>
                <th scope="col">เบอร์โทร</th>
                <th scope="col">ติดต่อเรื่อง</th>
                <th scope="col">วันที่</th>
                <th scope="col">แผนก</th>
                <th style="color: green;" colspan="2">แก้ไข</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                <?php
                while ($row = mysqli_fetch_row($result)) {?>
                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>
                    <td><?php echo $row[5]?></td>
                    <td><?php echo $row[6]?></td>

                    <td><a href="contacted_table_update_page.php?queue=<?php echo $row[0] ?>">
                    <button class="btn btn-warning">แก้ไข</button></a></td>

                    <td><a href="contacted_table_deletethisrow.php?queue=<?php echo $row[0] ?>">
                    <button class="btn btn-danger" onclick = "return confirm('ยืนยันการลบข้อมูล!!')">ลบตารางนี้</button></a></td>
                    

                </tr>

                <?php } ?>
                
                </tr>
            </tbody>

        </table>
  </div>

    <!-- <center>
    <form action="delete_all.php">
        <br><button style="width:68%;"class="btn btn-danger" onclick = "return confirm('RE QUEUE COMFIRM!')">DELETE ALL ROW</button></a><br>
    </form>
    </center>

    <center>
    <form action="requeue.php">
        <br><button style="width:68%;"class="btn btn-danger" onclick = "return confirm('RE QUEUE COMFIRM!')">RE-QUEUE</button></a><br>
    </form>
    </center> -->

    <br><h4 class="text-center">จำนวน <?php echo $count; ?> รายการ </h4>


</body>
</html>