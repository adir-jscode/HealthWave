<?php
session_start();
require_once '../../Model/Doctor.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription Management</title>
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
        input[type="date"],
        input[type="time"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
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

        .status-pending {
            color: orange;
        }

        .status-completed {
            color: green;
        }

        .status-inactive {
            color: red;
        }
    </style>
</head>
<body>
    <h2>Prescription Management</h2>

    <!-- Form to add new prescription -->
    <h3>Add New Prescription</h3>
    <form action="../../Controllers/BookPrescription.php" method="POST" onsubmit="return validateForm()">
        <!-- patient name -->
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName"><br>

        

        <label for="dateIssued">Date Issued:</label><br>
        <input type="date" id="dateIssued" name="dateIssued"><br>

        <label for="prescriptionText">Prescription Text:</label><br>
        <textarea id="prescriptionText" name="prescriptionText" rows="4" cols="50"></textarea><br>

        <input type="submit" value="Add Prescription">
        
        <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?> <br>
    </form>

    <!-- Table to display all prescriptions -->
    <h3>All Prescriptions</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Date Issued</th>
                <th>Prescription Text</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all prescriptions
            $prescriptions = ShowAllPrescriptions();
            if ($prescriptions !== false) :
                while ($row = $prescriptions->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
              
                <td><?php echo $row['DateIssued']; ?></td>
                <td><?php echo $row['PrescriptionText']; ?></td>
                <td class="status-<?php echo strtolower($row['PrescriptionStatus']); ?>"><?php echo ucfirst($row['PrescriptionStatus']); ?></td>
                <td>
                    
                    <button><a href="../../Controllers/DeletePrescription.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="7">No prescriptions found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script src="../Js/Prescription.js"></script>
</body>
</html>
