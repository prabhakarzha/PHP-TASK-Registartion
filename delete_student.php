<?php
include 'database.php';
include 'config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);

header("Location: student_list.php");
?>
