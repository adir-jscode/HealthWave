<?php 

session_start();
require_once '../../Model/Doctor.php';
if(isset($_SESSION['isDoctor']) && $_SESSION['isDoctor'] == true){
    
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
    <title>Appointment Booking</title>
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
    <h2>Appointment Booking</h2>

    <!-- Form to add new appointment -->
    <h3>Add New Appointment</h3>
    <form action="../../Controllers/BookAppointment.php" method="POST" onclick=" return validateForm()">
        <!-- patient name -->
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" ><br><br>

        <label for="contactNo">Contact Number:</label><br>
        <input type="text" id="contactNo" name="contactNo" ><br><br>

        <label for="date">Date:</label><br>
        <input type="date" id="date" name="date" ><br><br>

        <label for="time">Time:</label><br>
        <input type="time" id="time" name="time"><br><br>

        <label for="reason">Reason for Appointment:</label><br>
        <textarea id="reason" name="reason" rows="4" cols="50" ></textarea><br><br>

        <input type="submit" value="Book Appointment">
        
        <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?> <br>
        <span id="error"></span>

    </form>

    <!-- Table to display all appointments -->
    <h3>All Appointments</h3>
    <table border="1">
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
                <?php if ($row['Status'] == 0): ?>

                    <button>
                    <a href="../../Controllers/ChangeAppointmentStatus.php?id=<?php echo $row['Id']; ?>">Mark As Complete</a>
                    <?php endif; ?>

                    </button>
        
                    <button><a href="../../Controllers/DeleteAppointment.php?id=<?php echo $row['Id']; ?>">Delete</a></button>
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
    <script src="../Js/BookAppointment.js"></script>
</body>
</html>