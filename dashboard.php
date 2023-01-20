<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
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
		<div class="containers">
			<p>'Developed by <span>Khemraj Shrestha</span>'</p>
		</div>
	</header>

	<main>
    <div class = "menu">

	<br> <br> <br>

<a href="main.php" class="button">Take Exam</a>
</div>
	</main>

</body>
</html>
