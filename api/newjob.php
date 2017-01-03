<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: /login.php");
        exit();
    }
?>

<form action="api/addjob.php" method="post">
    <p><h3>ADD PANEL</h3></p>
    <fieldset>

        <p>
        <label>Job title: </label>
        <input type="text" name="title" maxlength="50"/>
        </p>

        <p>
        <label>Start date: </label>
        <input type="text" name="start" maxlength="50"/>
        </p>

        <p>
        <label>End date: </label>
        <input type="text" name="end" maxlength="50"/>
        </p>

        <p>
        <label>Job Description: </label>
        <textarea name="description" rows="4" cols="50" maxlength="500"></textarea>
        </p>

        <button type="submit">Enter Job</button>
        <button type="button" onclick="clearPanel();">Cancel</button>

    </fieldset>
</form>