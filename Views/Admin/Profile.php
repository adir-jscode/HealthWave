<?php
    session_start();
    require_once '../../Model/User.php';
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true)
    {
        if(isset($_SESSION['Id'])){
            $username = $_SESSION['Id'];
            $profile = getUser($username);
        }
    }
    else{
        header('Location: ../Home/Login.php');
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Admin</title>
</head>
<body>
    <h1>Welcome to Profile, <?php echo $_SESSION['username'] ?> </h1>
    <h2>Admin Profile</h2>
    <form action="../../Controllers/UpdateAdminController.php" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="hidden" name="id" value="<?php echo $profile['Id'] ?>">
            <!-- username field -->
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $profile['Username']; ?>" ><br><br>
            <!-- Password -->
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $profile['Password']; ?>" ><br><br>
            <!-- Status -->
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="1" <?php if ($profile['Status'] === '1') echo 'selected'; ?>>Active</option>
                <option value="0" <?php if ($profile['Status'] === '0') echo 'selected'; ?>>Inactive</option>
            </select><br><br>
            <!-- Update -->
            <input type="submit" value="Update">

        
</body>
</html>