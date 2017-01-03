<?php
    
    if (isset($_POST['username'])) {
        include 'private/db.php';
        
        //NOTE: Password is md5 hashed. Store in database as md5 hash.
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        if($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['id'] = session_id();
            header("Location: /admin.php");
        } else {
            echo "<p>Incorrect login details.</p>";
        }
    }

?>

<html>
    <body>
        <form method="post" action="/login.php">
	    <p> Username: <input type="text" name="username"/> </p>
	    <p> Password: <input type="password" name="password"/> </p>
            <p>
                <input type="submit" name="submit" value="Log In"/>
                <button type="submit" formaction="/jobs.php">View job list</button>
            </p>
	</form>
    </body>
</html>