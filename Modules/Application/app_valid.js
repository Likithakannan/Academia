var nameError = document.getElementById('name-error');
var nationalityError = document.getElementById('nationality-error');
var communityError = document.getElementById('community-error');
var casteError = document.getElementById('caste-error');
var cityError = document.getElementById('city-error');
var stateError = document.getElementById('state-error');
var countryError = document.getElementById('country-error');
var fnameError = document.getElementById('fname-error');
var mnameError = document.getElementById('mname-error');
var gnameError = document.getElementById('gname-error');
var foccError = document.getElementById('focc-error');
var moccError = document.getElementById('mocc-error');
var goccError = document.getElementById('gocc-error');

function validateName(input, errorMessage) {
    var text = input.value;

    if (text.length === 0) {
        errorMessage.innerHTML = "Input is required";
        return false;
    }
    if (!text.match(/^[a-zA-Z ]+$/)) {
        errorMessage.innerHTML = "Enter only the text";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;

}

function validateText(input, errorMessage) {
    var text = input.value;

    if (text.length === 0) {
        errorMessage.innerHTML = "";
        return true;
    }
    else if (!text.match(/^[a-zA-Z ]+$/)) {
        errorMessage.innerHTML = "Enter only the text";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;

}


var categoryError = document.getElementById('category-error');

function validateCat(input,errorMessage){
    var inputVal = input.value;

    if(inputVal.length === 0){
        errorMessage.innerHTML = "";
        return false;
    }
    if(!inputVal.match(/^[a-zA-Z0-9]+$/)){
        errorMessage.innerHTML = "Enter only text and number";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var panError = document.getElementById('pan-error');

function validatePan(input,errorMessage){
    var pan = input.value;

    if(pan.length == 0){
        errorMessage.innerHTML = "";
        return false;
    }
    else if(!pan.match(/^[A-Z]{5}[0-9]{4}[A-Z]$/)){
        errorMessage.innerHTML = "Invalid Pan Number";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var aadharError = document.getElementById('aadhar-error');

function validateAadhar(input,errorMessage){
    var aadhar = input.value;

    if (aadhar.length == 0) {
        errorMessage.innerHTML = "";
        return true;
    }
    else if(!aadhar.match(/^[0-9]{12}$/)){
        errorMessage.innerHTML = "Invalid Aadhar Number";
        return false;
    }
    
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var passportError = document.getElementById('passport-error');

function validatePassport(input,errorMessage){
    var passport = input.value;

    if(passport.length == 0){
        errorMessage.innerHTML = " ";
        return false;
    }
    else if(!passport.match(/^[A-Z]{2}[0-9]{7}$/)){
        errorMessage.innerHTML = "Invalid passport Number";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var phoneError = document.getElementById('phone-error');
var fphoneError = document.getElementById('fphone-error');
var mphoneError = document.getElementById('mphone-error');
var gphoneError = document.getElementById('gphone-error');

function validatePhone(input, errorMessage) {
    var phone = input.value;

    if (phone.length == 0) {
        errorMessage.innerHTML = "Input is required";
        return false;
    }
    if (!phone.match(/^[6-9]{1}[0-9]{9}$/)) {
        errorMessage.innerHTML = "Invalid Phone Number";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

function validatePhoneFam(input,errorMessage){
    var phone = input.value;

    if(phone.length == 0){
        errorMessage.innerHTML = "";
        return true;
    }
    else if(!phone.match(/^[6-9]{1}[0-9]{9}$/)){
        errorMessage.innerHTML = "Invalid Phone Number";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var addressError = document.getElementById('address-error');

function validateAddress(input,errorMessage){
    var address = input.value;

    if(address.length == 0){
        errorMessage.innerHTML = "Input is required";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var pinError = document.getElementById('pin-error');

function validatePin(input,errorMessage){
    var pin = input.value;

    if(pin.length == 0){
        errorMessage.innerHTML = "Input is required";
        return false;
    }
    if(!pin.match(/^[0-9]{6}$/)){
        errorMessage.innerHTML = "Invalid Pincode";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var emailError =  document.getElementById('email-error');
var femailError = document.getElementById('femail-error');
var memailError = document.getElementById('memail-error');
var gemailError = document.getElementById('gemail-error');

function validateEmail(input,errorMessage){
    var email = input.value;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var domain = email.split("@")[1];

    if(email.length == 0){
        errorMessage.innerHTML = "Input is required";
        return false;
    }
    if(!email.match(emailRegex)){
        errorMessage.innerHTML = "Invalid Email Address";
        return false;
    }
    if(!(domain === "bmscw.edu.in" || domain === "gmail.com" || domain === "yahoo.com" || domain === "hotmail.com" || domain === "outlook.com")){
        errorMessage.innerHTML = "Invalid Email Address";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

function validateEmailFam(input, errorMessage) {
    var email = input.value;
    var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var domain = email.split("@")[1];

    if (email.length == 0) {
        errorMessage.innerHTML = "";
        return true;
    }
    if (!email.match(emailRegex)) {
        errorMessage.innerHTML = "Invalid Email Address";
        return false;
    }
    if (!(domain === "bmscw.edu.in" || domain === "gmail.com" || domain === "yahoo.com" || domain === "hotmail.com" || domain === "outlook.com")) {
        errorMessage.innerHTML = "Invalid Email Address";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var fincomeError = document.getElementById('fincome-error');
var mincomeError = document.getElementById('mincome-error');
var gincomeError = document.getElementById('gincome-error');

function validateInc(input,errorMessage){
    var income = input.value;

    if(income.length == 0){
        errorMessage.innerHTML = "";
        return true;
    }
    if(!income.match(/^[0-9]+$/)){
        errorMessage.innerHTML = "Invalid Income. Enter only numbers";
        return false;
    }
    errorMessage.innerHTML = '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;
}

var sgpaError1 = document.getElementById('sgpa-error1');
var sgpaError2 = document.getElementById('sgpa-error2');
var sgpaError3 = document.getElementById('sgpa-error3');
var sgpaError4 = document.getElementById('sgpa-error4');

function validateSGPA(input, errorElement) {
  var sgpa = input.value;

  if (sgpa.length === 0) {
    errorElement.innerHTML = 'SGPA is required';
    return false;
  }

  // Numeric Validation
  if (!sgpa.match(/^[0-9]+(\.[0-9]{1,2})?$/)) {
    errorElement.innerHTML = 'Invalid SGPA. Enter a valid number with up to 2 decimal places';
    return false;
  }

  // Range Validation
  var minSGPA = 0.00; // Example: Minimum SGPA allowed
  var maxSGPA = 10.00; // Example: Maximum SGPA allowed
  var numericSGPA = parseFloat(sgpa);

  if (numericSGPA < minSGPA || numericSGPA > maxSGPA) {
    errorElement.innerHTML = 'SGPA must be between ' + minSGPA + ' and ' + maxSGPA;
    return false;
  }

  errorElement.innerHTML =
    '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
  return true;
}

var submitError = document.getElementById('submit-error');
function validateAppln(){
    if(!validateText() || !validateSGPA() || !validateAadhar() || !validateAddress() || !validateEmail() || !validateInc() || !validatePan() || !validatePhone() || !validatePin() || !validateCat() ){
        submitError.innerHTML = "Please fill all the fields with valid input";
        return false;
    }
    errorElement.innerHTML =
        '<i class="fas fa-check-circle" style="color:seagreen;"></i>';
    return true;

}