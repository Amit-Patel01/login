<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInput = $_POST['userInput'];  // Mobile / Email / Username
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=? OR mobile=? OR email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userInput, $userInput, $userInput);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('✅ Login Successful!'); window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('❌ Invalid Password'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('❌ User not found'); window.location='login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
