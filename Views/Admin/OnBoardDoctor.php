<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
</head>
<body>
    <form action="../../Controllers/OnBoardDoctor.php" method="POST">
        <fieldset>
            <legend>Doctor Registration</legend>
            <label for="fullName">Full Name:</label><br>
            <input type="text" id="fullName" name="fullName" ><br><br>
            <?php echo isset($_SESSION['fullNameErrorMsg']) ? $_SESSION['fullNameErrorMsg'] : ""; ?> <br>
            
            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>
            <?php echo isset($_SESSION['genderErrorMsg']) ? $_SESSION['genderErrorMsg'] : ""; ?> <br>
            
            <label for="contactNo">Contact Number:</label><br>
            <input type="text" id="contactNo" name="contactNo" ><br><br>
            <?php echo isset($_SESSION['contactNoErrorMsg']) ? $_SESSION['contactNoErrorMsg'] : ""; ?> <br>

            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" ><br><br>
            <?php echo isset($_SESSION['usernameErrorMsg']) ? $_SESSION['usernameErrorMsg'] : ""; ?> <br>
            <?php echo isset($_SESSION['usernameExistsMsg']) ? $_SESSION['usernameExistsMsg'] : ""; ?> <br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" ><br><br>
            <?php echo isset($_SESSION['emailErrorMsg']) ? $_SESSION['emailErrorMsg'] : ""; ?> <br>
            <?php echo isset($_SESSION['emailExistsMsg']) ? $_SESSION['emailExistsMsg'] : ""; ?> <br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" ><br><br>
            <?php echo isset($_SESSION['passwordErrorMsg']) ? $_SESSION['passwordErrorMsg'] : ""; ?> <br>
            
            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" ><br><br>
            <?php echo isset($_SESSION['confirmPasswordErrorMsg']) ? $_SESSION['confirmPasswordErrorMsg'] : ""; ?> <br>
            
            
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" rows="4" cols="50" ></textarea><br><br>
            <?php echo isset($_SESSION['addressErrorMsg']) ? $_SESSION['addressErrorMsg'] : ""; ?> <br>

            <label for="speciality">Speciality:</label><br>
            <input type="text" id="speciality" name="speciality"><br><br>
            <?php echo isset($_SESSION['specialityErrorMsg']) ? $_SESSION['specialityErrorMsg'] : ""; ?> <br>
            
            <input type="submit" value="Register">
            <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?> <br>
        </fieldset>
    </form>
</body>
</html>
