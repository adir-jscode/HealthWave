<?php 
session_start();
require_once '../../Model/User.php';

if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true)
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
    <title>Admin - Dashboard</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; /* Changed background color to a lighter shade */
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px; /* Increased max-width for a wider container */
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px; /* Increased border-radius for a softer look */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Adjusted box shadow for a subtle effect */
}

h1 {
    text-align: center;
    margin-bottom: 30px; /* Increased margin for more spacing */
    color: #333; /* Added color to h1 for better readability */
}

.dashboard-links {
    list-style-type: none;
    padding: 0;
}

.dashboard-links li {
    margin-bottom: 15px; /* Increased margin for more spacing between links */
}

.dashboard-links li a {
    display: block;
    padding: 12px; /* Increased padding for larger clickable area */
    background-color: #007bff; /* Changed link background color */
    color: #fff;
    text-decoration: none;
    border-radius: 6px; /* Slightly increased border-radius */
    transition: background-color 0.3s ease;
}

.dashboard-links li a:hover {
    background-color: #0056b3; /* Darker hover color for contrast */
}


    </style>
</head>

<body>
<div class="container">
        <h1>Welcome to Dashboard, <?php echo $_SESSION['username'] ?></h1>
        <ul class="dashboard-links">
            
            <li><a href="Profile.php">Profile</a></li>
            <li><a href="ChangePassword.php">Change Password</a></li>
            <li><a href="OnBoardDoctor.php">Onboard Doctor</a></li>
            <li><a href="MedicineInventory.php">Medicine Inventory</a></li>
            <li><a href="../../Controllers/Logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>