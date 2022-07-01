<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">    
    <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');</style>
     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark py-3 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white ms-lg-5" href="index.php">AnimeDB</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="anime.php">Anime</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-5 me-lg-5 mt-lg-0 mt-2">
                    <?php
                        if(!isset($_SESSION["login"])) { ?>
                            <a class="btn btn-warning" href="login.php" role="button">Login</a>
                    <?php
                        } else { 
                            if(isset($_SESSION["username"])) { ?>
                                <h5 class="text-light me-5 m-auto">Welcome, <?= $_SESSION["username"]; ?>!</h5>
                                <a class="btn btn-danger" href="logout.php" role="button">Logout</a>
                    <?php }
                     } ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="hero-container text-center container-lg container-md-fluid">
            <div class="hero p-5">
                <h1 class="text-white head fw-bolder">Welcome to AnimeDB</h1>
                <h5 class="text-white">Watchlist your anime, contribute, and love anime.</h5>
                <div class="button mt-3">
                    <a class="btn btn-outline-light btn-lg" href="#why" role="button">Why Us?</a>
                    <a class="btn btn-success btn-lg" href="anime.php" role="button">Explore</a>
                </div>    
            </div>  
        </div>
    </div>
    <div class="why container d-flex flex-lg-nowrap flex-wrap align-items-center" id="why">
        <img src="assets/satania.gif" alt="">
        <div class="why-head ps-lg-5 ms-lg-5 mt-lg-0 mt-5">
            <div class="line"></div>
            <h1 class="fw-bolder text-uppercase text-start">Why Choose Us?</h1>
            <ul>
                <li>AnimeDB is not-for-profit (no ads, no spyware).</li>
                <li>Your privacy is important to us!</li>
                <li>By fans, for fans!</li>
            </ul>
            <p class="">AnimeDB is shaped by its users, and is constantly evolving. Our content is constantly kept up to date, with revisions coming straight from your user input. With your feedback and suggestions, new features are brought to AniDB. Your participation will transform AnimeDB into the most informative anime database on the Internet.</p>
        </div>
    </div>
    <div class="explore d-flex justify-content-center align-items-center flex-column flex-wrap">
        <div class="explore-head text-white">
            <h1 class="fw-bolder text-center p-lg-0 p-2">START EXPLORE YOUR ANIME RIGHT NOW</h1>
        </div>
        <div class="explore-cta">
            <a class="btn btn-outline-light btn-lg" href="anime.php" role="button">Explore</a>
        </div>
    </div>
    <div class="visit d-flex justify-content-evenly align-items-center flex-lg-nowrap flex-wrap">
        <div class="visit-head order-lg-1 order-2 py-5">
            <div class="line"></div>
            <h1 class="text-uppercase fw-bolder">Visit My Github</h1>
            <p class="">This website was created only for the purpose of learning about databases, in the future I will learn to use API</p>
            <a href="https://github.com/dibapr" target="_blank" class="text-decoration-none btn btn-lg btn-outline-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                </svg>
                Visit
            </a>
        </div>
        <img src="assets/mashiro.png" alt="" class="order-lg-2 order-1" class="img-fluid">
    </div>
    <footer class="bg-dark text-light d-flex flex-column justify-content-center align-items-center">
        <div class="footer-head">
            <h1 class="fw-bolder pt-5">AnimeDB</h1>
        </div>
        <div class="footer-list d-flex justify-content-evenly align-items-lg-start align-items-center text-lg-start text-center flex-lg-row flex-column p-5">
            <div class="footer-menu">
                <h5>Menu</h5>
                <a class="d-block text-light text-decoration-none" href="index.php">Home</a>
                <a class="d-block text-light text-decoration-none" href="anime.php">Anime</a>
            </div>
            <div class="search py-lg-0 py-3">
                <h5>Search</h5>
                <form class="d-flex flex-lg-row flex-column" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light mt-lg-0 mt-3" type="submit">Search</button>
                </form>
            </div>
            <div class="about col-lg-3 col-12 py-lg-0 py-3">
                <h5>About</h5>
                <p>Anime is a word used by people living outside of Japan to describe cartoons or animation produced within Japan. Using the word in English conversation is essentially the same as describing something as a Japanese cartoon series or an animated movie or show from Japan.</p>
            </div>
        </div>
        <div class="copyright">
            <p>Made with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
            </svg> by Diba</p>
        </div>
    </footer>
    
</body>
</html>