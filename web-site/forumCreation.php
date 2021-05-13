<!doctype html>

<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

	if(!empty($_COOKIE['username'])) {
	  $username = $_COOKIE['username'];

		if (isset($_POST['createForum'])) {
			$topic = mysqli_real_escape_string($dbc, trim($_POST['topic']));
			$description = mysqli_real_escape_string($dbc, trim($_POST['description']));
			$sphere = mysqli_real_escape_string($dbc, trim($_POST['sphere']));
			$date = date('Y-m-d');

			if(!empty($topic)) {
				$query ="INSERT INTO `forums` (author_user, topic, description, date, sphere, num_of_comments) VALUES ('$username', '$topic', '$description', '$date', '$sphere', 0)";
				mysqli_query($dbc,$query);
				ob_end_flush();
				mysqli_close($dbc);
				header('Location: forums.php');
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

  <main>
		<a href="forums.php" class="goBackForumBtn"><i class="fas fa-long-arrow-left"></i> Go back</a>
		<p class="heading">Forum creation</p>
		<form class="forumCreation" action="forumCreation.php" method="post">
			<div class="eachTextField">
				<label for="">Topic/Question</label>
				<input type="text" name="topic" value="" placeholder="..." required>
			</div>
			<div class="eachTextField">
				<label for="">Description</label>
				<textarea name="description" rows="8" placeholder="..."></textarea>
			</div>
			<div class="eachTextField">
				<label for="">Sphere</label>
				<select id="cars" name="sphere" required>
					<option value="other" disabled selected>...</option>
				  <option value="mathematics">mathematics</option>
				  <option value="physics">physics</option>
				  <option value="IT">IT</option>
				  <option value="other">other</option>
				</select>
			</div>
			<input class="createForumBtn" type="submit" name="createForum" value="Create" style="width:100%; margin-top: 20px; background-color: #0c8b51; color: white;">
		</form>
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
</body>

</html>
