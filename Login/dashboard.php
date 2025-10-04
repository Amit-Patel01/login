<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard </title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['username']; ?>! I hope your day is nice.</h1>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
