<?php 
session_start();
require_once '../../Model/User.php';
if(!isset($_SESSION['isAdmin'])){
    header('Location: ../../Views/Home/Login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
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

        fieldset {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        th, td {
            padding: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="../../Controllers/OnBoardDoctor.php" method="POST">
            <fieldset>
                <legend>Doctor Registration</legend>
                <label for="fullName">Full Name:</label><br>
                <input type="text" id="fullName" name="fullName"><br>

                <label for="gender">Gender:</label><br>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br>

                <label for="contactNo">Contact Number:</label><br>
                <input type="text" id="contactNo" name="contactNo"><br>

                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>

                <label for="confirmPassword">Confirm Password:</label><br>
                <input type="password" id="confirmPassword" name="confirmPassword"><br>

                <label for="address">Address:</label><br>
                <textarea id="address" name="address" rows="4" cols="50"></textarea><br>

                <label for="speciality">Speciality:</label><br>
                <input type="text" id="speciality" name="speciality"><br>

                <input type="submit" value="Register">
            </fieldset>
        </form>

        <table>
            <tr>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Username</th>
                <th>Address</th>
                <th>Speciality</th>
                <!-- <th>Status</th> -->
                <th>Action</th>
            </tr>
            <?php
        // Fetch all doctors
        $doctors = getAllDoctors();

        foreach ($doctors as $doctor) {
            echo "<tr>";
            echo "<td>" . $doctor['FullName'] . "</td>";
            echo "<td>" . $doctor["Gender"] . "</td>";
            echo "<td>" . $doctor["ContactNo"] . "</td>";
            echo "<td>" . $doctor["Email"] . "</td>";
            echo "<td>" . $doctor["Username"] . "</td>";
            echo "<td>" . $doctor["Address"] . "</td>";
            echo "<td>" . $doctor["Speciality"] . "</td>";
            //echo "<td>" . $doctor["Status"] . "</td>";
            echo "<td><a href='EditDoctor.php?id=" . $doctor["Id"] . "'>Edit</a> | <a href='../../Controllers/DeleteDoctor.php?id=" . $doctor["Id"] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </table>
    </div>
</body>
</html>
