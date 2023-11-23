<?php
session_start();
include '../../configuration.php';

$userName = $_POST['username'];
$password = $_POST['password'];

if ($userName == '' || $password == '') {
    $_SESSION['error_message'] = 'Please fill all the mendetory feild';
    header('Location: ../login.php');
    exit();
}

// Login Start 