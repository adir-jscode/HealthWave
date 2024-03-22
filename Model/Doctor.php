<?php 
require_once 'Db.php';
function ShowProfile($Username)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$Username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return $result;
    } 
    else 
    {
        return false;
    }
}

function UpdateDoctorProfile($username, $fullName, $gender, $contactNo, $email, $address, $speciality)
{
    $con = getConnection();
    
    
    $sql = "UPDATE doctor SET FullName = '$fullName', Gender = '$gender', ContactNo = '$contactNo', Email = '$email', Address = '$address', Speciality = '$speciality' WHERE Username = '$username'";
    
    if ($con->query($sql) === TRUE) {
        return true; 
    } else {
        return false; 
    }
}

//verify current password
function VerifyPassword($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$username' AND Password = '$password'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}


function ChangePassword($username, $newPassword) {
    $con = getConnection();
    
    $sql = "UPDATE doctor SET Password = '$newPassword' WHERE Username = '$username'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//change appointment status
function ChangeAppointmentStatus($appointmentId) 
{
    $con = getConnection();
    
    $sql = "UPDATE appointment SET Status = '1' WHERE Id = '$appointmentId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//delete appointment
function DeleteAppointment($appointmentId) 
{
    $con = getConnection();
    
    $sql = "DELETE FROM appointment WHERE Id = '$appointmentId'";
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}







?>