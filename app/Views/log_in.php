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
        <form action="login" method="post">
            <div class="form-header">
                <h2>Login</h2>
            </div>
            <div class="form-group1">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span class="error"><?php echo $username ?? ''; ?></span>
            </div>
            <div class="form-group2">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="error"><?php echo $password ?? ''; ?></span>
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
                <p>Don't have an account? <a href="signup">Sign up</a></p>
                <p><a href="forgot.php">Forgot password?</a></p>
            </div>

        </form>
    </div>
    <footer >
        <p>&copy; 2025 Webzen Solutions</p>
    </footer>
</body>

</html>