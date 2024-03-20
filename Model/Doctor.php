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





?>