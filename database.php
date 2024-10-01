<?php
$host = 'localhost';
$dbname = 'student_management';
$username = 'root'; // change as per your DB configuration
$password = '12345'; // change as per your DB configuration

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
