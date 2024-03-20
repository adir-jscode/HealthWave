<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    if(isset($_POST['fullName']) && isset($_POST['gender']) && isset($_POST['contactNo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['address']) && isset($_POST['speciality'])) {
        $isInvalid = true;
        // Retrieve data from the form
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $speciality = $_POST['speciality'];
        //validate the data
        if (empty($fullName)) {
            $_SESSION['fullNameErrorMsg'] = "Full name is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['fullName'] = $fullName;
            $_SESSION['fullNameErrorMsg'] = "";
        }
        if(empty($gender))
        {
            $_SESSION['genderErrorMsg']="Gender is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['gender']= $gender;
            $_SESSION['genderErrorMsg']="";
        }
        if(empty($contactNo))
        {
            $_SESSION['contactNoErrorMsg']="Contact number is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['contactNo']= $contactNo;
            $_SESSION['contactNoErrorMsg']="";
        }
        if(empty($email))
        {
            $_SESSION['emailErrorMsg']="Email is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['email']= $email;
            $_SESSION['emailErrorMsg']="";
        }
        if(empty($password))
        {
            $_SESSION['passwordErrorMsg']="Password is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['password']= $password;
            $_SESSION['passwordErrorMsg']="";
        }
        if(empty($username))
        {
            $_SESSION['usernameErrorMsg']="Username is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['username']= $username;
            $_SESSION['usernameErrorMsg']="";
        }
        if(empty($address))
        {
            $_SESSION['addressErrorMsg']="Address is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['address']= $address;
            $_SESSION['addressErrorMsg']="";
        }
        if(empty($speciality))
        {
            $_SESSION['specialityErrorMsg']="Speciality is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['speciality']= $speciality;
            $_SESSION['specialityErrorMsg']="";
        }
      
        $status = 1;
        
        
        $registrationStatus = RegisterDoctor($fullName, $gender, $contactNo, $email, $password, $username, $address, $speciality, $status);
        
        
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
