<?php 

session_start();
require_once '../../Model/Patient.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        input[type="submit"],
        button {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        td button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        td button:hover {
            background-color: #0056b3;
        }

        .success-message {
            text-align: center;
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Appointment Booking</h2>

    <!-- Form to add new appointment -->
    <form action="../../Controllers/BookAppointment.php" method="POST">
        <!-- patient name -->
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" required><br>

        <label for="contactNo">Contact Number:</label><br>
        <input type="text" id="contactNo" name="contactNo" required><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" required><br>

        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time" required><br>

        <label for="reason">Reason for Appointment:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Book Appointment">
        <?php echo isset($_SESSION['successMessage']) ? '<div class="success-message">' . $_SESSION['successMessage'] . '</div>' : ""; ?>
    </form>

    <!-- Table to display all appointments -->
    <h3>All Appointments</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Contact Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all appointments
            $appointments = ShowAllAppointments();
            if ($appointments !== false) :
                while ($row = $appointments->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
                <td><?php echo $row['ContactNo']; ?></td>
                <td><?php echo $row['Date']; ?></td>
                <td><?php echo date('h:i A', strtotime($row['Time'])); ?></td>
                <td><?php echo $row['Reason']; ?></td>
                <td><?php echo ($row['Status'] == 0 ? "Pending" : "Completed"); ?></td>
                <td>
                    <button>Update</button>
                    <button>Cancel</button>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="8">No appointments found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
