<?php 
session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            </td>
        </tr>
    </table>
</body>
</html>
