<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }

    include 'db.php';

    $id = mysqli_escape_string($conn, $_POST['id']);
    $title = mysqli_escape_string($conn, $_POST['title']);
    $start = mysqli_escape_string($conn, $_POST['start']);
    $end = mysqli_escape_string($conn, $_POST['end']);
    $description = mysqli_escape_string($conn, $_POST['description']);

    $sql = "UPDATE jobs SET title='$title',start='$start',end='$end',description='$description'
            WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    header("Location: admin.php")

?>