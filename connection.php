<?php
    $servername = "localhost";
    $username = "username";
    $password = "$password";
    $db_name = "data";
    $port = 3306; //3306 by default

    $conn = new mysqli($servername, $username, $password, $db_name);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    } else {
        //echo "Connecton Successful";
    }
?>
