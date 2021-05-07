<!doctype html>

<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');
	//$dbc = mysqli_connect('mysql.zzz.com.ua', 'bakytkerey', 'Bati314565', 'bakytkerey_b') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');
if(!empty($_COOKIE['username'])) {
  $username = $_COOKIE['username'];
	$profileInfo = mysqli_query($dbc, "SELECT username,first_name, second_name,country,address,tel_number,email  FROM `users` WHERE username = '$username'");
	$rowProfileInfo = mysqli_fetch_array($profileInfo);
}

if(isset($_POST['saveBtn'])) {
	$first_name = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
  $second_name = mysqli_real_escape_string($dbc, trim($_POST['second_name']));
	$country = mysqli_real_escape_string($dbc, trim($_POST['country']));
	$address = mysqli_real_escape_string($dbc, trim($_POST['address']));
  $tel_number = mysqli_real_escape_string($dbc, trim($_POST['tel_number']));
	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));

	if(!empty($first_name) && !empty($second_name) && !empty($tel_number) && !empty($email) && !empty($country) && !empty($address)) {
		$query ="UPDATE `users` SET `first_name`='$first_name', `second_name`='$second_name', `country`='$country', `address`='$address', `tel_number`='$tel_number', `email`='$email' WHERE `username` = '$username' ";
		mysqli_query($dbc,$query);

		ob_end_flush();
		mysqli_close($dbc);
		header('Location: profile.php');
	 }
}

