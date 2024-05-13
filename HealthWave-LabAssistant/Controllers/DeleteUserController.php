<?php 

session_start();
require_once '../Model/db.php';
require_once '../Model/Users.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $result = deleteUser($id);
    if($result > 0){
        header("Location: ../Views/User.php");
    }else{
        echo "Error";
    }
}

?>