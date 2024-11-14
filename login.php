<?php
include db_connect.php;

session_start();
if (isset($_SESSION['email'])) {
    header('Location: index.php'); // If logged in, redirect to home
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    // $conn = new mysqli('localhost', 'root', '', 'bihar_tourism');
    // if ($conn->connect_error) {
    //     die('Connection failed: ' . $conn->connect_error);
    // }

    // Prepare and execute query
    $stmt = $conn->prepare('SELECT  email, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $stored_username, $stored_password);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        // Check if the password matches
        if (password_verify($password, $stored_password)) {
            $_SESSION['email'] = $stored_username;
            echo "<script>alert('Login Successful!'); window.location = 'home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form method="POST">
    <label for="username">Email</label><br>
    <input type="text" name="username" id="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

<p><a href="forgot_password.php">Forgot Password?</a></p>

</body>
</html>
