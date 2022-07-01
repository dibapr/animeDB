<script src="jquery/dist/jquery.min.js"></script>
<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<?php
    //connect into database
    $conn = mysqli_connect("localhost", "root", "", "animek");

    function query($kueri) {
        global $conn;
        $result = mysqli_query($conn, $kueri);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //account register
    function regist($data) {
        global $conn;
        $username = strtolower(stripslashes($data["username"])); 
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        
        //check if username already exist or not
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('This username has already registered!');
                    </script>";
            return false;
        }
        //check password confirmation
        if($password !== $password2) {
            echo "<script>
                    alert('Confirmation doesnt match!');
                    </script>";
            return false;
        } 
        //password encryption
        $password = password_hash($password, PASSWORD_DEFAULT);
        //add new user into database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
        return mysqli_affected_rows($conn);        
    }   

    
    
    
    //add anime
    function add($data) {
        global $conn;
        
        //image upload through function upload()
        $image = upload();
        if(!$image) {
            return false;
        }
        
        $title = htmlspecialchars($data["title"]);
        $genres = $data["genre"];
        $desc = htmlspecialchars($data["desc"]);
        $date = htmlspecialchars($data["date"]);
        //multiple checkbox
        $genre = implode(', ' , $genres);
        $query = "INSERT INTO anime VALUES ('', '$image', '$title', '$genre', '$date', '$desc')";
        mysqli_query($conn, $query);
        //returning '1' value
        return mysqli_affected_rows($conn);
    }

    //uploading image
    function upload() {
        $imgName = $_FILES['image']['name'];
        $imgSize = $_FILES['image']['size'];
        $imgError = $_FILES['image']['error'];
        $imgTMP = $_FILES['image']['tmp_name'];

        //check if there's no image uploaded
        if($imgError === 4) {  // '4' means there's no file uploaded 
            echo "<script>
                    alert('You forgot to upload the file!');
                    </script>";
            return false;
        }

        //check if the  image file size is too large
        if($imgSize > 5000000) {
            echo "<script>
                    alert('The file you uploaded is too large!');
                    </script>";
            return false;
        }
        
        //check if the uploaded file is an image
        $validImg = ['jpg', 'png', 'jpeg'];
        $extImg = explode('.', $imgName);
        $extImg = strtolower(end($extImg));
        if(!in_array($extImg, $validImg)) {
            echo "<script>
            alert('The file is not an image!');
            </script>";
        }
        
        //generate new image file name to prevent similiar name
        $newImage = uniqid();
        $newImage .= '.';
        $newImage .= $extImg;

        //upload the image if passed the check
        move_uploaded_file($imgTMP, 'assets/' . $newImage);
        return $newImage;

    }
    
    //edit anime
    function edit($data) {
        global $conn;
        $id = $data["id"];
        $currentImg = htmlspecialchars($data["currentImage"]);
        $title = htmlspecialchars($data["title"]);
        $genres = $data["genre"];
        $date = htmlspecialchars($data["date"]);
        $desc = htmlspecialchars($data["desc"]);
        //multiple checkbox
        $genre = implode(', ' , $genres);
        // check if user updating new image or not
        if($_FILES["image"] === 4) {
            $image = $currentImg;
        } else {
            //DELETING IMAGE FROM DIRECTORY
            $result = mysqli_query($conn, "SELECT image from anime WHERE id = $id");
            $file = mysqli_fetch_assoc($result);
            $fileName = implode('.' , $file);
            $location = "assets/$fileName";
            
            if(file_exists($location)) {
                unlink('assets/' . $fileName);
            }
            
            $image = upload();

        }
        
        $query = "UPDATE anime SET title = '$title', genre = '$genre', image = '$image', date = '$date', desc = '$desc' WHERE id = $id";

        mysqli_query($conn, $query);
        //returning '1' value
        return mysqli_affected_rows($conn);
    }
    
    //delete anime
    function delete($id) {
        global $conn;

        //DELETING IMAGE FROM DIRECTORY
        $result = mysqli_query($conn, "SELECT image from anime WHERE id = $id");
        $file = mysqli_fetch_assoc($result);
        $fileName = implode('.' , $file);
        $location = "assets/$fileName";
        if(file_exists($location)) {
            unlink('assets/' . $fileName);
        }
        
        mysqli_query($conn, "DELETE FROM anime WHERE id = $id");
        return mysqli_affected_rows($conn);
    }

?>