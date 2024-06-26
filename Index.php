<?php 
session_start();

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
        <h1>Welcome to HealthWave</h1>
        <ul class="dashboard-links">
            
            <li><a href="./HealthWave-Admin/Views/Home/Login.php">Admin</a></li>
            <li><a href="./HealthWave-Doctor/Views/Home/Login.php">Doctor</a></li>
            <li><a href="./HealthWave-patient/Views/Home/Login.php">Patient</a></li>
            <li><a href="./HealthWave-LabAssistant/Views/Home/Login.php">Lab Assistant</a></li>
            
        </ul>
    </div>
</body>
</html>
