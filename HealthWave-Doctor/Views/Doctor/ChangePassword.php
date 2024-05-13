<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <h2>Change Password</h2>
    <form id="changePasswordForm" action="../../Controllers/ChangeDoctorPassword.php" method="POST">
        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword">

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword">

        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword">

        <input type="submit" value="Change Password">
        <div id="errorMessage" class="error-message"></div>
        <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?>
    </form>
    <script src="../Js/ChangePassword.js"></script>
</body>
</html>
