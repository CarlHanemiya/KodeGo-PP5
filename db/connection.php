<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "ollcflibsysdb";
    
    $connection = mysqli_connect($servername, $username, $password, $db_name);

    if ($connection) {
       // echo "Connected Successfully!";
    } else {
        header("Location: 500.php");
    }
?>