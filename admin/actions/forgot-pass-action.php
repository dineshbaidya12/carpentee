<?php
session_start();
include '../../configuration.php';
$answers = [];
for ($i = 1; $i <= 3; $i++) {
    $answers[] = $mysqli->real_escape_string($_POST["answer$i"] ?? '');
}

for ($i = 0; $i < 3; $i++) {
    $sql = "SELECT * FROM forgot_password ORDER BY id ASC";
    $result = mysqli_query($con, $sql);
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $answer1 = $row['answer'];
        if ($row['answer'] != $answers[$row['id'] - 1]) {
            $_SESSION['error_message'] = 'Answer Does Not Match';
            header('Location: ../forgot-password.php');
            exit;
        } else {
            $i++;
        }
    }

    if ($i === 3) {
        $_SESSION['loggedin'] = 'True';
        $_SESSION['logged_userid'] = 1;
        $_SESSION['logged_username'] = '';
        $_SESSION['logged_useremail'] = '';
        $_SESSION['logged_userfullname'] = '';
        $_SESSION['forgot_pass'] = 'Yes';
        header('Location: ../site-settings.php');
        exit;
    }
}
