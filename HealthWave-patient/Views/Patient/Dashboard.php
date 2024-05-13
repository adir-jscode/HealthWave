<?php
session_start();
 
if(isset($_SESSION['isPatient']) && $_SESSION['isPatient'] == true){
   
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
    <title>Patient - Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 30px;
            color: #333;
        }

        .dashboard-links {
            text-align: center;
            margin-top: 20px;
        }

        .dashboard-links a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Welcome to Patient Dashboard, <?php echo $_SESSION['username'] ?></h1>
    <div class="dashboard-links">
        <a href="Profile.php">Profile</a>
        <a href="BookAppointment.php">Book Appointment</a>
        <a href="ChangePassword.php">Change Password</a>
        <a href="../../Controllers/Logout.php">Logout</a>
    </div>
</body>
</html>