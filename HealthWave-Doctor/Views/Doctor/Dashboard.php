<?php 
session_start();

if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true){
    
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
    <title>Doctor - Dashboard</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #008B8B;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard-links {
            list-style-type: none;
            padding: 0;
        }

        .dashboard-links li {
            margin-bottom: 10px;
        }

        .dashboard-links li a {
            display: block;
            padding: 10px;
            background-color: #7FFFD4;
            color: black;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .dashboard-links li a:hover {
            background-color: #7FFF00;
        }
        
        
    </style>
    </style>
</head>
<body>
    <div class="container">
    <h1>Welcome to Doctor Dashboard, <?php echo $_SESSION['username'] ?> </h1>
    <div class="dashboard-links">
        <?php 
        if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true)
        {
            echo '<li><a href="Profile.php">Profile</a></li>';
            echo '<li><a href="BookAppointment.php">Appointments</a></li>';
            echo '<li><a href="PatientManagement.php">Patients</a></li>';
            echo '<li><a href="Prescription.php">Prescriptions</a></li>';
            echo '<li><a href="LabTest.php">Lab Test</a></li>';
            echo '<li><a href="SupportTickets.php">Support Tickets</a></li>';
            echo '<li><a href="FeedBack.php">Feedback</a></li>';
            echo '<li><a href="ChangePassword.php">Change Password</a></li>';
            echo '<li><a href="../../Controllers/Logout.php">Logout</a></li>';
        }
        else
        {
            echo '<a href="Login.php">Login</a>';
        }
        ?>
    </div>
    </div>
</body>
</html>
