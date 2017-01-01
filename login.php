<?php
    
    if (isset($_POST['username'])) {
        include 'db.php';
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        if($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['id'] = session_id();
            header("Location: admin.php");
        } else {
            echo "Incorrect login details.";
        }
        
    }


?>



<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="login.php">
	    Username: <input type="text" name="username"/> <br/><br/>
	    Password: <input type="password" name="password"/> <br/><br/>
	    <input type="submit" name="submit" value="Log In"/>
            <button type="submit" formaction="jobs.php">View job list</button>
	</form>
    </body>
</html>