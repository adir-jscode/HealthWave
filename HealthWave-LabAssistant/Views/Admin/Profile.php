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

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

h1, h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-submit {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

.form-submit:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
<div class="container">
        <h1>Welcome to Profile, <?php echo $_SESSION['username'] ?> </h1>
        <h2>Admin Profile</h2>
        <form action="../../Controllers/UpdateAdminController.php" method="POST">
            <fieldset>
                <legend>Personal Information</legend>
                <input type="hidden" name="id" value="<?php echo $profile['Id'] ?>">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $profile['Username']; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="<?php echo $profile['Password']; ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="1" <?php if ($profile['Status'] === '1') echo 'selected'; ?>>Active</option>
                        <option value="0" <?php if ($profile['Status'] === '0') echo 'selected'; ?>>Inactive</option>
                    </select>
                </div>
                <input type="submit" value="Update" class="form-submit">
            </fieldset>
        </form>
    </div>
        
</body>
</html>