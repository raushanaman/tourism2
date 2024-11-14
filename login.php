<?php

include('db_connect.php'); 
$error_message = "";
$success_message = "";

// Handle the login request
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email and password
    if (empty($email) || empty($password)) {
        $error_message = "Please enter both email and password.";
    } else {
        // Query the database to find the user
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, fetch the user's data
            $user = $result->fetch_assoc();

            // Verify the password 
            if (password_verify($password, $user['password'])) {
                
                $success_message = "Login successful! Redirecting to your dashboard...";

                //  JavaScript to alert the user and redirect
                echo "<script>
                        alert('$success_message');
                        window.location.href = 'index.php';
                      </script>";
                exit();
            } else {
                $error_message = "Invalid email or password.";
            }
        } else {
            $error_message = "No account found with that email.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="loginStyle.css"> 
</head>
<body>
<header>
        <nav>
            <h1><span class="highlight">T</span>ourism <span class="highlight">B</span>ihar</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Display error messages if any -->
        <?php if ($error_message != ""): ?>
            <script>
                alert("<?php echo $error_message; ?>");
            </script>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit" name="login">Login</button>
        </form>

    </div>
    <footer>
        <p>&copy; 2024 Bihar Tourism Website</p>
    </footer>
</body>
</html>

<?php
// Close the database connection if it's opened manually 
$conn->close();
?>
