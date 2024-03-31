<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Admin</title>
</head>
<body>
    <!-- Change password -->
    <form action="../../Controllers/ChangePasswordController.php" method="post">
        <fieldset style="width: 300px;">
            <legend>Change Password</legend>
            <label for="currentPassword">Current Password:</label><br>
            <input type="password" id="currentPassword" name="currentPassword" ><br><br>
            <label for="newPassword">New Password:</label><br>
            <input type="password" id="newPassword" name="newPassword" ><br><br>
            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" ><br><br>
            <input type="submit" value="Change Password"> <br>
        </fieldset>
</body>
</html>