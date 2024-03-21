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
</head>
<body>
    <h1>Welcome to Dashboard, <?php echo $_SESSION['username'] ?> </h1>

    <?php 
    
    if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true){
        
        
        
        echo '<a href="OnBoardDoctor.php">Onboard Doctor</a> <br>';
        echo '<a href="MedicineInventory.php">Medicine Inventory</a> <br>';
        echo '<a href="../../Controllers/Logout.php">Logout</a> <br>';
        
        
    }
    else{
        echo '<a href="Login.php">Login</a>';
    }
    
    ?>
</body>
</html>