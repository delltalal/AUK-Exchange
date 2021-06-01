/*
Login validation
Signup validation
Hamad Al-Hendi S00040674
*/


//validates the login form
function validateLoginForm() {
    //obtains the values entered within the form for user and password
    var user = document.loginForm.user.value;
    var pass = document.loginForm.password.value;

    //if the user is empty and not filled then send an alert
    if (user == null || user == "" ) {
        alert("You must enter in a username.");
        return false;
    } 
    //if the passowrd is empty and not filled then send an alert
    else if (pass == null || pass == "") {
        alert("You must enter in a password.")
        return false;
    }
    //if none of the if statements are triggered then the function will not return false and the proceed to the server-side
}

//validates the signup form
function validateSignupForm() {
    //obtains most of the values within the form and assign them to variables 
    var fname = document.signupForm.Fname.value; 
    var lname = document.signupForm.Lname.value;
    var username = document.signupForm.user.value;
    var num = document.signupForm.number.value;
    var pass1 = document.signupForm.password.value;
    var pass2 = document.signupForm.confirm_password.value;

    //if first name is empty then send an alert
    if (fname == "" || fname == null) {
        alert("First name must be filled in.");
        return false;
    }
    //if last name is empty then send an alert
    else if (lname == "" || lname == null) {
        alert("Last name must be filled in.");
        return false;
    }
    //if username is empty then send an alert
    else if (username == "" || username == null) {
        alert("Last name must be filled in.");
        return false;
    }
    //if the length of the username is less than 5 characters then send an alert
    else if (username.length <= 5) {
        alert("Username must be longer than 5 characters.");
        return false;
    }
    //if the phone number is empty then send an alert
    else if (num == null || num == "") {
        alert("Phone number must be filled in.");
        return false;
    }
    //if the phone number is not 8 digits then send an alert
    else if (num.length != 8) {
        alert("Phone number must be 8 digits.");
        return false;
    }
    //if the password length is less than 6 then send an alert
    else if (pass1.length <= 6) {
        alert("Password must be atleast 6 characters long.");
        return false;
    }
    //if the password and confirm password does not match then send an alert
    else if (pass1 != pass2) {
        alert("Password must match.");
        return false;
    }
    //if none of the if statements are triggered then the function will not return false and the proceed to the server-side
    
}

