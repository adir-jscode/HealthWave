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
    <title>Admin - Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard, <?php echo $_SESSION['username'] ?> </h1>
</body>
</html>