<?php 

require_once 'Db.php';

function ValidateLogin($Username, $Password)
{
    $con = getConnection();
    
    $adminLogin = "SELECT * FROM admin WHERE Username = '$Username' AND Password = '$Password'";
    $doctorLogin = "SELECT * FROM doctor WHERE Username = '$Username' AND Password = '$Password'";
    $patientLogin = "SELECT * FROM patient WHERE Username = '$Username' AND Password = '$Password'";
    //$labAssistantLogin = "SELECT * FROM lab_assistant WHERE Username = '$Username' AND Password = '$Password'";
    
    $adminResult = $con->query($adminLogin);
    $doctorResult = $con->query($doctorLogin);
    $patientResult = $con->query($patientLogin);
    //$labAssistantResult = $con->query($labAssistantLogin);

    if ($adminResult->num_rows > 0) 
    {
        
        $row = $adminResult->fetch_assoc();
        $_SESSION['Id'] = $row['Id'];
        return "admin";
    } 
    elseif ($doctorResult->num_rows > 0) 
    {
        $row = $adminResult->fetch_assoc();
        $_SESSION['Id'] = $row['Id'];
        return "doctor";
    }
    
     elseif ($patientResult->num_rows > 0) 
     {
        
        $row = $adminResult->fetch_assoc();
        $_SESSION['Id'] = $row['Id'];
         return "patient";
     } 

    // elseif ($labAssistantResult->num_rows > 0) 
    // {
    //     return "labAssistant";
    // } 
    else 
    {
        return false;
    }
}

//verify username & email already exists
function VerifyUsername($Username)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Username = '$Username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

function VerifyEmail($Email)
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor WHERE Email = '$Email'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) 
    {
        return true;
    } 
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
    //$labAssistantResult = $con->query($labAssistantCheck);

    // Update password only if the username exists in a table
    if ($adminResult->num_rows > 0) {
        $sql = "UPDATE admin SET Password = '$Password' WHERE Username = '$Username'";
    } elseif ($doctorResult->num_rows > 0) {
        $sql = "UPDATE doctor SET Password = '$Password' WHERE Username = '$Username'";
    } elseif ($patientResult->num_rows > 0) {
        $sql = "UPDATE patient SET Password = '$Password' WHERE Username = '$Username'";
    } 
    // elseif ($labAssistantResult->num_rows > 0) {
    //     $sql = "UPDATE lab_assistant SET Password = '$Password' WHERE Username = '$Username'";
    // }
     else {
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


function ChangePassword($Id, $Password)
{
    $con = getConnection();
    $stmt = $con->prepare("UPDATE admin SET Password = ? WHERE Id = ?");
    $stmt->bind_param("si", $Password, $Id);
    $stmt->execute();
    return $stmt->affected_rows;
}


function getUsers(){
    $con = getConnection();
    $stmt = $con->prepare("SELECT * FROM admin");
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC);
    return $users;
}

function getUser($id){
    $con = getConnection();
    $stmt = $con->prepare("SELECT * FROM admin WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}

function updateUser($id, $username, $password, $status){
    $con = getConnection();
    $stmt = $con->prepare("UPDATE admin SET Username = ?, Password = ?, Status = ? WHERE Id = ?");
    $stmt->bind_param("ssii", $username, $password, $status, $id);
    $stmt->execute();
    return $stmt->affected_rows;
}

function deleteUser($id){
    $con = getConnection();
    $stmt = $con->prepare("DELETE FROM admin WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->affected_rows;
}

function addMedicine($category, $code, $medicineName, $manufacture, $unit, $description, $unitPrice, $sellPrice, $quantity, $sku, $expiryDate)
{
    $con = getConnection();
    $sql = "INSERT INTO medicineinventory (Category, Code, MedicineName, Manufacture, Unit, Description, UnitPrice, SellPrice, Quantity, SKU, ExpiryDate) VALUES ('$category', '$code', '$medicineName', '$manufacture', '$unit', '$description', '$unitPrice', '$sellPrice', '$quantity', '$sku', '$expiryDate')";

    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//getMedicineInventory
function getMedicineInventory()
{
    $con = getConnection();
    $sql = "SELECT * FROM medicineinventory";
    $result = $con->query($sql);
    return $result;
}

function getPatient($id)
{
    $con = getConnection();
    $stmt = $con->prepare("SELECT * FROM patient WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
 
//change password for patient
function ChangePasswordPatient($id, $password)
{
    $con = getConnection();
    $stmt = $con->prepare("UPDATE patient SET Password = ? WHERE Id = ?");
    $stmt->bind_param("si", $password, $id);
    $stmt->execute();
    return $stmt->affected_rows;
}

function getPatientProfile($id)
{
    $con = getConnection();
    $sql = "SELECT * FROM patient WHERE Id = '$id'";
    $result = $con->query($sql);
    return $result;
}

//updatePatient
function updatePatient($Id, $firstName, $lastName, $email, $password, $maritalStatus, $bloodGroup, $fatherName, $motherName)
{
    $con = getConnection();
    $stmt = $con->prepare("UPDATE patient SET FirstName = ?, LastName = ?, Email = ?, Password = ?, MaritalStatus = ?, BloodGroup = ?, FatherName = ?, MotherName = ? WHERE Id = ?");
    $stmt->bind_param("ssssssssi", $firstName, $lastName, $email, $password, $maritalStatus, $bloodGroup, $fatherName, $motherName, $Id);
    $stmt->execute();
    return $stmt->affected_rows;
}






?>