<?php 

require_once 'Db.php';

//admin login
function ValidateLogin($Username, $Password)
{
    $con = getConnection();
    $stmt = $con->prepare("SELECT * FROM labassistant WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $_SESSION['Id'] = $row['Id'];
        return "labAssistant";
    } 
    else 
    {
        return false;
    }
}

function RegisterLabAssistant($username, $password, $email)
{
    $con = getConnection();

    if (!$con) {
        return false;
    }

    $stmt = $con->prepare("INSERT INTO labassistant (Username, Password, Email) VALUES (?, ?, ?)");

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("sss", $username, $password, $email);

    $result = $stmt->execute();

    if (!$result) {
        return false;
    }

    return true;
}



//Forget Password - admin 
function ForgetPassword($Username, $Password)
{
    $con = getConnection();
    $stmt = $con->prepare("UPDATE labassistant SET Password = ? WHERE Username = ?");
    $stmt->bind_param("ss", $Password, $Username);
    $stmt->execute();
    return $stmt->affected_rows;
}

//change password - admin
function ChangePassword($Id, $Password)
{
    $con = getConnection();
    $stmt = $con->prepare("UPDATE labassistant SET Password = ? WHERE Id = ?");
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
    $stmt = $con->prepare("SELECT * FROM labassistant WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    return $user;
}
//update admin profile
function updateUser($id, $username, $password, $status){
    $con = getConnection();
    $stmt = $con->prepare("UPDATE labassistant SET Username = ?, Password = ?, Status = ? WHERE Id = ?");
    $stmt->bind_param("ssii", $username, $password, $status, $id);
    $stmt->execute();
    return $stmt->affected_rows;
}

//delete admin
function deleteUser($id){
    $con = getConnection();
    $stmt = $con->prepare("DELETE FROM labassistant WHERE Id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->affected_rows;
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

//getAllDoctors()
function getAllDoctors()
{
    $con = getConnection();
    $sql = "SELECT * FROM doctor";
    $result = $con->query($sql);
    return $result;
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

//addEquipment
function addEquipment($equipmentName, $category, $quantity)
{
    $con = getConnection();
    $sql = "INSERT INTO equipmentinventory (EquipmentName, Category, Quantity) VALUES ('$equipmentName', '$category', '$quantity')";

    if ($con->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

//getEquipmentInventory
function getEquipmentInventory()
{
    $con = getConnection();
    $sql = "SELECT * FROM equipmentinventory";
    $result = $con->query($sql);
    return $result;
}
?>