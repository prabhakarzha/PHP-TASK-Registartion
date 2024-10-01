<?php
include 'database.php';
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="students.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['Name', 'Age', 'Mobile', 'Email', 'Gender', 'Address', 'Status']);

$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$students = $stmt->fetchAll();

foreach ($students as $student) {
    fputcsv($output, $student);
}

fclose($output);
exit();
?>
