<?php 
session_start();
require_once('../config.php'); ?>

<?php

    if (isset($_POST['submit'])){

        $Username = $_POST['username'];
        $Password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username='$Username'";

        $result_log = mysqli_query($conn, $query);

        while ($record = mysqli_fetch_assoc($result_log)){
            if($record['password'] == $Password){

                $_SESSION['username'] = $record['username'];
                $_SESSION['email'] = $record['email'];

                if($record['role'] == 'admin'){
                    header("Location: ../admin/admin.php");
                    exit;
                }else{
                    header("Location: ../home.php");
                    exit;
                }
            }
        }

        echo "<script>alert('Login failed!');</script>";        
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
            </div>
            <div class="form-group2">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="showp">
            
            <label for="showpassword">Show Password</label>
            <input type="checkbox" onclick="myFunction()">
            <script> function myFunction() {    
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }</script>
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