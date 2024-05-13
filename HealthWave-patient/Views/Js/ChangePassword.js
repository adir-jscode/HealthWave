function ValidChangePassword() {
    var currentPassword = document.getElementById("currentPassword").value;
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var error = document.getElementById("error");
    var flag = true;

    if (currentPassword == "" || newPassword == "" || confirmPassword == "") {
        flag = false;
        error.innerHTML = "Please fill all fields";
        error.style.color = "red";
        return false;
    } else {
        error.innerHTML = "";
    }

    if (newPassword !== confirmPassword) {
        flag = false;
        error.innerHTML = "New Password and Confirm Password do not match";
        error.style.color = "red";
        return false;
    } else {
        error.innerHTML = "";
    }

    return flag;
}
