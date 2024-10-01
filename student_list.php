<?php
include 'database.php';
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM students");
$stmt->execute();
$students = $stmt->fetchAll();
?>

<a href="add_student.php">Add Student</a>
<a href="export.php">Export as CSV</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($students as $student): ?>
    <tr>
        <td><?php echo $student['name']; ?></td>
        <td><?php echo $student['age']; ?></td>
        <td><?php echo $student['mobile']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['gender']; ?></td>
        <td><?php echo $student['address']; ?></td>
        <td><?php echo $student['status']; ?></td>
        <td>
            <a href="edit_student.php?id=<?php echo $student['id']; ?>">Edit</a>
            <a href="delete_student.php?id=<?php echo $student['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
