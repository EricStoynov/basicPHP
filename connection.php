<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "4522";
    $dbname = "data";
    $dbport = 3306; //3306 by default

    $con = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

    if (!$con) {
        die("Connection failure");
    }

?>