<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['student_id']; ?>!</h1>
    <nav>
        <a href="preference.php">Theme Preference</a> |
        <a href="logout.php">Logout</a>
    </nav>
    <p>You are logged in to the Student Grade Portal.</p>
</body>
</html>