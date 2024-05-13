<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Equipment Inventory</title>
    <link rel="stylesheet" href="styles.css">
    <script src="../Js/AddEquipment.js"></script>
</head>
<body>
    <h1>Add Equipment Inventory</h1>
    <form id="addEquipmentForm" action="../../Controllers/AddEquipment.php" method="POST" onsubmit="return validateForm()">
        <label for="equipmentName">Equipment Name:</label><br>
        <input type="text" id="equipmentName" name="equipmentName" required><br>

        <label for="category">Category:</label><br>
        <input type="text" id="category" name="category" required><br>

        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" min="1" required><br>

        <input type="submit" value="Add Equipment">
    </form>

    <script src="validation.js"></script>
</body>
</html>
