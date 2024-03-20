<?php 
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
</head>
<body>
    <h2>Forget Password</h2>
    <form action="../../Controllers/ForgetPassword.php" method="POST" novalidate>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" ><br><br>
        
        <?php echo isset($_SESSION['usernameErrorMsg']) ? $_SESSION['usernameErrorMsg'] : ""; ?> <br>

        <label for="password">New Password:</label><br>
        <input type="password" id="password" name="password" ><br><br>
        
        <?php echo isset($_SESSION['passwordErrorMsg']) ? $_SESSION['passwordErrorMsg'] : ""; ?> <br>
        
        <label for="confirmPassword">Confirm New Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
    
        <?php echo isset($_SESSION['confirmPasswordErrorMsg']) ? $_SESSION['confirmPasswordErrorMsg'] : ""; ?> <br>
        
        <input type="submit" value="Reset Password">
        
    </form>
</body>
</html>
