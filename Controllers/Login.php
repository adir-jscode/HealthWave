<?php 
session_start();


if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin' && $password == 'admin'){
        $_SESSION['username'] = $username;
        
        $_SESSION['isLogged'] = true;
        header('Location: ../Index.php');
    }else{
        header('Location: ../Views/Home/Login.php');
    }
}
?>