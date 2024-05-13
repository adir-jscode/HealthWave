<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    if (isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        
        // Validate password
        $isValid = true;
        if (empty($username)) {
            $_SESSION['usernameErrorMsg'] = "Username is required";
            $isValid = false;
        }
        else
        {
            $_SESSION['username'] = $username;
            $_SESSION['usernameErrorMsg'] = "";
        }


        if (empty($password)) {
            $_SESSION['passwordErrorMsg'] = "Password is required";
            $isValid = false;
        }
        if (empty($confirmPassword)) {
            $_SESSION['confirmPasswordErrorMsg'] = "Confirm password is required";
            $isValid = false;
        }
        if ($password !== $confirmPassword) {
            $_SESSION['confirmPasswordErrorMsg'] = "Password and confirm password do not match";
            $isValid = false;
        }
        else
        {
            $_SESSION['password'] = $password;
            $_SESSION['passwordErrorMsg'] = "";
            $_SESSION['confirmPassword'] = $confirmPassword;
            $_SESSION['confirmPasswordErrorMsg'] = "";
        }
        
        if ($isValid === true) 
        {
            //call the model function to reset password
            
            $isPasswordReset = ForgetPassword($username, $password);
            if ($isPasswordReset === true) 
            {
            $_SESSION['successMessage'] = "Password reset successful!";
            header('Location: ../Views/Home/Login.php');
            } 
            else 
            {
                $_SESSION['errorMessage'] = "Password reset unsuccessful!";
                header('Location: ../Views/Home/ForgetPassword.php');
            }
        } 
        else {
            
            header('Location: ../Views/Home/ForgetPassword.php');
            exit();
        }
    } 
    else {
        
        $_SESSION['errorMessage'] = "Invalid Request!";
        header('Location: ../Views/Home/ForgetPassword.php');
        exit();
    }
} 
else 
{
    
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: forget_password.php');
    exit();
}
?>
