<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $reentered_password = $_POST['re_enter_password'];

    if (empty($name) || empty($email) || empty($password) || empty($reentered_password)) {
        echo "All fields are required!";
    } elseif ($password !== $reentered_password) {
        echo "Passwords do not match!";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into the correct users table
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php?from=signup");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form method="POST">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required><br><br>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="re_enter_password">Re-enter Password:</label>
            <input type="password" id="re_enter_password" name="re_enter_password" required><br><br>
            
            <button type="submit" id="sbtn">Sign Up</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
