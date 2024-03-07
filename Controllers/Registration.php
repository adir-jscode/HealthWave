<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once '../Model/Db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    
    $con = getConnection();
    
    $sql = "INSERT INTO admin (username, password, status) VALUES ('$username', '$password', '1')";
    
    if(mysqli_query($con, $sql)){
        echo 'User registered successfully';
    }else{
        echo 'Error in registration';
    }
    
    mysqli_close($con);
}




?>