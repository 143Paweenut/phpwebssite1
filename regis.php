<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="save.php" method="POST">
    <label for="sex">เพศ</label><br>
    <input type="radio" id="male" name="sex" value="ชาย" required>
    <label for="male">ชาย</label><br>
    <input type="radio" id="female" name="sex" value="หญิง" required>
    <label for="female">หญิง</label><br>
</form>

    <label for="fname">ชื่อ</label>
    <input type="text" name="fname"><br>
    <label for="lname">นามสกุล</label>
    <input type="text" name="lname"><br>
    <label for="birthday">วันเดือนปีเกิด</label>
    <input type="date" name="birthday"><br>
    <label for="username">ชื่อเข้าระบบ</label>
    <input type="text" name="username"><br>
    <label for="password">รหัสผ่าน</label>
    <input type="password" name="password"><br>
    
    <input type="submit" value="บันทึก">
</form>
</body>
</html>
