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
</head>
<body>
    <h1>Welcome to Doctor Dashboard, <?php echo $_SESSION['username'] ?> </h1>
    <?php 
    
    if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true)
    {
        
        
        
        //profile
        //change password

        echo '<a href="Profile.php">Profile</a> <br>';
        echo '<a href="BookAppointment.php">Appointment History</a> <br>';
        echo '<a href="ChangePassword.php">Change Password</a> <br>';
        echo '<a href="../../Controllers/Logout.php">Logout</a> <br>';
        
        
    }
    else
    {
        echo '<a href="Login.php">Login</a>';
    }
    
    ?>
</body>
</html>