<?php 

session_start();
require_once '../Model/Db.php';
require_once '../Model/User.php';

if(isset($_POST['Id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['maritalStatus']) && isset($_POST['bloodGroup']) && isset($_POST['fatherName']) && isset($_POST['motherName'])){
    
    $Id = $_POST['Id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $maritalStatus = $_POST['maritalStatus'];
    $bloodGroup = $_POST['bloodGroup'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $result = updatePatient($Id, $firstName, $lastName, $email, $password, $maritalStatus, $bloodGroup, $fatherName, $motherName);
    
    if($result > 0){
        header("Location: ../Views/Patient/Profile.php");
    }else{
        echo "Error";
    }
}


?>