<?php
require('dbconnect.php');

// ตรวจสอบว่าได้รับค่าจากฟอร์มแบบ POST หรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $emp_id = intval($_POST['emp_id']);
    $emp_title = mysqli_real_escape_string($con, $_POST['emp_title']);
    $emp_name = mysqli_real_escape_string($con, $_POST['emp_name']);
    $emp_surname = mysqli_real_escape_string($con, $_POST['emp_surname']);
    $emp_birthday = mysqli_real_escape_string($con, $_POST['emp_birthday']);
    $emp_adr = mysqli_real_escape_string($con, $_POST['emp_adr']);
    $emp_skill = mysqli_real_escape_string($con, $_POST['emp_skill']);
    $emp_tel = mysqli_real_escape_string($con, $_POST['emp_tel']);

    // สร้างคำสั่ง SQL สำหรับอัปเดตข้อมูล
    $sql = "UPDATE employee 
            SET emp_title = ?, emp_name = ?, emp_surname = ?, emp_birthday = ?, emp_adr = ?, emp_skill = ?, emp_tel = ?
            WHERE emp_id = ?";
    
    // ใช้ prepared statement เพื่อความปลอดภัย
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssi", $emp_title, $emp_name, $emp_surname, $emp_birthday, $emp_adr, $emp_skill, $emp_tel, $emp_id);

    // ตรวจสอบการทำงาน
    if ($stmt->execute()) {
        header("Location: index.php?message=updated");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "คำขอไม่ถูกต้อง";
}
?>
