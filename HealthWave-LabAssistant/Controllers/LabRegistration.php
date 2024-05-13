<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $isValid = true;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (empty($username)) {
            $_SESSION['usernameErrorMsg'] = "Username is required";
            $isValid = false;
        } else {
            $_SESSION['username'] = $username;
            $_SESSION['usernameErrorMsg'] = "";
        }

        if (empty($password)) {
            $_SESSION['passwordErrorMsg'] = "Password is required";
            $isValid = false;
        } else {
            $_SESSION['password'] = $password;
            $_SESSION['passwordErrorMsg'] = "";
        }

        if (empty($email)) {
            $_SESSION['emailErrorMsg'] = "Email is required";
            $isValid = false;
        } else {
            $_SESSION['email'] = $email;
            $_SESSION['emailErrorMsg'] = "";
        }

        if ($isValid) {
            $result = RegisterLabAssistant($username, $password, $email);
            if ($result) {
                $_SESSION['successMsg'] = "Registration successful. Please login.";
                header('Location: ../Views/Home/Login.php');
                exit();
            } else {
                $_SESSION['errorMsg'] = "Error in registration. Please try again.";
                header('Location: ../Views/Home/Registration.php');
                exit();
            }
        } else {
            header('Location: ../Views/Home/Registration.php');
            exit();
        }
    } else {
        header('Location: ../Views/Home/Registration.php');
        exit();
    }
} else {
    header('Location: ../Views/Admin/Registration.php');
    exit();
}
?>
