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
            
            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" >
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>
            
            <label for="contactNo">Contact Number:</label><br>
            <input type="text" id="contactNo" name="contactNo" ><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" ><br><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" ><br><br>
            
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" ><br><br>
            
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" rows="4" cols="50" ></textarea><br><br>
            
            <label for="speciality">Speciality:</label><br>
            <input type="text" id="speciality" name="speciality"><br><br>
            
            <input type="submit" value="Register">
        </fieldset>
    </form>
</body>
</html>
