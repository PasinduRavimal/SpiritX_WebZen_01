<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/signup.css">

    <script>
        function validatePassword() {
            let password = document.getElementById("password").value;
            let strengthBar = document.getElementById("strength-bar");
            let strength = 0;
            if (password.match(/[a-z]+/)) strength++;
            if (password.match(/[A-Z]+/)) strength++;
            if (password.match(/[0-9]+/)) strength++;
            if (password.match(/[^a-zA-Z0-9]+/)) strength++;
            strengthBar.value = strength;
        }
    </script>
</head>

<body>
    <div class="background"></div>

            
        <div class="container">

        <form action="signup" method="post">
        <div class="form-header">
            <h2>Signup</h2>
        </div>
        <div class="form-group1">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required oninput="this.setCustomValidity('')">
            <span class="error"><?php echo $username ?? ''; ?></span> <br>
        </div>

        <div class="form-group2">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required onkeyup="validatePassword()">
            <progress id="strength-bar" value="0" max="4"></progress>
            <span class="error"><?php echo $password ?? ''; ?></span>
        </div>
        <div class="form-group3">
            <label for="password">Confirm password:</label>
            <input type="password" id="con-password" name="confirm-password" required><br>
        </div>
         
        <div class="form-group">
            <center>
                <button name="submit" type="submit">Signup</button>
            </center>
        </div>
        <div class="form-footer">
                <a href="log_in">Registered or already have an account? </a>
            </div>


        </form>
        
        </div>

    <footer>
        <p>&copy; 2025 Webzen Solutions</p>
    </footer>
</body>

</html>
