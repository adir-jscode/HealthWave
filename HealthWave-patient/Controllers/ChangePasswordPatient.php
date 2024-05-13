<?php 
session_start();
require_once '../Model/User.php';

if(isset($_SESSION['Id']) && isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['confirmPassword'])){
    
    $id = $_SESSION['Id'];
    $password = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    
    $user = getPatient($id);
    if($user['Password'] != $password){
        echo "Current password doesn't match";
        header("Location: ../Views/Patient/ChangePassword.php");
    }
    if($newPassword != $confirmPassword){
        echo "New password and confirm password doesn't match";
        return;
    }
    $result = ChangePasswordPatient($id, $newPassword);
    
    if($result > 0){
        header("Location: ../Views/Patient/Dashboard.php");
    }else{
        echo "Error";
    }
}

?>