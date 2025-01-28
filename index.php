<?php
require('dbconnect.php');
$sql = "SELECT * FROM employee"; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Dancing+Script&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }

    h1 {
      font-family: 'Dancing Script', cursive;
      color: #f06292; /* สีชมพูอ่อน */
      margin-top: 30px;
    }

    .btn {
      border-radius: 25px;
      font-weight: bold;
    }

    .btn-info {
      background-color: #f8c8d5; /* สีชมพูอ่อน */
      border-color: #f8c8d5;
    }

    .btn-info:hover {
      background-color: #f06292;
      border-color: #f06292;
    }

    .btn-success {
      background-color: #a5d6a7; /* สีเขียวอ่อน */
      border-color: #a5d6a7;
    }

    .btn-success:hover {
      background-color: #81c784;
      border-color: #81c784;
    }

    .table {
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table-dark {
      background-color: #f06292; /* สีชมพูอ่อน */
      color: white;
    }

    .form-control {
      border-radius: 25px;
      padding: 12px;
    }

    .container {
      margin-top: 50px;
    }

    .row {
      margin-top: 10px;
    }

    .table th, .table td {
      vertical-align: middle;
    }
  </style>

  <title>รายชื่อพนักงานทั้งหมด</title>
</head>

<body>
  <div class="container">
    <?php require("nav.php"); ?>
    <h1 class="text-center mt-3">รายชื่อพนักงานทั้งหมด</h1>
    <form action="searchdata.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-6">
          <input type="text" placeholder="กรอกชื่อหรือนามสกุลที่ต้องการค้น" class="form-control" name="emp_data" required>
        </div>
        <div class="col-6">
          <input type="submit" value="ค้นหาข้อมูลพนักงาน" class="btn btn-info">
        </div>
      </div>
    </form>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>คำนำหน้า</th>
          <th>ชื่อ</th>
          <th>สกุล</th>
          <th>วันเกิด</th>
          <th>ที่อยู่ปัจจุบัน</th>
          <th>ทักษะความสามารถ</th>
          <th>เบอร์โทรศัพท์</th>
          <th>จัดการ</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $order++; ?></td>
            <td><?php echo $row["emp_title"]; ?></td>
            <td><?php echo $row["emp_name"]; ?></td>
            <td><?php echo $row["emp_surname"]; ?></td>
            <td><?php echo $row["emp_birthday"]; ?></td>
            <td><?php echo $row["emp_adr"]; ?></td>
            <td><?php echo $row["emp_skill"]; ?></td>
            <td><?php echo $row["emp_tel"]; ?></td>
            <td>
              <a href="editformdata.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
              <a href="deletedata.php?id=<?php echo $row["emp_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้หรือไม่?');">ลบ</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <a href="insertform.php" class="btn btn-success">กรอกข้อมูลพนักงาน</a>

  </div>

  <!-- Optional JavaScript; choose one of the two! -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
