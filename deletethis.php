<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }

    include 'db.php';

    $id = $_POST['jobid'];
    echo $id;
    
    $sql = "SELECT id FROM jobs WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        $sql = "DELETE FROM jobs
        WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        header("Location: admin.php");
    } else {
        $_SESSION['msg'] = "Could not find a job with that ID.";
        header("Location: admin.php");
    }
    
    
?>