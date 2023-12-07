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
$stmt = $mysqli->prepare("SELECT id, username, email, admin_pass, admin_name FROM site_settings ORDER BY id ASC LIMIT 1");
$stmt->execute();
$stmt->bind_result($id, $dbUsername, $dbEmail, $dbPassword, $adminName);
$stmt->fetch();
$stmt->close();

$loginPage = '../login.php';

if ($userName === $dbUsername || $userName === $dbEmail) {
    if ($password === $dbPassword) {
        $_SESSION['loggedin'] = 'True';
        $_SESSION['logged_userid'] = $id;
        $_SESSION['logged_username'] = $dbUsername;
        $_SESSION['logged_useremail'] = $dbEmail;
        $_SESSION['logged_userfullname'] = $adminName;
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['error_message'] = 'Login Credential Does Not Match';
    }
} else {
    $_SESSION['error_message'] = 'Login Credential Does Not Match';
}


header('Location: ' . $loginPage);
exit();
