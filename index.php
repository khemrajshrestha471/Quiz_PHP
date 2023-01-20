<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "db.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // check weather username exists 
    $existSql = "SELECT * from `users` where username = '$username'";
    $result = mysqli_query($connection, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Username already exists! Try again with different Username.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    } else {

        if (($password == $cpassword)) {
            // $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`id`, `username`, `password`, `timestamp`) VALUES (NULL, '$username', '$password', current_timestamp())";

            $result = mysqli_query($connection, $sql);
            if ($result) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: result_record.php");
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Password did not match!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
    }
}

?>






<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register for QUIZ</title>
    <link rel="stylesheet" href="decor1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1 class="intro">Welcome to the quiz session of PHP!!!</h1>
    <h3>Register here if not yet!</h3>
    <div class="container mt-4">
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" maxlength="20" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" maxlength="20" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" required>
            </div>
            <h6>Already have an account? <a href="login.php" id="logged">Log in</a></h6> <br>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>