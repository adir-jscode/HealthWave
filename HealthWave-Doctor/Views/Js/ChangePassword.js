function validateForm() {
        var currentPassword = document.getElementById("currentPassword").value.trim();
        var newPassword = document.getElementById("newPassword").value.trim();
        var confirmPassword = document.getElementById("confirmPassword").value.trim();
        var errorMessage = document.getElementById("errorMessage");

        errorMessage.innerHTML = ""; 

        if (currentPassword === "") {
            errorMessage.innerHTML = "Please enter your current password.";
            return false; 
        }

        if (newPassword === "") {
            errorMessage.innerHTML = "Please enter a new password.";
            return false; 
        }

        if (confirmPassword === "") {
            errorMessage.innerHTML = "Please confirm your new password.";
            return false; 
        }

        if (newPassword !== confirmPassword) {
            errorMessage.innerHTML = "New password and confirm password must match.";
            return false; 
        }

        
        return true;
    }

    document.getElementById("changePasswordForm").onsubmit = validateForm;

