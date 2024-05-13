<?php 
session_start();
require_once '../../Model/User.php';
    if(isset($_SESSION['isPatient']) && $_SESSION['isPatient'] == true)
    {
        if(isset($_SESSION['Id'])){
            $id = $_SESSION['Id'];
            $profile = getPatient($id);
            
        }
    }
    else{
        header('Location: ../Home/Login.php');
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            width: auto;
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <h1>Welcome to Profile, <?php echo $_SESSION['Id'] ?> </h1>
        <!-- All patient information -->
        <form action="../../Controllers/UpdatePatientController.php" method="post">
            <input type="hidden" name="Id" value="<?php echo $profile['Id'] ?>">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" value="<?php echo $profile['FirstName'] ?>">
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" value="<?php echo $profile['LastName'] ?>">
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $profile['Email'] ?>">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $profile['Password'] ?>">
            <label for="maritalStatus">Marital Status</label>
            <select name="maritalStatus">
                <option value="Single" <?php if($profile['MaritalStatus'] == 'Single') echo "selected" ?>>Single</option>
                <option value="Married" <?php if($profile['MaritalStatus'] == 'Married') echo "selected" ?>>Married</option>
                <option value="Divorced" <?php if($profile['MaritalStatus'] == 'Divorced') echo "selected" ?>>Divorced</option>
                <option value="Widowed" <?php if($profile['MaritalStatus'] == 'Widowed') echo "selected" ?>>Widowed</option>
            </select>
            <label for="bloodGroup">Blood Group</label>
            <input type="text" name="bloodGroup" value="<?php echo $profile['BloodGroup'] ?>">
            <label for="fatherName">Father's Name</label>
            <input type="text" name="fatherName" value="<?php echo $profile['FatherName'] ?>">
            <label for="motherName">Mother's Name</label>
            <input type="text" name="motherName" value="<?php echo $profile['MotherName'] ?>">
            <label for="contactNo">Contact Number</label>
            <input type="text" name="contactNo" value="<?php echo $profile['ContactNo'] ?>">
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $profile['Username'] ?>">
            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>
