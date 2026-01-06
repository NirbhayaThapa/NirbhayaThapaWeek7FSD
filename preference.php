<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$theme = isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $theme = $_POST['theme'];
    setcookie('theme', $theme, time() + 86400 * 30, "/");
    header("Location: preference.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body.light { background-color: white; color: black; }
        body.dark { background-color: black; color: white; }
    </style>
</head>
<body class="<?php echo $theme; ?>">
    <h2>Theme Preference</h2>
    <form method="POST">
        <select name="theme">
            <option value="light" <?php if($theme == 'light') echo 'selected'; ?>>Light Mode</option>
            <option value="dark" <?php if($theme == 'dark') echo 'selected'; ?>>Dark Mode</option>
        </select>
        <button type="submit">Apply Theme</button>
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>