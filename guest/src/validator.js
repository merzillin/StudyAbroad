function validate() {
    var username = document.getElementById('uname').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('mail').value;
    var dob = document.getElementById('dob').value;
    var password = document.getElementById('pass').value;
    var cpassword = document.getElementById('cpass').value;
    var image = document.getElementById('uimg').value;


    var lengthConstraint = /^.{10,}$/;
    var uppercaseConstraint = /[A-Z]/;
    var lowercaseConstraint = /[a-z]/;
    var digitConstraint = /\d/;
    var specialCharConstraint = /[!@#$%^&*()_+{}\[\]:;<>,.?|\-=\\\/]/;

    if (username === '') {
        document.getElementById("unameError").innerHTML= " Please enter your name"; 
        return false;
    }
    
    else if (phone === '' || isNaN(phone)) {
        document.getElementById("uphoneError").innerHTML= " Please enter your PhoneNumber";
        return false;
    }
    else if (email === '') {
        document.getElementById("uemailError").innerHTML= " Please enter your Email";
        return false;
    }
    else if (dob === '') {
        document.getElementById("udobError").innerHTML= " Please select your DoB";
        return false;
    }
    
    else if (password === '') {
        document.getElementById("upassError").innerHTML= " Please enter your Password";
        return false;
    }
    else if (cpassword === '') {
        document.getElementById("ucpassError").innerHTML= " Please enter your Confirmed Password";
        return false;
    }
    else if (password != cpassword) {
        alert("Password not match to Confirmed Password");
        return false;
    }
    else if(!lengthConstraint.test(password))
    {
        alert("insufficent letters");
        return false;
    }
    else if(!uppercaseConstraint.test(password))
    {
        alert("need 1 uppercase letter");
        return false;
    }
    else if(!lowercaseConstraint.test(password))
    {
        alert("need 1 lowercase letter");
        return false;
    }
    else if(!digitConstraint.test(password))
    {
        alert("need 1 digit");
        return false;
    }
    else if(!specialCharConstraint.test(password))
    {
        alert("need 1 special character");
        return false;
    }
    else{
        alert("validated successfully");
        return true;
    }

   
    
}