<?php 
session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <table width="100%" height="100%">
        <tr>
            <td align="center" valign="middle">
                <form action="../../Controllers/Login.php" method="post">
                    <fieldset style="width: 300px;">
                        <legend>Login</legend>
                        <label for="username">Username:</label><br>
                        <input type="text" id="username" name="username" value=<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?> ><br><br>
                        <?php echo isset($_SESSION['usernameErrorMsg']) ? $_SESSION['usernameErrorMsg'] : ""; ?> <br>
                        <label for="password">Password:</label><br>
                        <input type="password" id="password" name="password" ><br><br>
                        <?php echo isset($_SESSION['passwordErrorMsg']) ? $_SESSION['passwordErrorMsg'] : ""; ?> <br>
                        <input type="submit" value="Login"> <br>
                        
                        <?php echo isset($_SESSION['Error']) ? $_SESSION['Error'] : ""; ?>
                        
                    </fieldset>
                </form>
                <!-- Forget Password -->
                <a href="ForgetPassword.php">Forget Password</a>
            </td>
        </tr>
    </table>
</body>
</html>
