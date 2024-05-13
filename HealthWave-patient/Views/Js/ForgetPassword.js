function ValidateForgetPassword()
{
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
    var error = document.getElementById('error');

    let flag = true;

    if (username == "" || password == "" || cpassword == "") 
    {
        flag = false;
        error.innerHTML = "Please fill all fields";
        error.style.color = "red";
        return false;

    }
    else 
    {
        error.innerHTML = "";
    }

    if (username == "") 
    {
        flag = false;
        error.innerHTML = "Please enter username";
        error.style.color = "red";
        return false;
    }
    else 
    {
        error.innerHTML = "";
    }

    if (password == "") 
    {
        flag = false;
        error.innerHTML = "Please enter password";
        error.style.color = "red";
        return false;
    }
    else 
    {
        error.innerHTML = "";
    }

    if (cpassword == "") 
    {
        flag = false;
        error.innerHTML = "Please enter confirm password";
        error.style.color = "red";
        return false;
    }
    else 
    {
        error.innerHTML = "";
    }

    if (password != cpassword) 
    {
        flag = false;
        error.innerHTML = "Password and confirm password does not match";
        error.style.color = "red";
        return false;
    }
    else 
    {
        error.innerHTML = "";
    }

    return flag;
    
}