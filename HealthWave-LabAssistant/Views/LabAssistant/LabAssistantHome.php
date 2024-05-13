<?php 
session_start();
require_once '../../Model/User.php';

if(isset($_SESSION['isLabAssistant']) && $_SESSION['isLabAssistant'] == true)
{
    
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
    <title>Lab Assistant - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .dashboard-links {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .dashboard-links li {
            margin-bottom: 15px;
        }

        .dashboard-links li a {
            display: block;
            padding: 12px;
            width: 200px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .dashboard-links li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Dashboard, <?php echo $_SESSION['username'] ?></h1>
        <ul class="dashboard-links">
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="AddEquipment.php">Add New Equipment</a></li>
            <li><a href="ChangePassword.php">Change Password</a></li>
            <li><a href="../../Controllers/Logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
