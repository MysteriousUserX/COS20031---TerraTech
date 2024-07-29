<?php

include_once("settings.php");

    // Create connection to the database
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    //Check for connection
    if (!$conn) {
        die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
    }