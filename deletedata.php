<?php
require('dbconnect.php');

// ตรวจสอบว่ามีการส่ง id มาหรือไม่
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $emp_id = intval($_GET['id']); // แปลงค่าพารามิเตอร์ให้เป็นตัวเลข

    // ลบข้อมูลจากฐานข้อมูล
    $sql = "DELETE FROM employee WHERE emp_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $emp_id); // ใช้ prepared statement ป้องกัน SQL Injection
    if ($stmt->execute()) {
        header("Location: index.php"); // กลับไปหน้าแรกหลังลบสำเร็จ
        exit();
    } else {
        echo "เกิดข้อผิดพลาด: " . $con->error;
    }
} else {
    echo "ไม่พบข้อมูลที่ต้องการลบ";
}
?>