if(isset($_POST['changeBtn'])) {
	$current_password = mysqli_real_escape_string($dbc, trim($_POST['current_password']));
  $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	$re_password = mysqli_real_escape_string($dbc, trim($_POST['re_password']));

	if(!empty($re_password) && !empty($password) && !empty($current_password)) {
		$query_check = "SELECT `username` FROM `users` WHERE username = '$username' AND password = SHA('$current_password')";
		$data = mysqli_query($dbc,$query_check);
		if(mysqli_num_rows($data) == 1)  {
			$query ="UPDATE `users` SET `password`= SHA('$password') WHERE `username` = '$username' ";
			mysqli_query($dbc,$query);
			ob_end_flush();
			mysqli_close($dbc);
			header('Location: acc-set.php?p=1');
		} else {
			ob_end_flush();
			mysqli_close($dbc);
			header('Location: acc-set.php?p=0');
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
  <link rel="stylesheet" href="css/style.css">

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
    <div class="inner-header inner-header-2">
      <div class="header-menu">
        <i class="fas fa-bars"></i>
      </div>
      <a href="welcome.php" class="logo">
          B-Study
      </a>
      <div class="header-profile">
        <i class="fas fa-user-circle"></i>
      </div>
    </div>
  </header>

  <div class="menu-background"></div>

  <section class="left-menu">
    <div class="eachPage">
      <a href="welcome.php">
        <span>Home</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="profile.php">
        <span>Profile</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="#">
        <span>Chats</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="#">
        <span>Courses</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="forums.php">
        <span>Forums</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <hr style="width:75%; opacity:0.15;">
    <div class="eachPage">
      <a href="acc-set.php">
        <span>Account settings</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="#">
        <span>Support center</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
    <div class="eachPage">
      <a href="exit.php">
        <span>Log out</span>
        <i class="fas fa-chevron-right"></i>
      </a>
    </div>
  </section>

  <section class="banner banner-3">
    <div class="background-box"></div>
    <div class="text-content">
      <p class="heading"></p>
    </div>
  </section>

  <main class="profileMain">
    <section class="AccSetBlock">
			<div class="AccSetSections">
				<p class="eachSection">Profile</p>
				<p class="eachSection">Payment</p>
			</div>
			<div class="AccSetSectionBlock">
				<form class="" onsubmit="return validationSave();" action="acc-set.php" method="post">
					<p class="heading">Account</p>
					<div class="eachProfileInfo">
						<p class="infoName">First name</p>
						<input type="text" id="first_name" name="first_name" value="<?php echo $rowProfileInfo[1]; ?>" required>
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Second name</p>
						<input type="text" id="second_name" name="second_name" value="<?php echo $rowProfileInfo[2]; ?>" required>
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Country</p>
						<input type="text" name="country" value="<?php echo $rowProfileInfo[3]; ?>">
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Address</p>
						<input type="text" name="address" value="<?php echo $rowProfileInfo[4]; ?>">
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Telephone number</p>
						<input type="text" id="tel_number" name="tel_number" value="<?php echo $rowProfileInfo[5]; ?>" required>
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Email</p>
						<input type="text" id="email" name="email" value="<?php echo $rowProfileInfo[6]; ?>" required>
					</div>
					<div class="error_div">
						<p id="save_error">

						</p>
					</div>
					<input type="submit" name="saveBtn" value="Save" class="save-btn">
				</form>

				<hr style="margin-top: 30px; margin-bottom: 30px; color: rgb(219, 219, 219);">
				<form class="" onsubmit="return validationChangePass();" action="acc-set.php" method="post">
					<p class="heading">Password</p>
					<div class="eachProfileInfo">
						<p class="infoName">Current password</p>
						<input type="text" id="current_password" name="current_password" value="" required>
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">New password</p>
						<input type="text" id="password" name="password" value="" required>
					</div>
					<div class="eachProfileInfo">
						<p class="infoName">Repeat new password</p>
						<input type="text" id="re_password" name="re_password" value="" required>
					</div>
					<div class="error_div">
						<p id="change_pass_error">

						</p>
					</div>
					<input type="submit" name="changeBtn" value="Change password" class="save-btn">
				</form>

				<hr style="margin-top: 30px; margin-bottom: 30px; color: rgb(219, 219, 219);">
			</div>
    </section>
  </main>

  <footer>
    <div class="container">
      <div class="col">
        <p class="logo"><a href="">B-Study</a></p>
        <p class="about">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="icons">
          <a href=""><i class="fab fa-vk"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-telegram-plane"></i></a>
        </div>
      </div>
      <div class="col">
        <p class="heading">
          QUICK LINKS
          <span class="under-heading-line"></span>
        </p>
        <p class="menu-item"><a href="welcome.php">Home</a></p>
        <p class="menu-item"><a href="profile.php">Profile</a></p>
        <p class="menu-item"><a href="">Chats</a></p>
        <p class="menu-item"><a href="">Courses</a></p>
        <p class="menu-item"><a href="forums.php">Forums</a></p>
        <p class="menu-item"><a href="acc-set.php">Account settings</a></p>
        <p class="menu-item"><a href="">Support center</a></p>
        <p class="menu-item"><a href="exit.php">Log out</a></p>
      </div>
      <div class="col">
        <p class="heading">
          CONTACT
          <span class="under-heading-line"></span>
        </p>
        <p class="contact-item">
          <i class="fas fa-phone-alt"></i>
          <span><a href="">8(777)777-77-77</a></span>
        </p>
        <p class="contact-item">
          <i class="far fa-envelope"></i>
          <span><a href="">bakytkerey.b@gmail.com</a></span>
        </p>

      </div>
    </div>
    <hr style="color: #90cfa5; margin-top:50px; margin-bottom: 50px; opacity:0.5;">
    <p class="copyright">© 2020 All Rights Reserved. Developed By Bakytkereiuly Batyrbek</p>
  </footer>

  <script src="aos-master/dist/aos.js"></script>
  <script type="text/javascript" src="js/faq.js"></script>
  <script type="text/javascript" src="js/burgerJS.js"></script>
	<script type="text/javascript" src="js/validationAccSet.js"></script>
	<script type="text/javascript">
		var correctPassword = "<?php echo $_GET['p']; ?>";
		if (correctPassword == "1") {
			$("#change_pass_error").toggleClass('correct');
			document.getElementById('change_pass_error').innerHTML = "Password was successfully changed";
		}
		if (correctPassword == "0") {
			document.getElementById('change_pass_error').innerHTML = "Current password is not correct";
		}
	</script>
</body>

</html>