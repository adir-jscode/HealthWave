<?php
session_start();
require_once '../Model/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['isAdmin'])) {
    $isValid= true;
    $category = $_POST['category'];
    $code = $_POST['code'];
    $medicineName = $_POST['medicine_name'];
    $manufacture = $_POST['manufacture'];
    $unit = $_POST['unit'];
    $description = $_POST['description'];
    $unitPrice = $_POST['unit_price'];
    $sellPrice = $_POST['sell_price'];
    $quantity = $_POST['quantity'];
    $sku = $_POST['sku'];
    $expiryDate = $_POST['expiry_date'];

    if(empty($category))
    {
        $_SESSION['errorCategory'] = 'Category is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['category'] = $category;
        $_SESSION['errorCategory'] = '';
    }
    if(empty($code))
    {
        $_SESSION['errorCode'] = 'Code is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['code'] = $code;
        $_SESSION['errorCode'] = '';
    }
    if(empty($medicineName))
    {
        $_SESSION['errorMedicineName'] = 'Medicine Name is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['medicineName'] = $medicineName;
        $_SESSION['errorMedicineName'] = '';
    }
    if(empty($manufacture))
    {
        $_SESSION['errorManufacture'] = 'Manufacture is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['manufacture'] = $manufacture;
        $_SESSION['errorManufacture'] = '';
    }
    if(empty($unit))
    {
        $_SESSION['errorUnit'] = 'Unit is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['unit'] = $unit;
        $_SESSION['errorUnit'] = '';
    }
    if(empty($description))
    {
        $_SESSION['errorDescription'] = 'Description is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['description'] = $description;
        $_SESSION['errorDescription'] = '';
    }
    if(empty($unitPrice))
    {
        $_SESSION['errorUnitPrice'] = 'Unit Price is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['unitPrice'] = $unitPrice;
        $_SESSION['errorUnitPrice'] = '';
    }
    if(empty($sellPrice))
    {
        $_SESSION['errorSellPrice'] = 'Sell Price is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['sellPrice'] = $sellPrice;
        $_SESSION['errorSellPrice'] = '';
    }
    if(empty($quantity))
    {
        $_SESSION['errorQuantity'] = 'Quantity is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['quantity'] = $quantity;
        $_SESSION['errorQuantity'] = '';
    }
    if(empty($sku))
    {
        $_SESSION['errorSku'] = 'SKU is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['sku'] = $sku;
        $_SESSION['errorSku'] = '';
    }
    if(empty($expiryDate))
    {
        $_SESSION['errorExpiryDate'] = 'Expiry Date is required';
        $isValid = false;
    }
    else
    {
        $_SESSION['expiryDate'] = $expiryDate;
        $_SESSION['errorExpiryDate'] = '';
    }

    if(!$isValid)
    {
        header('Location: ../Views/Admin/MedicineInventory.php');
        exit();
    }




    $result = addMedicine($category, $code, $medicineName, $manufacture, $unit, $description, $unitPrice, $sellPrice, $quantity, $sku, $expiryDate);

    if ($result) {
        $_SESSION['successMessage'] = 'Medicine added successfully';
        header('Location: ../Views/Admin/Dashboard.php');
    } else {
        $_SESSION['errorMessage'] = 'Failed to add medicine';
    }
}

else 
{
    
    $_SESSION['errorMessage'] = 'Unauthorized access';
    header('Location: ../Views/Admin/MedicineInventory.php');
}
?>
