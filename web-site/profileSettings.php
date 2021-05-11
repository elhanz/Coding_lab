<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

if(isset($_POST['saveBtn'])) {
	$username = $_POST['username'];
	$first_name = $_POST['first_name'];
  $second_name = $_POST['second_name'];
	$country = $_POST['country'];
	$address = $_POST['address'];
  $tel_number = $_POST['tel_number'];
	$email = $_POST['email'];

	if(!empty($first_name) && !empty($second_name) && !empty($tel_number) && !empty($email)) {
		$query ="UPDATE `users` SET `first_name`='$first_name', `second_name`='$second_name', `country`='$country', `address`='$address', `tel_number`='$tel_number', `email`='$email' WHERE `username` = '$username' ";
		mysqli_query($dbc,$query);

		ob_end_flush();
		mysqli_close($dbc);
		echo "1";
	 }
}

if(isset($_POST['changeBtn'])) {
	$username = $_POST['username'];
	$current_password = $_POST['current_password'];
  $password = $_POST['password'];
	$re_password = $_POST['re_password'];

	if(!empty($re_password) && !empty($password) && !empty($current_password)) {
		$query_check = "SELECT `username` FROM `users` WHERE username = '$username' AND password = SHA('$current_password')";
		$data = mysqli_query($dbc,$query_check);
		if(mysqli_num_rows($data) == 1)  {
			$query ="UPDATE `users` SET `password`= SHA('$password') WHERE `username` = '$username' ";
			mysqli_query($dbc,$query);
			ob_end_flush();
			mysqli_close($dbc);
			echo "1";
		} else {
			ob_end_flush();
			mysqli_close($dbc);
			echo "0";
		}
	 }
}
?>
