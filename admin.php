<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.php");
        exit();
    }
    
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table {border-collapse:collapse; min-width:300px; max-width:800px;}
            table td {border:solid 1px; word-wrap:break-word;}
            }
        </style>
    </head>
    <body>
        <h1>ADMIN PANEL</h1>
        <form action="newjob.php">
        <button type="submit">Add job</button>
        <?php
        include 'db.php';
        
        $query = "SELECT * FROM jobs";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_assoc($result);
        
        if ($rows['id']) { 
        echo '<button type="submit" formaction="deletejob.php">Delete job</button> ';
        echo '<button type="submit" formaction="editjob.php">Edit job</button>';
        }
        ?>
        <button type="submit" formaction="logout.php">Log out</button>
        </form>
        
        <br/>
        <h3>JOBS</h3>
        <table>
            <tr>
                <th> ID </th>
                <th> Job Title </th>
                <th> Start Date </th>
                <th> End Date </th>
                <th> Job Description </th>
                <th> </th>
            </tr>
            <form action="deletejob.php">
            <?php
            
                include 'db.php';
                
                $sql_data = "SELECT * FROM jobs ORDER BY id ASC";
                $results = mysqli_query($conn, $sql_data);
                $jobs = "";
                
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
                } else {
                    echo "No jobs have been listed. <br/><br/>";
                }
            ?>
            </form>
        </table>
        
        <script type="text/javascript">
            function insert()
            {
                xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET, "ajax)
            }
    </body>
</html>
