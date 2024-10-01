<?php
include 'database.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE students SET name=?, age=?, mobile=?, email=?, gender=?, address=?, status=? WHERE id=?");
    $stmt->execute([$name, $age, $mobile, $email, $gender, $address, $status, $id]);

    header("Location: student_list.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
    Age: <input type="number" name="age" value="<?php echo $student['age']; ?>" required>
    Mobile: <input type="text" name="mobile" value="<?php echo $student['mobile']; ?>" required>
    Email: <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
    Gender: <select name="gender" required>
        <option value="Male" <?php echo $student['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?php echo $student['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
    </select>
    Address: <textarea name="address" required><?php echo $student['address']; ?></textarea>
    Status: <select name="status" required>
        <option value="Active" <?php echo $student['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
        <option value="Inactive" <?php echo $student['status'] == 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
    </select>
    <button type="submit">Update Student</button>
</form>
