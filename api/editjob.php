<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: /login.php");
        exit();
    }
    
    include(dirname(__FILE__) . '/../private/db.php');
    
    $job = null;
    
    $editmessage = "Please enter the ID of the job you wish to edit";
    
    if (isset($_GET['jobid'])) { //Job ID should already be set
        $jobid = $_GET['jobid'];
        
        if (is_numeric($jobid)) { //Job IDs should only be numeric
            $query = "SELECT * FROM jobs WHERE id = " . $jobid . " LIMIT 1";
            $result = mysqli_query($conn, $query);
            
            if(mysqli_num_rows($result) > 0) { //Entered ID matches ID in database
                $job = mysqli_fetch_assoc($result);
            } else {
                $editmessage = "No job with the ID " . $jobid . " was found. Please try again.";
            }
        } else {
            $editmessage = "Invalid ID. Please try again.";
        }
    }
?>

<p><h3>EDIT PANEL</h3></p>

<p><?php echo $editmessage; ?></p>

<p>
    ID: <input type="number" value="<?php echo $jobid; ?>" min="1" id="jobid"/>
    <button type="button" onclick="editJob();">Edit</button>
    <button type="button" onclick="clearPanel();">Cancel</button>
</p>

<?php
if ($job != null) { //Spawn an edit panel if above for loops found a matching ID
    $editmessage = ""
    ?>
    <form action="api/pushedits.php" method="post">
       <fieldset>
           
            <p>
                <legend>Edit Job</legend>
                <input type="hidden" name="id" value="<?php echo $job['id']; ?>"/>
            </p>
            
            <p>
                <label>Job title: </label>
                <input type="text" name="title" maxlength="50" value="<?php echo $job['title']; ?>"/>
            </p>
            
            <p>
                <label>Start date: </label>
                <input type="text" name="start" maxlength="50" value="<?php echo $job['start']; ?>"/>
            </p>
            
            <p>
                <label>End date: </label>
                <input type="text" name="end" maxlength="50" value="<?php echo $job['end']; ?>"/>
            </p>
               
            <p>
                <label>Job Description: </label>
                <textarea name="description" rows="4" cols="50" maxlength="500"><?php echo $job['description']; ?></textarea>
            </p>
            
           <button type="submit">Save Edits</button>
           
        </fieldset>
    </form>
    <?php
} ?>