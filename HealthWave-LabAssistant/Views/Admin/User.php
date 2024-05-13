<?php 

session_start();
require_once '../../Model/Db.php';
require_once '../../Model/User.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <!-- Html Table -->
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
            
           
        </tr>
        <?php
            $users = getUsers();
            foreach($users as $user){
                echo "<tr>";
                echo "<td>".$user['Id']."</td>";
                echo "<td>".$user['Username']."</td>";
                echo "<td>".$user['Password']."</td>";
                if($user['Status'] == 1){
                    echo "<td>Active</td>";
                }else{
                    echo "<td>Inactive</td>";
                }

                
                echo "<td>
                <a href='UpdateUser.php?id=".$user['Id']."'>Update</a>
                <a href='../Controllers/DeleteUserController.php?id=".$user['Id']."'>Delete</a>
                </td>";
                
                echo "</tr>";
                
            }
        ?>
</body>
</html>