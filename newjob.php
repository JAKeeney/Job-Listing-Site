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
        <form action="addjob.php" method="post">
            <fieldset>
                <legend>New Job</legend>
                <p>
                    <label>Job title: </label>
                    <input type="text" name="title" maxlength="50" />
                </p>
                <p>
                    <label>Start date: </label>
                    <input type="text" name="start" maxlength="50" />
                </p>
                <p>
                    <label>End date: </label>
                    <input type="text" name="end" maxlength="50" />
                <p>
                    <label>Job Description: </label>
                    <textarea name="description" rows="4" cols="50" maxlength="500"></textarea>
                </p>
                <button type="submit">Enter Job</button>
                <button type="submit" formaction="admin.php">Go Back</button>
            </fieldset>
	</form>
    </body>
</html>
