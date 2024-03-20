<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    if(isset($_POST['fullName']) && isset($_POST['gender']) && isset($_POST['contactNo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['address']) && isset($_POST['speciality'])) {
        
        // Retrieve data from the form
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $speciality = $_POST['speciality'];
        
      
        $status = 1;
        
        // Call RegisterDoctor function
        $registrationStatus = RegisterDoctor($fullName, $gender, $contactNo, $email, $password, $username, $address, $speciality, $status);
        
        // Check if registration was successful
        if($registrationStatus) {
            $_SESSION['successMessage'] = "Doctor registration successful!";
            header('Location: ../Views/Admin/Dashboard.php');
            exit();
        } 
        else {
            $_SESSION['errorMessage'] = "Doctor registration failed!";
            header('Location: ../Views/Admin/OnBoardDoctor.php'); 
            exit();
        }
    } 
    else {
        $_SESSION['errorMessage'] = "All fields are required!";
        header('Location: ../Views/Home/RegisterDoctor.php'); 
        exit();
    }
} else {
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: ../Views/Home/RegisterDoctor.php'); 
    exit();
}
?>
