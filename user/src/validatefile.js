function validate() {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var phone = document.getElementById('phone').value;
    var email = document.getElementById('email').value;
    var dob = document.getElementById('dob').value;
    var gender = document.getElementById('sex').value;
    var passport = document.getElementById('passport_number').value;
    var university = document.getElementById('university').value;
    var college = document.getElementById('college').value;
    var course = document.getElementById('course').value;
    var percentage = document.getElementById('percentage').value;
    var certificate = document.getElementById('certificate').value;

    var alphaletter = /^[A-Za-z]+$/;
    var lengthConstraint = /^.{10,}$/;
    var uppercaseConstraint = /[A-Z]/;
    var lowercaseConstraint = /[a-z]/;
    var digitConstraint = /\d/;
    var specialCharConstraint = /[!@#$%^&*()_+{}\[\]:;<>,.?|\-=\\\/]/;

    if (fname === '' && alphaletter.test(fname)) {
        document.getElementById("ufnameError").innerHTML= " Error in First Name"; 
        return false;
    }
    if (lname === '' && alphaletter.test(lname)) {
        document.getElementById("ulnameError").innerHTML= " Error in Last name"; 
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
    else if (gender === '') {
        document.getElementById("ugenderError").innerHTML= " Please select your Gender";
        return false;
    }
    else if (passport === '') {
        document.getElementById("upassError").innerHTML= " Please select your Passport";
        return false;
    }
    else if (university === '' && alphaletter.test(university)) {
        document.getElementById("universityError").innerHTML= " Error in University Name";
        return false;
    }
    else if (college === '' && alphaletter.test(college)) {
        document.getElementById("collegeError").innerHTML= " Error in College Name";
        return false;
    }
    
    else if (course === '' && alphaletter.test(course)) {
        document.getElementById("courseError").innerHTML= " Error in College Name";
        return false;
    }
    else if (percentage=== '' && (!Number.isInteger(percentage))) {
        document.getElementById("percentageError").innerHTML= " Error in Percentage";
        return false;
    }
    else if (certificate=== '') {
        document.getElementById("certificateError").innerHTML= " Please select your Certificate";
        return false;
    }
    else{
        alert("validated successfully");
        return true;
    }

   
    
}