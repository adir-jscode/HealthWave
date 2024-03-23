<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h2>Change Password</h2>
    <form action="../../Controllers/ChangeDoctorPassword.php" method="POST">
        <label for="currentPassword">Current Password:</label><br>
        <input type="password" id="currentPassword" name="currentPassword"><br><br>
        
        <label for="newPassword">New Password:</label><br>
        <input type="password" id="newPassword" name="newPassword"><br><br>
        
        <label for="confirmPassword">Confirm New Password:</label><br>
        <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
        
        <input type="submit" value="Change Password">
        <?php echo isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : ""; ?>
    </form>
</body>
</html>
