<?php
// Include the database connection
include('db_connect.php');

// Flags for triggering JavaScript alerts
$showAlert = false;           // For successful account creation
$passwordMismatch = false;    // For password mismatch error

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect and sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $passwordConfirm = mysqli_real_escape_string($conn, $_POST['password_confirm']);

    // Check if passwords match
    if ($password === $passwordConfirm) {
        // Hash password before storing
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the data into the users table
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            $showAlert = true;  // If user is created successfully, set the alert flag
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;  // If insertion fails, show the error
        }
    } else {
        $passwordMismatch = true;  // If passwords don't match, set the mismatch flag
    }
}

$conn->close();  // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signupStyle.css">
    
    <!-- JavaScript for confirmation and redirect -->
    <script>
        function confirmSignUp(event) {
            event.preventDefault(); // Prevent form submission initially
            
            var confirmation = confirm("Are you sure you want to create an account?");
            
            if (confirmation) {
                document.getElementById('signupForm').submit();  // Submit the form if confirmed
            } else {
                return false;  // Do nothing if cancelled
            }
        }

        <?php if ($showAlert) { ?>
            window.onload = function() {
                alert('New account created successfully!');
                window.location.href = 'login.php';  // Redirect to login page after successful sign-up
            };
        <?php } ?>

        <?php if ($passwordMismatch) { ?>
            window.onload = function() {
                alert('Passwords do not match!');
            };
        <?php } ?>
    </script>
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

    <main>
        <section class="signup-form">
            <h2>Create Your Account</h2>
            <form method="POST" action="signup.php" id="signupForm" onsubmit="confirmSignUp(event)">
                <div class="form-group">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password:</label>
                    <input type="password" id="password_confirm" name="password_confirm" required>
                </div>
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Bihar Tourism Website</p>
    </footer>
</body>
</html>
