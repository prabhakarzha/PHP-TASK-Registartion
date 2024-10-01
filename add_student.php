<?php
include 'database.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO students (name, age, mobile, email, gender, address, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $age, $mobile, $email, $gender, $address, $status]);

    header("Location: student_list.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    Mobile: <input type="text" name="mobile" required>
    Email: <input type="email" name="email" required>
    Gender: <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    Address: <textarea name="address" required></textarea>
    Status: <select name="status" required>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select>
    <button type="submit">Add Student</button>
</form>
