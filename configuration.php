<?php

$databaseName = 'furniture';
$host = 'localhost';
$userName = 'root';
$password = '';

$con = mysqli_connect($host, $userName, $password, $databaseName);
$mysqli = new mysqli($host, $userName, $password, $databaseName);
if (!$con || $mysqli->connect_error) {
    die('Connection could not be established because of ' . mysqli_error($con));
}