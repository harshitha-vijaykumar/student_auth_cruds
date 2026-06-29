<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
<h2>Dashboard</h2>
<p class="welcome">Welcome, <?php echo $_SESSION['name']; ?>!</p>
<a href="manage_user.php" class="login-btn">Manage Users</a>
<a href="register.php" class="login-btn">Register New User</a>
<a href="logout.php" class="login-btn">Logout</a>
</div>
</body>
</html>