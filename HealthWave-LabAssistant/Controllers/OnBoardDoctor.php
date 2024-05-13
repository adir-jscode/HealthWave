<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") 
{
    
    if(isset($_POST['fullName']) && isset($_POST['gender']) && isset($_POST['contactNo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && isset($_POST['address']) && isset($_POST['speciality'])) 
    {
        $isInvalid = true;
        
        $fullName = $_POST['fullName'];
        $gender = $_POST['gender'];
        $contactNo = $_POST['contactNo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
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
        if(empty($confirmPassword))
        {
            $_SESSION['confirmPasswordErrorMsg']="Confirm password is required";
            $isInvalid = false;
        }
        else
        {
            $_SESSION['confirmPassword']= $confirmPassword;
            $_SESSION['confirmPasswordErrorMsg']="";
        }

        //password and confirm password match
        if($password != $confirmPassword)
        {
            $_SESSION['confirmPasswordErrorMsg']="Password and confirm password do not match";
            $isInvalid = false;
        }
        // else
        // {
        //     $_SESSION['confirmPassword']= $confirmPassword;
        //     $_SESSION['confirmPasswordErrorMsg']="";
        // }
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

        if(!$isInvalid)
        {
            header('Location: ../Views/Admin/OnBoardDoctor.php'); 
            exit();
        }
        else
        {
        $status = 1;
        
        //verify username and email already exists
        $isUsernameExists = VerifyUsername($username);
        if ($isUsernameExists) {
            $_SESSION['usernameExistsMsg'] = "Username already exists!";
            header('Location: ../Views/Admin/OnBoardDoctor.php'); 
            exit();
        }
        else
        {
            $_SESSION['usernameExistsMsg'] = "";
        }
        $isEmailExists = VerifyEmail($email);
        if ($isEmailExists) {
            $_SESSION['emailExistsMsg'] = "Email already exists!";
            header('Location: ../Views/Admin/OnBoardDoctor.php'); 
            exit();
        }
        else
        {
            $_SESSION['emailExistsMsg'] = "";
        }
        
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
    
}     
} 
else 
{
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: ../Views/Admin/OnBoardDoctor.php'); 
    exit();
}
?>
