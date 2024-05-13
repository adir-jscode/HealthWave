<?php 
session_start();
require_once '../../Model/Doctor.php'; // Assuming you have a LabTest.php model

// Fetch all lab tests
$labTests = ShowAllLabTests();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Tests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2, h3 {
            margin-bottom: 10px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"],
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Lab Tests</h2>

    <!-- Form to add new lab test -->
    <h3>Add New Lab Test</h3>
    <form action="../../Controllers/AddLabTest.php" method="POST" onsubmit="return validateForm()">
        <!-- Test name -->
        <label for="testName">Test Name:</label><br>
        <input type="text" id="testName" name="testName"><br>

        <!-- Patient name -->
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName"><br>

        <!-- Test description -->
        <label for="testDescription">Test Description:</label><br>
        <textarea id="testDescription" name="testDescription" rows="4" cols="50"></textarea><br>

        <!-- Test cost -->
        <label for="testCost">Test Cost:</label><br>
        <input type="text" id="testCost" name="testCost"><br>

        <input type="submit" value="Add Lab Test">
        
        <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?> <br>

    </form>

    <!-- Table to display all lab tests -->
    <h3>All Lab Tests</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Test Name</th>
                <th>Patient Name</th>
                <th>Test Description</th>
                <th>Test Cost</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($labTests !== false) :
                while ($row = $labTests->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['TestName']; ?></td>
                <td><?php echo $row['PatinetName']; ?></td>
                <td><?php echo $row['TestDescription']; ?></td>
                <td><?php echo $row['TestCost']; ?></td>
                <td>
                    <button><a href="../../Controllers/EditLabTest.php?id=<?php echo $row['Id']; ?>">Edit</a></button>
                    <button><a href="../../Controllers/DeleteLabTest.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="6">No lab tests found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../Js/LabTest.js"></script>
</body>
</html>
