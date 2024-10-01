<?php
include 'database.php';
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && verify_password($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: student_list.php");
    } else {
        echo "Invalid credentials!";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Password: <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
