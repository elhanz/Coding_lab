function validationSave() {

  var first_name = document.getElementById('first_name').value;
  var second_name = document.getElementById('second_name').value;
  var email = document.getElementById('email').value;
  var tel_number = document.getElementById('tel_number').value;

  // var password = document.getElementById('password').value;
  // var re_password = document.getElementById('re_password').value;

  var nameCheck = /[A-Za-z]/;
  var numCheck = /[0-9]/;
  var emailChecker = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  var errorText = "";

  if (nameCheck.test(first_name) == false) {
    errorText += "- Please enter your first name <br>";
  }

  if (nameCheck.test(second_name) == false) {
    errorText += "- Please enter your second name <br>";
  }

  if (numCheck.test(tel_number) == false) {
    errorText += "- Please write telephone number in format '8xxxxxxxxxx' <br>";
  }

  if (emailChecker.test(email) == false) {
    errorText += "- Please enter a valid email' <br>";
  }
  document.getElementById('save_error').innerHTML = errorText;
  if (errorText != "") {
    return false;
  }
  else {
    return true;
  }

}

function validationChangePass() {

  var current_password = document.getElementById('current_password').value;
  var password = document.getElementById('password').value;
  var re_password = document.getElementById('re_password').value;

  var errorText = "";

  if (current_password.trim() == "") {
    errorText += "- Please enter current password <br>";
  }

  if (password.trim() != "") {
    if (password.length < 8) {
      errorText += "- The length of password should be minimum 8 <br>";
    }
  } else {
    errorText += "- Please enter new password <br>";
  }

  if (re_password.trim() != password.trim()) {
    errorText += "- Please repeate new password <br>";
  }
  document.getElementById('change_pass_error').innerHTML = errorText;
  if (errorText != "") {
    return false;
  }
  else {
    return true;
  }

}
