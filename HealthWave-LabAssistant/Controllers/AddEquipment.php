<?php
session_start();
require_once '../Model/User.php'; 

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Validate form data
    $isValid = true;
    $errorMessage = "";

    if (empty($_POST['equipmentName'])) {
        $errorMessage .= "Equipment name is required. ";
        $isValid = false;
    }

    if (empty($_POST['category'])) {
        $errorMessage .= "Category is required. ";
        $isValid = false;
    }

    if (empty($_POST['quantity']) || $_POST['quantity'] <= 0) {
        $errorMessage .= "Quantity must be a positive number. ";
        $isValid = false;
    }

    if (!$isValid) {
        $_SESSION['errorMessage'] = $errorMessage;
        header('Location: ../Views/LabAssistant/LabAssistantHome.php');
        exit();
    }

    
    $equipmentName = $_POST['equipmentName'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    
    $isEquipmentAdded = addEquipment($equipmentName, $category, $quantity);

    // Check if equipment addition was successful
    if ($isEquipmentAdded) {
        $_SESSION['successMessage'] = "Equipment added successfully!";
    } else {
        $_SESSION['errorMessage'] = "Failed to add equipment!";
    }
    
    // Redirect back to the add equipment page
    header('Location: ../Views/LabAssistant/LabAssistantHome.php');
    exit();
} else {
    $_SESSION['errorMessage'] = "Invalid Request!";
    header('Location: ../Views/LabAssistant/LabAssistantHome.php');
    exit();
}
?>
