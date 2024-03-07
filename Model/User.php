<?php 

require_once 'Db.php';

function ValidateLogin($Username, $Password)
{
    $con = getConnection();
    // here I want to check admin, doctor, patient, lab assistant login
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
    } elseif ($doctorResult->num_rows > 0) 
    {
        return "doctor";
    } elseif ($patientResult->num_rows > 0) 
    {
        return "patient";
    } elseif ($labAssistantResult->num_rows > 0) 
    {
        return "labAssistant";
    } else 
    {
        return false;
    }
}



?>