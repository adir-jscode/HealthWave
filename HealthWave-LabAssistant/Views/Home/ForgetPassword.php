<?php 
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="ForgetPassword.css">
</head>
<body>
<div class="container">
        <h2>Forget Password</h2>
        <form action="../../Controllers/ForgetPassword.php" method="POST" novalidate>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username">
                <div class="error-message"><?php echo isset($_SESSION['usernameErrorMsg']) ? $_SESSION['usernameErrorMsg'] : ""; ?></div>
            </div>
            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password">
                <div class="error-message"><?php echo isset($_SESSION['passwordErrorMsg']) ? $_SESSION['passwordErrorMsg'] : ""; ?></div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm New Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword">
                <div class="error-message"><?php echo isset($_SESSION['confirmPasswordErrorMsg']) ? $_SESSION['confirmPasswordErrorMsg'] : ""; ?></div>
            </div>
            <input type="submit" value="Reset Password" class="form-submit">
        </form>
    </div>
</body>
</html>
