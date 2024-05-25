<?php

$connect = mysqli_connect( 
    "localhost", // Host
    "root", // Username
    "root", // Password
    "ksc_deploy" // Database
);

mysqli_set_charset( $connect, 'UTF8' );
