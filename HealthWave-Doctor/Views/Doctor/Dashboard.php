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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        .dashboard-links {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .dashboard-links a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 3px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .dashboard-links a:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h1>Welcome to Doctor Dashboard, <?php echo $_SESSION['username'] ?> </h1>
    <div class="dashboard-links">
        <?php 
        if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true)
        {
            echo '<a href="Profile.php">Profile</a>';
            echo '<a href="BookAppointment.php">Appointments</a>';
            echo '<a href="PatientManagement.php">Patients</a>';
            echo '<a href="Prescription.php">Prescriptions</a>';
            echo '<a href="LabTest.php">Lab Test</a>';
            echo '<a href="SupportTickets.php">Support Tickets</a>';
            echo '<a href="FeedBack.php">Feedback</a>';
            echo '<a href="ChangePassword.php">Change Password</a>';
            echo '<a href="../../Controllers/Logout.php">Logout</a>';
        }
        else
        {
            echo '<a href="Login.php">Login</a>';
        }
        ?>
    </div>
</body>
</html>
