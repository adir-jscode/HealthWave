<?php 
//update user information
session_start();
require_once '../../Model/Db.php';
require_once '../../Model/User.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
</head>
<body>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $user = getUser($id);
        }
    ?>
    <form action="../../Controllers/UpdateAdminController.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['Id'] ?>">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $user['Username'] ?>">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo $user['Password'] ?>">
        <br>
        <label for="status">Status</label>
        <select name="status">
            <option value="1" <?php if($user['Status'] == 1) echo "selected" ?>>Active</option>
            <option value="0" <?php if($user['Status'] == 0) echo "selected" ?>>Inactive</option>
        </select>
        <br>
        <input type="submit" value="Update">
    </form>