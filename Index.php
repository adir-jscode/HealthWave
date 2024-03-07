<?php 
session_start();
// navbar
include 'Views/Home/Nav.php';

if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true){
    
}else{
    header('Location: Views/Home/Login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthWave || Home </title>
</head>
<body>
    <h1>Hello from HealthWave, Welcome ,<?php echo $_SESSION['username']; ?></h1>
    
    <?php 
    
    if(isset($_SESSION['isLogged']) && $_SESSION['isLogged'] == true){
        echo '<a href="Views/Home/Logout.php">Logout</a>';
    }else{
        echo '<a href="Login.php">Login</a>';
    }
    
    ?>

   
    <br>
    
</body>
</html>


<?php 

// footer
include 'Views/Home/Footer.php';


?>
