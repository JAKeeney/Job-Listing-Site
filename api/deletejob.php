<?php

session_start();
if(!isset($_SESSION['id'])){
    header("Location: /login.php");
    exit();
}

include(dirname(__FILE__) . '/../private/db.php');

$deletemessage = "Please enter the ID of the job you wish to delete";

if (isset($_GET['jobid'])) { //Job ID should already be set
    $jobid = $_GET['jobid'];
    
    if (is_numeric($jobid)) { //Job IDs should only be numeric
        $query = "SELECT * FROM jobs WHERE id = " . $jobid . " LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) > 0) { //Entered ID matches ID in database
            $query = "DELETE FROM jobs WHERE id = '$jobid'";
            $result = mysqli_query($conn, $query);
            echo "true";
            exit();
        } else {
            $deletemessage = "No job with the ID " . $jobid . " was found. Please try again.";
        }
    } else {
        $deletemessage = "Invalid ID. Please try again.";
    }
}

?>

<p><h3>DELETE PANEL</h3></p>

<p><?php echo $deletemessage; ?></p>

<p>
    ID: <input type="number" value="<?php echo $jobid; ?>" min="1" id="jobid"/>
    <button type="button" onclick="deleteJob();">Delete</button>
    <button type="button" onclick="clearPanel();">Go Back</button>
</p>