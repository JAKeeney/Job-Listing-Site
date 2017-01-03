<?php
session_start();
    if(!isset($_SESSION['id'])){
        echo '<form action="/login.php">
        <button type="submit">Log in</button>
        </form>';
    } else {
        echo '<form action="/admin.php">
        <button type="submit">Admin Controls</button>
        </form>';
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>
            table {border-collapse:collapse; min-width:300px; max-width:800px;}
            table td {border:solid 1px; word-wrap:break-word;}
        </style>
    </head>
    <body>
        <p><h3>JOBS</h3></p>
        
            
            <?php
            
                include 'private/db.php';

                $sql_data = "SELECT * FROM jobs ORDER BY id ASC";
                $results = mysqli_query($conn, $sql_data);
                $jobs = "";
                
                if(mysqli_num_rows($results) > 0) {
                    ?>
                    <table>
                        <tr>
                            <th>&ensp; ID &ensp;</th>
                            <th>&ensp; Job Title &ensp;</th>
                            <th>&ensp; Start Date &ensp;</th>
                            <th>&ensp; End Date &ensp;</th>
                            <th>&ensp; Job Description &ensp;</th>
                        </tr>
                        <?php
                        
                        while($row = mysqli_fetch_assoc($results)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $start = $row['start'];
                            $end = $row['end'];
                            $description = $row['description'];

                            $jobs .=

                            "<tr>
                                <td>$id</td>
                                <td>$title</td>
                                <td>$start</td>
                                <td>$end</td>
                                <td>$description</td>
                            </tr>";
                        }
                    echo $jobs;
                } else {
                    echo "<p>No jobs have been listed.</p>";
                }
            ?>
        </table>
    </body>
</html>