<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Query the `users` table by email
    $query = "SELECT * FROM users WHERE email = '$user'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($pass, $row['password'])) {
            // Redirect to the destination page after successful login
            header("Location: https://laracasts.com/");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
