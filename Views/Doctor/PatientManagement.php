<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
</head>
<body>
    <h1>Patient Registration</h1>
    <form action="../../Controllers/AddPatient.php" method="POST" novalidate>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="confirmpassword" name="confirmpassword"><br><br>

        <label for="maritalStatus">Marital Status:</label>
        <select id="maritalStatus" name="maritalStatus">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>

        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" id="dateOfBirth" name="dateOfBirth" required><br><br>

        <label for="spouseName">Spouse Name:</label>
        <input type="text" id="spouseName" name="spouseName"><br><br>

        <label for="bloodGroup">Blood Group:</label>
        <input type="text" id="bloodGroup" name="bloodGroup"><br><br>

        <label for="fatherName">Father's Name:</label>
        <input type="text" id="fatherName" name="fatherName"><br><br>

        <label for="motherName">Mother's Name:</label>
        <input type="text" id="motherName" name="motherName"><br><br>

        <label for="contactNo">Contact Number:</label>
        <input type="text" id="contactNo" name="contactNo" required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
