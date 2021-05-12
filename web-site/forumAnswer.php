<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

	if (isset($_POST['forum_id'])) {
		$forum_id = $_POST['forum_id'];
		$date = date('Y-m-d');
		$answer_message = $_POST['answer'];
		$username = $_POST['username'];
		mysqli_query($dbc, "INSERT INTO `messages`(`forum_id`, `from_user`, `date`, `message`) VALUES ('$forum_id','$username','$date','$answer_message')");

		mysqli_query($dbc, "UPDATE `forums` SET `num_of_comments`= ((SELECT `num_of_comments` FROM forums WHERE forum_id = '$forum_id') + 1) WHERE forum_id = '$forum_id'");

		ob_end_flush();
		mysqli_close($dbc);
	}

	if (isset($_POST['number_of_answers'])) {
		$forum_id = $_POST['f_id'];
		$numOfAnswers = mysqli_query($dbc, "SELECT `num_of_comments` FROM `forums` WHERE forum_id = '$forum_id'");
		$rowNumOfAnswers=mysqli_fetch_array($numOfAnswers);
		echo $rowNumOfAnswers[0];
	}
}
?>
