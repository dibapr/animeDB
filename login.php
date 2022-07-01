<?php
    session_start();
    require 'conn.php';

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        //check username
        if(mysqli_num_rows($result) === 1) {
            //check password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) {
                $_SESSION["login"] = true;
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit;
            }
            $error = true;
        }
    }
    if(isset($_SESSION["login"])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');</style>
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper d-lg-flex flex-lg-row flex-column align-items-center justify-content-between">
        <div class="kiri d-lg-flex d-none bg-dark">
            <div class="head mb-lg-5 mb-0">
                <h1 class="fw-bolder text-white">AnimeDB</h1>
                <h5 class="text-warning">Anime Database where everyone can contribute.</h5>
            </div>
            <div class="pict-container d-lg-flex align-items-center mx-5">
                <div class="pict1 me-5">
                    <img src="assets/catok.gif" class="rounded-5 mb-5 img-fluid pict" alt="">
                    <img src="assets/fujiwara.gif" class="rounded-5 img-fluid pict" alt="">
                </div>
                <div class="pict2">
                    <img src="assets/illya.gif" class="rounded-5 mb-5 img-fluid pict" alt="">
                    <img src="assets/kulkas.gif" class="rounded-5 img-fluid pict" alt="">
                </div>
            </div>
        </div>
        <div class="form-container container-fluid col-lg-4 col-10 mt-lg-0 mt-5">
            <h1 class="fw-bolder text-center mb-3">LOGIN ACCOUNT</h1>
            <form method="POST">
                <div class="form-floating mb-3 rounded-3">
                    <input type="text" name="username" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3 rounded-3">
                    <input type="password" name="password" class="form-control rounded-3" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="button d-grid">
                    <button class="btn btn-primary my-2" name="submit" type="submit">Login</button>
                    <p>Don't have an account? <a class="text-dark fw-bolder" href="register.php">Register here.</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>