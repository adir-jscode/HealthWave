<?php 

require_once 'Db.php';

function ValidateLogin($Username, $Password)
{
    $con = getConnection();
    
    $adminLogin = "SELECT * FROM admin WHERE Username = '$Username' AND Password = '$Password'";
    $doctorLogin = "SELECT * FROM doctor WHERE Username = '$Username' AND Password = '$Password'";
    $patientLogin = "SELECT * FROM patient WHERE Username = '$Username' AND Password = '$Password'";
    $labAssistantLogin = "SELECT * FROM lab_assistant WHERE Username = '$Username' AND Password = '$Password'";
    
    $adminResult = $con->query($adminLogin);
    $doctorResult = $con->query($doctorLogin);
    $patientResult = $con->query($patientLogin);
    $labAssistantResult = $con->query($labAssistantLogin);

    if ($adminResult->num_rows > 0) 
    {
        return "admin";
    } 
    elseif ($doctorResult->num_rows > 0) 
    {
        return "doctor";
    }
    
    // elseif ($patientResult->num_rows > 0) 
    // {
        
    //     return "patient";
    // } 
    // elseif ($labAssistantResult->num_rows > 0) 
    // {
    //     return "labAssistant";
    // } 
    else 
    {
        return false;
    }
}

function RegisterDoctor($FullName,$Gender,$ContactNo,$Email,$Password,$Username,$Address,$Speciality,$Status)
{
    $con = getConnection();
    
    $sql = "INSERT INTO doctor (FullName,Gender,ContactNo,Email,Password,Username,Address,Speciality,Status) VALUES ('$FullName','$Gender','$ContactNo','$Email','$Password','$Username','$Address','$Speciality','$Status')";
    
    if ($con->query($sql) === TRUE) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}


function ForgetPassword($Username, $Password)
{
    $con = getConnection();
    $adminCheck = "SELECT * FROM admin WHERE Username = '$Username'";
    $doctorCheck = "SELECT * FROM doctor WHERE Username = '$Username'";
    $patientCheck = "SELECT * FROM patient WHERE Username = '$Username'";
    $labAssistantCheck = "SELECT * FROM lab_assistant WHERE Username = '$Username'";

    $adminResult = $con->query($adminCheck);
    $doctorResult = $con->query($doctorCheck);
    $patientResult = $con->query($patientCheck);
    $labAssistantResult = $con->query($labAssistantCheck);

    // Update password only if the username exists in a table
    if ($adminResult->num_rows > 0) {
        $sql = "UPDATE admin SET Password = '$Password' WHERE Username = '$Username'";
    } elseif ($doctorResult->num_rows > 0) {
        $sql = "UPDATE doctor SET Password = '$Password' WHERE Username = '$Username'";
    } elseif ($patientResult->num_rows > 0) {
        $sql = "UPDATE patient SET Password = '$Password' WHERE Username = '$Username'";
    } elseif ($labAssistantResult->num_rows > 0) {
        $sql = "UPDATE lab_assistant SET Password = '$Password' WHERE Username = '$Username'";
    } else {
        // Username not found in any table
        return false;
    }

    // Execute the update query
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}







?>