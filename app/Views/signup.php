<?php

    if (isset($_POST['submit'])){

        $Username = $_POST['username'];
        $Email = $_POST['email'];
        $Password = $_POST['password'];

        
        $query = "INSERT INTO users (username, email, password) VALUES ('$Username', '$Email', '$Password')";

        $result = mysqli_query($conn, $query);

        if($result) {
            echo "<script>alert('Account created successfully!');</script>";
        } else {
            echo "<script>alert('Account creation failed!');</script>";        }
    }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <div class="background"></div>

            
        <div class="container">

        <form action="signup.php" method="post">

        <div class="form-header">
            <h2>Signup</h2>
        </div>
        <div class="form-group1">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group2">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group3">
            <label for="password">Confirm password:</label>
            <input type="password" id="password" name="confirm-password" required><br>
        </div>
         
        <div class="form-group">
            <center>
                <button name="submit" type="submit">Signup</button>
            </center>
        </div>
        <div class="form-footer">
                <a href="log_in.php">Registered or already have an account? </a>
            </div>


        </form>
        
        </div>

    <footer>
        <p>&copy; 2025 Webzen Solutions</p>
    </footer>
</body>

</html>
