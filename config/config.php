<?php
    $databaseHost = 'localhost';
    $databaseUsername = 'root';
    $databaseName = 'dumbbell';
    $databasePassword = '';

    $conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die('Connection Failed.');
    
?>