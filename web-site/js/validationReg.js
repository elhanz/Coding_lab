function validationReg() {

  var username = document.getElementById('username').value;
  var first_name = document.getElementById('first_name').value;
  var second_name = document.getElementById('second_name').value;
  var email = document.getElementById('email').value;
  var tel_number = document.getElementById('tel_number').value;
  var password = document.getElementById('password').value;
  var re_password = document.getElementById('re_password').value;

  var nameCheck = /[A-Za-z]/;
  var numCheck = /[0-9]/;
  var emailChecker = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  var correctAll = true;

  if (nameCheck.test(username) || username.trim() != "") {
    if (username.length < 5) {
      document.getElementById('username_error').innerHTML = "The length of username should be minimum 5";
      correctAll = false;
    } else {
      document.getElementById('username_error').innerHTML = " ";
    }
  } else {
    document.getElementById('username_error').innerHTML = "Please enter username";
    correctAll = false;
  }

  if (nameCheck.test(first_name)) {
    document.getElementById('first_name_error').innerHTML = " ";
  } else {
    document.getElementById('first_name_error').innerHTML = "Please enter your first name";
    correctAll = false;
  }

  if (nameCheck.test(second_name)) {
    document.getElementById('second_name_error').innerHTML = " ";
  } else {
    document.getElementById('second_name_error').innerHTML = "Please enter your second name";
    correctAll = false;
  }

  if (numCheck.test(tel_number)) {
    document.getElementById('tel_number_error').innerHTML = " ";
  } else {
    document.getElementById('tel_number_error').innerHTML = "Please write telephone number in format '8xxxxxxxxxx'";
    correctAll = false;
  }

  if (emailChecker.test(email)) {
    document.getElementById('email_error').innerHTML = " ";
  } else {
    document.getElementById('email_error').innerHTML = "Please enter a valid email";
    correctAll = false;
  }

  if (password.trim() != "") {
    if (password.length < 8) {
      document.getElementById('password_error').innerHTML = "The length of password should be minimum 8";
      correctAll = false;
    } else {
      document.getElementById('password_error').innerHTML = " ";
    }
  } else {
    document.getElementById('password_error').innerHTML = "Please enter password";
    correctAll = false;
  }

  if (re_password.trim() == password.trim()) {
    document.getElementById('re_password_error').innerHTML = " ";
  } else {
    document.getElementById('re_password_error').innerHTML = "Please repeate password";
    correctAll = false;
  }

  return correctAll;
}
