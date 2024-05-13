<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Registration.css">
    <script src="../Js/Registration.js"></script>
</head>
<body>
<div class="container">
        <h1>Registration</h1>
        <form action="../../Controllers/LabRegistration.php" method="post" onsubmit="return ValidateRegistraion()">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <input type="submit" value="Register" class="form-submit">
            <span id="error"></span>
        </form>
        <!-- back to home button -->
        <div class="link-container">
            <span class="link-text">Already have an account?</span>
            <a href="Login.php" class="link">Login</a>
</div>
    </div>
</body>
</html>