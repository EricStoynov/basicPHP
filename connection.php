<?php
    $dbhost = "localhost";
    $dbuser = "username"; //Generally root by default
    $dbpass = "password";
    $dbname = "data";
    $dbport = 3306; //3306 by default

    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

    if (!$con) {
        die("Connection failure");
    }

?>
