<?php
    session_start();
    require "conn.php";
    $id = $_GET["id"];
    if(delete($id) > 0) {
        $_SESSION["successDelete"] = true;
        header("Location: anime.php");
        exit;
    }
?>