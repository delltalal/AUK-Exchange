function validateLoginForm() {
    var user = document.loginForm.user.value;
    var pass = document.loginForm.password.value;

    if (user == null || user == "" ) {
        alert("You must enter in a username.");
        return false;
    } 
    else if (pass == null || pass == "") {
        alert("You must enter in a password.")
        return false;
    }
}

function validateSignupForm() {
    var fname = document.signupForm.Fname.value; 
    var lname = document.signupForm.Lname.value;
    var username = document.signupForm.user.value;
    var num = document.signupForm.number.value;
    var pass1 = document.signupForm.password.value;
    var pass2 = document.signupForm.confirm_password.value;

    if (fname == "" || fname == null) {
        alert("First name must be filled in.");
        return false;
    }
    else if (lname == "" || lname == null) {
        alert("Last name must be filled in.");
        return false;
    }
    else if (username == "" || username == null) {
        alert("Last name must be filled in.");
        return false;
    }
    else if (username.length <= 5) {
        alert("Username must be longer than 5 characters.");
        return false;
    }
    else if (num == null || num == "") {
        alert("Phone number must be filled in.");
        return false;
    }
    else if (num.length != 8) {
        alert("Phone number must be 8 digits.");
        return false;
    }
    else if (pass1.length <= 6) {
        alert("Password must be atleast 6 characters long.");
        return false;
    }
    else if (pass1 != pass2) {
        alert("Password must match.");
        return false;
    }
    
}

