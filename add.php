<?php
    session_start();
    require 'conn.php';
    if(isset($_POST["submit"])) {
        //check if data has been addded successfully or not
        if(add($_POST) > 0) {
            $_SESSION["successAdd"] = true;
            header("Location: anime.php");
            exit;
        } else {
            $errUpload = true;
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="css/add.css">
        <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');</style>
        <title>Add</title>
        <script src="jquery/dist/jquery.min.js"></script>
        <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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
                            <a class="nav-link text-white" href="index.php">Home</a>
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
    <div class="head pt-5 pb-5">
        <h1 class="fw-bolder text-center text-white">ADD YOUR ANIME HERE</h1>
        <h5 class="text-center text-white">Let's contribute into Anime world!</h5>
    </div>
    <div class="add d-flex container flex-column p-5">
        <form name="form" action="" method="POST" enctype="multipart/form-data">
            <div class="title mb-3">
                <label for="title">Title:</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Input the title" aria-label="default input example" required>
            </div>
            <div class="image mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" name="image" id="formFile" accept=".jpg, .jpeg, .png">
            </div>
            <div class="desc mb-3">
                <label for="desc">Description:</label>
                <textarea class="form-control" style="resize: none;" name="desc" id="exampleFormControlTextarea1" rows="3"  placeholder="Input the description" required></textarea>
            </div>
            <div class="genre mb-3">
                <label for="genre">Genre:</label>
                <div class="row">
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Action" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Action
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Adventure" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Adventure
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Comedy" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Comedy
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Drama" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Drama
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Fantasy" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Fantasy
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Horror" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Horror
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Mystery" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Mystery
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Romance" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Romance
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Sci-Fi" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Sci-Fi
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Slice of Life" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Slice of Life
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Sports" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Sports
                        </label>
                    </div>
                    <div class="form-check col">
                        <input class="form-check-input" type="checkbox" name="genre[]" value="Supernatural" id="flexCheck">
                        <label class="form-check-label" for="flexCheck">
                            Supernatural
                        </label>
                    </div>
                </div>
                <?php
                    if(isset($_POST["submit"])) {
                        if(!isset($_POST["genre"])) {
                            echo "<p class='text-danger'>You must select one of the genre above</p>";
                        }
                    }
                ?>
            </div>
            <div class="date mb-3">
                <label for="date">Release Date:</label><br>
                <input class="form-control" type="date" name="date" id="date" required>
            </div>
            <div class="button d-grid gap-2">
                <button type="submit" name="submit" class="btn submit btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>
    <footer class="bg-dark text-light d-flex flex-column justify-content-center align-items-center">
        <div class="footer-head">
            <h1 class="fw-bolder pt-5">AnimeDB</h1>
        </div>
        <div class="footer-list d-flex justify-content-evenly align-items-lg-start align-items-center text-lg-start text-center flex-lg-row flex-column p-5">
            <div class="footer-menu">
                <h5>Menu</h5>
                <a class="d-block text-light text-decoration-none" href="">Home</a>
                <a class="d-block text-light text-decoration-none" href="">Anime</a>
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