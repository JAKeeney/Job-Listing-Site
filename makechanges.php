<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'db.php';
        
        $id = $_POST['jobid'];
        
        $query = "SELECT * FROM jobs WHERE id = '$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $start = $row['start'];
            $end = $row['end'];
            $description = $row['description'];
        } else {
            $_SESSION['msg'] = "Could not find a job with that ID.";
            header("Location: admin.php");
        }
        
        ?>
        <form action="pushedits.php" method="post">
            <fieldset>
                <legend>Edit Job</legend>
                <input type="hidden"
                       value="<?php echo $id ?>"
                       name="id" />
                <p>
                    <label>Job title: </label>
                    <input type="text"
                           name="title"
                           maxlength="50"
                           value="<?php echo $title ?>" />
                </p>
                <p>
                    <label>Start date: </label>
                    <input type="text"
                           name="start"
                           maxlength="50"
                           value="<?php echo $start ?>" />
                </p>
                <p>
                    <label>End date: </label>
                    <input type="text"
                           name="end"
                           maxlength="50"
                           value="<?php echo $end ?>" />
                <p>
                    <label>Job Description: </label>
                    <textarea name="description"
                              rows="4"
                              cols="50"
                              maxlength="500"><?php echo $description ?></textarea>
                </p>
                <button type="submit">Save Edits</button>
                <button type="submit" formaction="admin.php">Go Back</button>
            </fieldset>
	</form>
    </body>
</html>