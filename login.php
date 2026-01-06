<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM students WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $stmt->bind_result($stored_hash);
    $stmt->fetch();

    if (password_verify($password, $stored_hash)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['student_id'] = $student_id;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Login</h2>
    <form method="POST">
        Student ID: <input type="text" name="student_id" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>New user? <a href="register.php">Register</a></p>
</body>
</html>