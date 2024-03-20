<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Schedule</title>
</head>
<body>
    <h2>Appointment Schedule</h2>

    <!-- Table to display appointments -->
    <table border="1">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Patient Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sample appointment rows -->
            <tr>
                <td>2024-03-25</td>
                <td>09:00 AM</td>
                <td>John Doe</td>
                <td>Pending</td>
                <td>
                    <!-- Buttons for changing status and deleting -->
                    <button>Mark as Completed</button>
                    <button>Reschedule</button>
                    <button>Delete</button>
                </td>
            </tr>
            <!-- Add more appointment rows here -->
        </tbody>
    </table>
</body>
</html>
