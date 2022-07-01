<?php
    session_start();
    require 'conn.php';
    $anime = query("SELECT * FROM anime");
    
    if(isset($_POST["submit"])) {
        if(edit($_POST) > 0) {
            echo "<script>
                    alert('Your anime has been successfully updated!');
                    </script>";
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
    <style>@import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');</style>
    <link rel="stylesheet" href="css/anime.css">
    <link rel="stylesheet" href="bootstrap-icons/font/bootstrap-icons.css">    
    <title>Anime</title>
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
                        <a class="nav-link text-white"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="anime.php">Anime</a>
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
    <div class="d-flex justify-content-end mt-3 container">
        <?php
            if(isset($_SESSION["login"])) { ?>
                <a href="add.php" class="btn btn-primary"><i class="bi bi-plus-circle pe-2"></i>Add Anime</a>
        <?php } ?>
       
    </div>
    <div class="d-flex container justify-content-evenly flex-wrap gap-3">
        <?php
            //fetch anime from database
            foreach($anime as $row) :
        ?>
        <div class="row">
            <div class="card col col-md-2 col-lg mx-4 my-4" style="width: 18rem;">
                <center><img src="assets/<?= $row["image"] ?>" class="card-img-top mt-3" alt="..."></center>
                <div class="card-body">
                    <h5 class="card-title"><?= $row["title"] ?></h5>
                    <p class="card-text"><?= $row["desc"] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Genre: <?= $row["genre"] ?></li>
                    <li class="list-group-item">Release Date: <?= $row["date"] ?></li>
                    <?php
                        if(isset($_SESSION["login"])) { ?>

                        <li class="list-group-item align-self-center">
                            <!-- Button trigger modal UPDATE -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editAnime<?= $row['id'] ?>"><i class="bi bi-pencil-square pe-2"></i>Edit</button>
                            <!-- Modal UPDATE -->
                            <div class="modal fade" id="editAnime<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit this Anime</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                        <div class="modal-body mx-3">
                                            <form name="form" action="" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                                                <input type="hidden" name="currentImage" value="<?= $row["image"]; ?>">
                                                <div class="title mb-3">
                                                    <label for="title">Title:</label>
                                                    <input class="form-control" type="text" value="<?= $row['title']; ?>" name="title" id="title" placeholder="Input the title" aria-label="default input example">
                                                </div>
                                                <div class="image d-flex align-items-center justify-content-around mb-3">
                                                    <div class="currentImage">
                                                        <p>Current image:</p>
                                                        <img src="assets/<?= $row["image"]; ?>" alt="">
                                                    </div>
                                                    <div class="newImage">
                                                        <label for="formFile" class="form-label">New image:</label>
                                                        <input class="form-control" type="file" value="<?= $row['image']; ?>" name="image" id="formFile" accept=".jpg, .jpeg, .png">
                                                    </div>
                                                </div>
                                                <div class="desc mb-3">
                                                    <label for="desc">Description:</label>
                                                    <textarea class="form-control" style="resize: none;" name="desc" id="exampleFormControlTextarea1" rows="3"  placeholder="Input the description"><?= $row['desc']; ?>"</textarea>
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
                                                    <input class="form-control" type="date" name="date" id="date" value="<?= $row['date'] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="delete.php?id=<?= $row["id"]; ?>" id="delete" class="btn btn-danger"><i class="bi bi-trash3 pe-2"></i>Delete</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php
            endforeach;
        ?>
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