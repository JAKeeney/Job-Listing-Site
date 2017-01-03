<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: /login.php");
        exit();
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
        <p><h1>ADMIN CONTROLS</h1></p>
        
        <p>
            <button type="button" onclick="loadPanel('api/newjob.php');">Add job</button>

            <?php
            include 'private/db.php';

            $query = "SELECT * FROM jobs";
            $result = mysqli_query($conn, $query);
            $rows = mysqli_fetch_assoc($result);

            if ($rows['id']) { ?>
            <button type="button" onclick="loadPanel('api/deletejob.php');">Delete job</button>
            <button type="button" onclick="loadPanel('api/editjob.php');">Edit job</button>
            <?php } ?>
            <button type="button" onclick="location.href='api/logout.php'">Log out</button>
        </p>
        
        <div id="panel"></div>
        
        <?php
        if ($rows['id']) { ?>
            <table>
                <tr>
                    <th>&ensp; ID &ensp;</th>
                    <th>&ensp; Job Title &ensp;</th>
                    <th>&ensp; Start Date &ensp;</th>
                    <th>&ensp; End Date &ensp;</th>
                    <th>&ensp; Job Description &ensp;</th>
                </tr>

                <form>
                <?php

                $sql_data = "SELECT * FROM jobs ORDER BY id ASC";
                $results = mysqli_query($conn, $sql_data);

                if(mysqli_num_rows($results) > 0) {
                    while($row = mysqli_fetch_assoc($results)) {
                        ?> 
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['title']?></td>
                            <td><?php echo $row['start']?></td>
                            <td><?php echo $row['end']?></td>
                            <td><?php echo $row['description']?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </form>
            </table>
        <?php } else { echo "No jobs have been listed.";} ?>
        
        <script>
            function loadPanel(panel) {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("panel").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", panel, true);
                xhttp.send();
            }

            function clearPanel() {
                document.getElementById("panel").innerHTML = "";
            }

            function deleteJob() {
                var xhttp = new XMLHttpRequest();
                var jobid = document.getElementById("jobid").value;

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("panel").innerHTML = this.responseText;
                        
                        if (this.responseText == "true"){
                            location.reload();
                        }
                    }
                };
                xhttp.open("GET", "api/deletejob.php?jobid=" + jobid, true);
                xhttp.send();
            }
            
            function editJob() {
                var xhttp = new XMLHttpRequest();
                var jobid = document.getElementById("jobid").value;

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("panel").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "api/editjob.php?jobid=" + jobid, true);
                xhttp.send();
            }   
        </script>
    </body>
</html>
