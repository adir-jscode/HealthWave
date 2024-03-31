<?php 
session_start();
require_once '../Model/User.php';

if(isset($_SESSION['Id']) && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
    
    $id = $_SESSION['Id'];
    $password = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    
    $user = getUser($id);
    if($user['Password'] != $password){
        echo "Current password doesn't match";
        header("Location: ../Views/Admin/ChangePassword.php");
    }
    if($newPassword != $confirmPassword){
        echo "New password and confirm password doesn't match";
        return;
    }
    $result = ChangePassword($id, $newPassword);
    
    if($result > 0){
        header("Location: ../Views/Admin/User.php");
    }else{
        echo "Error";
    }
}

?>