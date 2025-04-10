<?php
// Start the session to track user login
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Login Successful, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p>Welcome to your account.</p>
    <a href="logout.php">Logout</a> <!-- Provide a logout link -->
</body>
</html>
