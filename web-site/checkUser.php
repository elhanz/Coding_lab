<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="">Ошибка подключения к базе данных </p>');

	if(!isset($_COOKIE['username'])) {
		if (isset($_POST['login'])) {
			if(isset($_POST['username'])) {
				$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
				$password = mysqli_real_escape_string($dbc, trim($_POST['password']));
				if(!empty($username) && !empty($password)) {
					$query = "SELECT `username` FROM `users` WHERE username = '$username' AND password = SHA('$password')";
					$data = mysqli_query($dbc,$query);
					if(mysqli_num_rows($data) == 1) {
						$row = mysqli_fetch_assoc($data);
						setcookie('username', $row['username'], time() + (60*60*24*30));
						ob_end_flush();
		        echo "1";
					}
					else {
						ob_end_flush();
		        echo "0";
					}
				}

			}
		}

		if(isset($_POST['register'])){
			$username = $_POST['username'];
		  $first_name = $_POST['first_name'];
		  $second_name = $_POST['second_name'];
		  $tel_number = $_POST['tel_number'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$re_password = $_POST['re_password'];

			if(!empty($username) && !empty($first_name) && !empty($second_name) && !empty($tel_number) && !empty($email) && !empty($password) && !empty($re_password) && ($password == $re_password)) {
				$query = "SELECT * FROM `users` WHERE username = '$username'";
				$data = mysqli_query($dbc, $query);
				if(mysqli_num_rows($data) == 0) {
					$query ="INSERT INTO `users` (username, password, first_name, second_name, tel_number, email) VALUES ('$username', SHA('$password'), '$first_name', '$second_name', '$tel_number', '$email')";
					mysqli_query($dbc,$query);
		      ob_end_flush();
					mysqli_close($dbc);
					echo "1";
				}
				else {
		      ob_end_flush();
					mysqli_close($dbc);
					echo "0";
				}
			 }
		}
	}
} else {
	header('Location: index.html');
}

?>
