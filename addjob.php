<?php

    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }
    
    include 'db.php';

    $title = mysqli_escape_string($conn, $_POST['title']);
    $start = mysqli_escape_string($conn, $_POST['start']);
    $end = mysqli_escape_string($conn, $_POST['end']);
    $description = mysqli_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO jobs (title, start, end, description) 
    VALUES ('$title', '$start', '$end', '$description')";
    $result = mysqli_query($conn, $sql);

    header("Location: admin.php")

?>