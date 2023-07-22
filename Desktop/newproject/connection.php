<?php

    $conn = mysqli_connect("localhost","root","","apnabook");

    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // else{
    //     echo "connection secured";
    // }



?>