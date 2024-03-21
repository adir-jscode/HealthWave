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
    <title>Medicine Inventory</title>
</head>
<body>
    <h1>Medicine Inventory</h1>
    
    <!-- Add New Medicine Form -->
    <h2>Add New Medicine</h2>
    <form action="../../Controllers/AddMedicine.php" method="POST">
        <label for="category">Category:</label>
        <select id="category" name="category" >
        <option disabled="" selected="">--- SELECT ---</option>
            <option value="Fever">Fever</option>
            <option value="Servere Pain">Servere Pain</option>
            <option value="Infection">Infection</option>
            <option value="Anxiety">Anxiety</option>
            <option value="Depression">Depression</option>
            <option value="Cold">Cold</option>
            <option value="Nerve Pain">Nerve Pain</option>
            <option value="High BP">High BP</option>
            <option value="GERD">GERD</option>
            
        </select><br><br>
        
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" ><br><br>
        
        <label for="medicine_name">Medicine Name:</label>
        <input type="text" id="medicine_name" name="medicine_name"><br><br>
        
        <label for="manufacture">Manufacture:</label>
        <select id="manufacture" name="manufacture">
        <option disabled="" selected="">--- SELECT ---</option>
            <option value="Johnson & Johnson">Johnson & Johnson</option>
            <option value="Pfizer">Pfizer</option>
            <option value="Sanofi">Sanofi</option>
            <option value="Novartis">Novartis</option>
            <option value="GlaxoSmithKline">GlaxoSmithKline</option>
            
        </select><br><br>
        
        <label for="unit">Unit:</label>
        <select id="unit" name="unit">
        <option disabled="" selected="">--- SELECT ---</option>
            <option value="ml">ml</option>
            <option value="mg">mg</option>
            <option value="pc">pc</option>
            
        </select><br><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
        
        <label for="unit_price">Unit Price:</label>
        <input type="number" id="unit_price" name="unit_price" ><br><br>
        
        <label for="sell_price">Sell Price:</label>
        <input type="number" id="sell_price" name="sell_price" ><br><br>
        
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" ><br><br>
        
        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="sku" ><br><br>
        
        <label for="expiry_date">Expiry Date:</label>
        <input type="date" id="expiry_date" name="expiry_date"><br><br>
        
        <input type="submit" value="Add Medicine">
    </form>
    
    <h2>All Medicine List</h2>
    <!-- Display Medicine Inventory Table with options to update and delete -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Medicine Name</th>
                <th>Manufacture</th>
                <th>Unit</th>
                <th>Description</th>
                <th>Unit Price</th>
                <th>Sell Price</th>
                <th>Quantity</th>
                <th>SKU</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            // Fetch all appointments
            $appointments = getMedicineInventory();
            if ($appointments !== false) :
                while ($row = $appointments->fetch_assoc()) :
            
            ?>
            <tr>
                <td><?php echo $row['Id']; ?></td>
                <td><?php echo $row['Category']; ?></td>
                <td><?php echo $row['MedicineName']; ?></td>
                <td><?php echo $row['Manufacture']; ?></td>
                <td><?php echo $row['Unit']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['UnitPrice']; ?></td>
                <td><?php echo $row['SellPrice']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Sku']; ?></td>
                <td><?php echo $row['ExpiryDate']; ?></td>
                <td>
                    <a href='update_medicine.php?id=<?php echo $row['Id']; ?>'>Update</a> | 
                    <a href='delete_medicine.php?id=<?php echo $row['Id']; ?>'>Delete</a>
                </td>
            </tr>
            <?php
                endwhile;
            else :
            ?>
            <tr>
                <td colspan="8">Not found.</td>
            </tr>
            <?php endif; ?>
            
        </tbody>
    </table>
    
</body>
</html>
