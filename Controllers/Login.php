<?php 
session_start();
require_once '../Model/User.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = ValidateLogin($username, $password);
    if ($userType !== false) 
    {
        $_SESSION['username'] = $username;
        if ($userType == 'admin') 
        {
            $_SESSION['isAdmin'] = true;
            header('Location: ../Views/Admin/Dashboard.php');
            

        } 
        elseif ($userType == 'doctor') {
            header('Location: ../Views/Doctor/DoctorHome.php');
        } elseif ($userType == 'patient') {
            header('Location: ../Views/Patient/PatientHome.php');
        } elseif ($userType == 'labAssistant') {
            header('Location: ../Views/LabAssistant/LabAssistantHome.php');
        } else {
            header('Location: ../Views/Home/Login.php');
        }
    } 
    
    else {
        header('Location: ../Views/Home/Login.php');
    }
}
?>