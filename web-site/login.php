<!doctype html>

<html>

<head>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="font-awesome/css/all.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/log-reg.css">

  <link href="aos-master/dist/aos.css" rel="stylesheet">


  <!-- Icon -->
  <link rel="icon" href="img/logo.ico" sizes="16x16 32x32 192x192" type="image/png">
  <!-- Primary Meta Tags -->
  <title>web-site</title>
  <meta name="title" content="">
  <meta name="description" content="">
  <meta name="author" content="Bakytkereiuly Batyrbek" />
  <meta name="url" content="" />
  <meta name="robots" content="index, follow">
  <meta name="keywords" content="" />
</head>

<body>

  <header>
    <a href="index.html"><i class="fal fa-long-arrow-left fa-3x"></i></a>
  </header>

  <div class="content">
    <div class="form">
      <p class="heading">Log in to B-Study</p>
      <p class="no-acc"><a href="register.php">Have no account? Register now.</a></p>
      <div class="form__div">
        <input type="text" id="username" class="form__input" placeholder=" " name="username" required>
        <label for="" class="form__label">Username</label>
      </div>
      <div class="form__div">
        <input type="password" id="password" class="form__input" placeholder=" " name="password" required>
        <label for="" class="form__label">Password</label>
      </div>
      <input type="submit" id="submitLog" name="submitLog" value="Log in" class="submit">
      <p class="form-error" id="form_error"> </p>
    </div>
    <div class="background"></div>
  </div>

  <script src="aos-master/dist/aos.js"></script>
  <script type="text/javascript" src="js/faq.js"></script>
  <script type="text/javascript" src="js/burgerJS.js"></script>
	<script type="text/javascript">
  	$( document ).ready(function() {
  		$('#submitLog').on('click', function() {
  			var username = $('#username').val();
  			var password = $('#password').val();
  			$.ajax({
  				method: "POST",
  				url: "checkUser.php",
  				data: { login: '1', username: username, password: password }
  			})
  				.done(function(result) {
  					if (result == "1") {
  						window.location.href = 'welcome.php';
  					} else if (result == "0"){
  						$('#form_error').html('Username or password is not correct');
  					} else {
  						$('#form_error').html('ERROR. TRY AGAIN');
  					}
  				});
  		});
  	});
	</script>
</body>

</html>
