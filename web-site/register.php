<!doctype html>
<?php
ob_start();
$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="">Ошибка подключения к базе данных </p>');

if(isset($_POST['submitReg'])){
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
  $first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  $second_name = mysqli_real_escape_string($dbc, trim($_POST['second_name']));
  $tel_number = mysqli_real_escape_string($dbc, trim($_POST['tel_number']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
	$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$re_password = mysqli_real_escape_string($dbc, trim($_POST['re_password']));

	if(!empty($username) && !empty($first_name) && !empty($second_name) && !empty($tel_number) && !empty($email) && !empty($password) && !empty($re_password) && ($password == $re_password)) {
		$query = "SELECT * FROM `users` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `users` (username, password, first_name, second_name, tel_number, email) VALUES ('$username', SHA('$password'), '$first_name', '$second_name', '$tel_number', '$email')";
			mysqli_query($dbc,$query);
      ob_end_flush();
			mysqli_close($dbc);
			header('Location: index.html');
		}
		else {
      ob_end_flush();
			header('Location: login.php');
		}
	 }
}

?>

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
    <a href=""><i class="fal fa-long-arrow-left fa-3x"></i></a>
  </header>

  <div class="content">
    <form class="" action="register.php" method="post" >
      <p class="heading">Register on B-Study</p>
      <p class="no-acc"><a href="login.php">Already registered? Log in.</a></p>
      <div class="form__div">
        <input type="text" class="form__input" placeholder=" " name="username" required>
        <label for="" class="form__label">Username</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="text" class="form__input" placeholder=" " name="first_name" required>
        <label for="" class="form__label">First name</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="text" class="form__input" placeholder=" " name="second_name" required>
        <label for="" class="form__label">Second name</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="text" class="form__input" placeholder=" " name="tel_number" required>
        <label for="" class="form__label">Telephone number</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="text" class="form__input" placeholder=" " name="email" required>
        <label for="" class="form__label">Email</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="password" class="form__input" placeholder=" " name="password" required>
        <label for="" class="form__label">Password</label>
        <p class="error">It should not be empty!</p>
      </div>
      <div class="form__div">
        <input type="password" class="form__input" placeholder=" " name="re_password" required>
        <label for="" class="form__label">Repeat Password</label>
        <p class="error">It should not be empty!</p>
      </div>
      <input type="submit" name="submitReg" value="Register" class="submit">
			<p class="form-error">This username is already registered</p>
    </form>
    <div class="background"></div>
  </div>

  <script src="aos-master/dist/aos.js"></script>
  <script type="text/javascript" src="js/faq.js"></script>
  <script type="text/javascript" src="js/burgerJS.js"></script>

</body>

</html>
