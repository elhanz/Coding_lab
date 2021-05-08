<?php
	ob_start();
	$dbc = mysqli_connect('localhost', 'root', '', 'b_study') OR DIE('<p class="h1">Ошибка подключения к базе данных </p>');

	if (isset($_POST['forum_id'])) {
		$forum_id = $_POST['forum_id'];

		$answers = mysqli_query($dbc, "SELECT * FROM `messages` WHERE forum_id = '$forum_id' ORDER BY message_id DESC");

		if (mysqli_num_rows($answers) > 0) {
			while($rowMessageExactForum=mysqli_fetch_assoc($answers)) {
				echo '
		<div class="eachAnswer">
			<p class="author-date">
				<i class="fas fa-user-circle" style="font-size:0.9rem;"></i>
				<span class="author"> '; echo $rowMessageExactForum['from_user']; echo ' </span>
				<span class="date">'; echo $rowMessageExactForum['date']; echo ' </span>
			</p>
			<p class="eachMessageForum">
				'; echo $rowMessageExactForum['message']; echo '
			</p>
		</div>';
			}
		}
		else {
			echo '
				<div class="noAnswer">
					<i class="fas fa-comment fa-2x"></i>
					<p>No Answers Yet</p>
					<p>Be the first to share what you think!</p>
				</div>
			';
		}
		ob_end_flush();
		mysqli_close($dbc);
	}
?>
