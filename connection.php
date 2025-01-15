<?php
    $dbhost = "CHANGE_THIS"; //Generally, this will be localhost
    $dbuser = "CHANGE_THIS";
    $dbpass = "CHANGE_THIS";
    $dbname = "data";
    $dbport = 3306; //3306 by default

    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

    if (!$con) {
        die("Connection failure");
    }

?>
