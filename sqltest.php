<?php

    include 'db.php';
    
    $teststring = "test</br>test2/\/\/\/\/\test3/n\n/t\t/r\rtest4'`test5";
    echo $teststring;
    echo '<br/><br/>';
    $teststring = strip_tags(mysqli_real_escape_string($conn, $teststring));
    
    echo $teststring;

?>