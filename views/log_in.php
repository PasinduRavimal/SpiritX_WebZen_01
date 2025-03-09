<?php 
session_start();
require_once('../config.php');

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $errors = [];

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    }
    if (empty($password)) {
        $errors['password'] = "Password is required.";
    }

    if (empty($errors)) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                
                if ($row['role'] == 'admin') {
                    header("Location: ../admin/admin.php");
                    exit;
                } else {
                    header("Location: ../home.php");
                    exit;
                }
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['username'] = "Username does not exist.";
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
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="background">

    </div>
    <div class="container">
        <form action="login.php" method="post">

            <div class="form-header">
                <h2>Login</h2>
            </div>
            <div class="form-group1">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span class="error"><?php echo $errors['username'] ?? ''; ?></span>
            </div>
            <div class="form-group2">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
            </div>
            <div class="showp">
            
            <label for="showpassword">Show Password</label>
            <input type="checkbox" onclick="togglePassword()">
                <script>
                    function togglePassword() {
                        var x = document.getElementById("password");
                        x.type = x.type === "password" ? "text" : "password";
                    }
                </script>
            </div>
            <div class="form-group">
                <center>
                    <button name="submit" type="submit">Login</button>
                </center>    
            </div>
            <div class="form-footer">
                <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                <p><a href="forgot.php">Forgot password?</a></p>
            </div>

        </form>
    </div>
    <footer >
        <p>&copy; 2025 Webzen Solutions</p>
    </footer>
</body>

</html>