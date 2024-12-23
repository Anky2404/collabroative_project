<?php

//start session
session_start();

// Create database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'collabroative';

// Make connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    //show error message
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
