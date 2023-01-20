<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>


<?php
include 'db.php';
$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query($connection, $query));


?>
<html>

<head>
	<title>PHP Practice MCQ</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>

	<header>
		<div class="container">
			<p>PHP MCQ</p>
		</div>
	</header>

	<main>
		<br> <br>
		<div class="container">
			<ul>
				<li><strong>Number of Questions:</strong><?php echo " " . $total_questions; ?> </li> <br>
				<li><strong>Type:</strong> Multiple Choise</li> <br>
				<li><strong>Estimated Time:</strong> <?php echo $total_questions * 1.5 . " Minutes"; ?></li> <br>

			</ul>

			<br> <br>

			<a href="question.php?n=1" class="start">Start Quize</a>

		</div>

	</main>
</body>
</html>