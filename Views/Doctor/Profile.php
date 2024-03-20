<?php
session_start();
require_once '../../Model/Doctor.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username']; 
$profileData = ShowProfile($username);

if ($profileData !== false) {
    $profile = $profileData->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
</head>
<body>
    <h2>Doctor Profile</h2>
    <form action="../../Controllers/UpdateDoctorProfile.php" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
            <label for="fullName">Full Name:</label><br>
            <input type="text" id="fullName" name="fullName" value="<?php echo $profile['FullName']; ?>"><br><br>
            
            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender">
                <option value="male" <?php if ($profile['Gender'] === 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if ($profile['Gender'] === 'female') echo 'selected'; ?>>Female</option>
                <option value="other" <?php if ($profile['Gender'] === 'other') echo 'selected'; ?>>Other</option>
            </select><br><br>
            <label for="contactNo">Contact Number:</label><br>
            <input type="text" id="contactNo" name="contactNo" value="<?php echo $profile['ContactNo']; ?>"><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo $profile['Email']; ?>"><br><br>
            
            <label for="address">Address:</label><br>
            <textarea id="address" name="address" rows="4" cols="50"><?php echo $profile['Address']; ?></textarea><br><br>
            
            <label for="speciality">Speciality:</label><br>
            <input type="text" id="speciality" name="speciality" value="<?php echo $profile['Speciality']; ?>"><br><br>
            <input type="submit" value="Update Information">
        </fieldset>
    </form>
</body>
</html>

<?php
} 
else {
    // Doctor profile not found
    echo "Doctor profile not found!";
}
?>
