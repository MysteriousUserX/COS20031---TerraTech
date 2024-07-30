<?php

include_once("settings.php");

    // Create connection to the database
    $conn = new mysqli($host, $user, $pwd, $sql_db);

    //Check for connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }