<?php
require_once 'Db.php';

function createAppointment($patientName, $contactNo, $date, $time, $reason, $status) {
    $con = getConnection();
    
    // Prepare the SQL statement
    $sql = "INSERT INTO appointment (PatientName, ContactNo, Date, Time, Reason, Status) 
            VALUES ('$patientName', '$contactNo', '$date', '$time', '$reason', '$status')";
    
    // Execute the SQL statement
    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//show all appointments
function ShowAllAppointments() 
{
    $con = getConnection();
    $sql = "SELECT * FROM appointment";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}
?>
