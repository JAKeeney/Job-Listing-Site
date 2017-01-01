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
        <h1>DELETE PANEL</h1><br/>
        Please enter the ID of the job you wish to delete. <br/><br/>
        <form action="deletethis.php" method="post">
            ID: <input type="number" min="1" name="jobid"/>
            <button type="submit">Delete</button>
            <button type="submit" formaction="admin.php">Go Back</button>
        </form>
        <?php
            include 'db.php';
        ?>
        <br/>
        <h3>JOBS</h3>
        <table align="left" border='1'>
            <tr>
                <th>ID</th>
                <th>Job Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Job Description</th>
            </tr>

            <?php

                include 'db.php';

                $sql_data = "SELECT * FROM jobs ORDER BY id ASC";
                $results = mysqli_query($conn, $sql_data);
                $jobs = "";

                if(mysqli_num_rows($results) > 0) {
                    while($row = mysqli_fetch_assoc($results)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $start = $row['start'];
                        $end = $row['end'];
                        $description = $row['description'];

                        $names .=

                        "<tr>
                            <td>$id</td>
                            <td>$title</td>
                            <td>$start</td>
                            <td>$end</td>
                            <td>$description</td>
                        </tr>";
                    }
                    echo $names;
                } else {
                    echo "No jobs have been listed.";
                }
                
            ?>
        </table>
    </body>
</html>
