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
    <title>Welcome <?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="decor2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    include "db.php";
    $user = $_SESSION['username'];
    ?>

    <h1 class="alert-heading">Hello - <?php echo $user ?>!</h1> <br> <br>
    <div class="container">
    <?php
    $sql = "SELECT * FROM `score_history`";
    $result = mysqli_query($connection, $sql);
    $query = "SELECT * FROM questions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['username'] == $user) {
                $count ++;
                echo "Your " . $count . " times score was:- " . $row['last_score'] . " out of " . $total_questions . "<br>";
        }       
    }
    ?>
    </div>
    <br> <br>
    <div class="container">
        <a href="dashboard.php"><button type="submit" class="btn btn-success">Dashboard</button></a> &nbsp; &nbsp; &nbsp;
        <a href="logout.php"><button type="submit" class="btn btn-danger">Logout</button></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>