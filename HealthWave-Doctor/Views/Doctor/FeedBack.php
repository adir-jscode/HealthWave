<?php 
session_start();
require_once '../../Model/Doctor.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin-bottom: 20px;
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

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .no-feedback {
            font-style: italic;
        }
    </style>
</head>
<body>
    <h2>Feedbacks</h2>

    <!-- Table to display all feedback entries -->
    <h3>All Feedback Entries</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Feedback</th>
                <th>Patient Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all feedback entries
            $feedbackEntries = ShowAllFeedback();
            if ($feedbackEntries !== false) :
                while ($row = $feedbackEntries->fetch_assoc()) :
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['FeedBack']; ?></td>
                <td><?php echo $row['PatientName']; ?></td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="3" class="no-feedback">No feedback entries found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

