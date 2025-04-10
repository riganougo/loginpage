<?php
include("connection.php");
session_start();

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
            // Set session variables on successful login
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['name'];

            // Redirect to the welcome page
            header("Location: welcome.php");
            exit();
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="form">

    <h1>Laracasts</h1>

    <form name="form" action="index.php" onsubmit="return isvalid()" method="POST">
       <label>Username:</label>
       <input type="text" id="user" name="user"></br></br>
       <label>Password:</label>
       <input type="password" id="pass" name="pass"> </br></br>
       <input type="submit" id="btn" value="Login" name="submit">
    </form>

    <?php if (!isset($_GET['from']) || $_GET['from'] !== 'signup'): ?>
    <!-- Signup Link -->
    <p>Not yet registered? <a href="signup.php">Signup</a></p>
    <?php endif; ?>

  </div>

<script>
    function isvalid() {
        var user = document.form.user.value;
        var pass = document.form.pass.value;
        if (user.length == "" && pass.length == "") {
            alert("Username and password field is empty!!");
            return false;
        } else {
            if (user.length == "") {
                alert("Username field is empty!!");
                return false;
            }
            if (pass.length == "") {
                alert("Password field is empty!!");
                return false;
            }
        }
    }
</script>

</body>
</html>
