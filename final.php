<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<header>
		<div class="container">
			<br>
			<p>Your result</p>
		</div>
	</header>

	<main>
		<div class="container">
			<br>
			<p>Congratulation <?php echo $_SESSION['username']; ?>,  You have completed this MCQ exam !!</p>
			<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?> out of 
			<?php 
			include "db.php";
			$query = "SELECT * FROM questions";
			$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
			echo $total_questions; ?></p>
			<?php  
			?>

			<?php
			
			$user = $_SESSION['username'];
			$record = $_SESSION['score'];
			$result_history = "INSERT INTO `score_history` (`username`, `last_score`) VALUES ('$user', '$record')";
			$pushed = mysqli_query($connection, $result_history);
			?>
		</div>

	</main>

	<div class="container" id="button_last">
		<br>
	<a href="dashboard.php"><button type="submit" class="btn btn-success">Dashboard</button></a> &nbsp; &nbsp; &nbsp;
	<a href="logout.php"><button type="submit" class="btn btn-danger">Logout</button></a>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>