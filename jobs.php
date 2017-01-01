<?php
session_start();
    if(!isset($_SESSION['id'])){
        echo '<form action="login.php">
        <button type="submit">Log in</button>
        </form>';
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>JOBS</h3>
        <table border='1'>
            <tr>
                <th> ID </th>
                <th> Job Title </th>
                <th> Start Date </th>
                <th> End Date </th>
                <th> Job Description </th>
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
                    echo "No jobs have been listed. <br/><br/>";
                }
            ?>
        </table>
    </body>
</html>
