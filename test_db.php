<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SHOW DATABASES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Databases:<br>";
    while ($row = $result->fetch_assoc()) {
        echo $row["Database"] . "<br>";
    }
} else {
    echo "No databases found.";
}

$conn->close();
?>
