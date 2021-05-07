<!doctype html>

<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');
	//$dbc = mysqli_connect('mysql.zzz.com.ua', 'bakytkerey', 'Bati314565', 'bakytkerey_b') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');
	if(!empty($_COOKIE['username'])) {
	  $username = $_COOKIE['username'];
		$forums = mysqli_query($dbc, "SELECT * FROM `forums`");
	}


	if(isset($_GET['id']) && (preg_match("/^[0-9]+$/i", $_GET['id']))) {
		$forum_id = $_GET["id"];
		$exactForum = mysqli_query($dbc, "SELECT * FROM `forums` WHERE forum_id = '$forum_id'");
		$rowExactForum=mysqli_fetch_assoc($exactForum);

		$answers = mysqli_query($dbc, "SELECT * FROM `messages` WHERE forum_id = '$forum_id' ORDER BY message_id DESC");
	}
	if(isset($_POST['answerBtn'])) {
		$date = date('Y-m-d');
		$answer_message = mysqli_real_escape_string($dbc, trim($_POST['answer_message']));
		mysqli_query($dbc, "INSERT INTO `messages`(`forum_id`, `from_user`, `date`, `message`) VALUES ('$forum_id','$username','$date','$answer_message')");
		ob_end_flush();
		mysqli_close($dbc);
		header("Refresh:0");
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
		<?php
			if(!(isset($_GET['id']))) {
		?>
		<p class="heading">Forums</p>
		<form class="" action="" method="post">
			<section class="filterSection">
				<input type="submit" name="NewestBtn" value="Newest">
				<input type="submit" name="ActiveBtn" value="Active">
				<input type="submit" name="UnansweredBtn" value="Unanswered">
			</section>
		</form>

		<?php
				while($rowForums=mysqli_fetch_assoc($forums)) {
		?>

		<button class="eachForum" id="<?php echo $rowForums['forum_id']; ?>" name="forumBtn" onclick="showForum(this.id)">
			<p class="author-date">
			Posted by
			<span class="author"><?php echo $rowForums['author_user']; ?></span>
			<span class="date"><?php echo $rowForums['date']; ?></span>
			</p>
			<p class="topic"><?php echo $rowForums['topic']; ?></p>
			<p class="description"><?php echo $rowForums['description']; ?></p>
			<p class="sphere"><?php echo $rowForums['sphere']; ?></p>
			<p class="answers">
				<i class="fas fa-comment"></i>
				<span>
					<?php echo $rowForums['num_of_comments']; ?> answers
				</span>
			</p>
		</button>

			<?php
					}
				}
				else if (mysqli_num_rows($exactForum)) {
			?>

		<section "exactForum">

			<div class="eachForum eachForum-2" id="<?php echo $rowExactForum['forum_id']; ?>" name="forumBtn">
				<p class="author-date">
				Posted by
				<span class="author"><?php echo $rowExactForum['author_user']; ?></span>
				<span class="date"><?php echo $rowExactForum['date']; ?></span>
				</p>
				<p class="topic"><?php echo $rowExactForum['topic']; ?></p>
				<p class="description description-2"><?php echo $rowExactForum['description']; ?></p>
				<p class="sphere"><?php echo $rowExactForum['sphere']; ?></p>
				<p class="answers">
					<i class="fas fa-comment"></i>
					<span>
						<?php echo $rowExactForum['num_of_comments']; ?> answers
					</span>
				</p>
				<form class="answerForm" action="" onSubmit="window.location.reload()" method="post">
					<textarea class="yourAnswer" name="answer_message" rows="1" placeholder="Your answer..."></textarea>
					<input type="submit" class="answerBtn" name="answerBtn" value="Answer">
				</form>
			</div>


			<?php
				if (mysqli_num_rows($answers) > 0) {
					while($rowMessageExactForum=mysqli_fetch_assoc($answers)) {
			?>

			<div class="eachAnswer">
				<p class="author-date">
					<i class="fas fa-user-circle" style="font-size:0.9rem;"></i>
					<span class="author"><?php echo $rowMessageExactForum['from_user']; ?></span>
					<span class="date"><?php echo $rowMessageExactForum['date']; ?></span>
				</p>
				<p class="eachMessageForum">
					<?php echo $rowMessageExactForum['message']; ?>
				</p>
			</div>

			<?php
					}
				} else {
			?>

			<div class="noAnswer">
				<i class="fas fa-comment fa-2x"></i>
				<p>No Answers Yet</p>
				<p>Be the first to share what you think!</p>
			</div>

			<?php
				}
			?>

		</section>

			<?php
				}
			?>

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
	<script type="text/javascript">
		function showForum(forum_id) {
			location.href = "forums.php" + "?id=" + forum_id;
		}
	</script>
</body>

</html>
