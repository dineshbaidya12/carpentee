<?php

session_start();

include '../../configuration.php';



$adminName = $_POST['admin_name'];

$userName = $_POST['username'];

$email = $_POST['email'];

$contactEmail = $_POST['contact_email'];

$password = $_POST['password'];

$phone = $_POST['phone'];

$fb = $_POST['facebook'];

$insta = $_POST['instagram'];

$tweet = $_POST['tweeter'];

$yt = $_POST['youtube'];

$siteName = $_POST['site_name'];

$siteTitle = $_POST['site_title'];

$location = $_POST['location'];

$lat = $_POST['latitude'];

$long = $_POST['longitute'];

$comanyDesc = $_POST['comany_desc'];

$whattsapp = $_POST['whattsapp'];

if (!is_numeric($whattsapp)) {

    $whattsapp = '0';
}



if ($adminName == '' || $userName == '' || $email == '' || $password == '' || $phone == '' || $siteName == '' || $siteTitle == '' || $location == '' || $lat == '' || $lat == '') {

    $_SESSION['error_message'] = 'Please fill all the mendetory feild';

    header('Location: ../site-settings.php');

    exit();
}



$query = $mysqli->query("SELECT id FROM site_settings ORDER BY id ASC LIMIT 1");



if ($query) {

    $result = $query->fetch_assoc();

    $id = $result['id'];



    $query = "UPDATE site_settings SET site_name = \"$siteName\", site_title = \"$siteTitle\", admin_name = \"$adminName\", username = \"$userName\", admin_pass = \"$password\", email = \"$email\", contact_email = \"$contactEmail\", phone = \"$phone\", `location` = \"$location\", small_desc = \"$comanyDesc\", latitute = \"$lat\", longitute = \"$long\", fb = \"$fb\", insta = \"$insta\", tweet = \"$tweet\", youtube = \"$yt\", whattsapp = $whattsapp WHERE id = $id";





    if (mysqli_query($mysqli, $query)) {

        $_SESSION['success_message'] = 'Data Inserted Successfully';
    } else {

        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);

        header('Location: ../site-settings.php');

        exit();
    }
} else {

    $query = "INSERT INTO site_settings (site_name, site_title, admin_name, username, admin_pass, email, phone, `location`, small_desc, latitute, longitute, fb, insta, tweet, youtube, whattsapp) VALUES (\"$siteName\", \"$siteTitle\", \"$adminName\", \"$userName\", \"$password\", \"$email\", \"$phone\", \"$location\", \"$comanyDesc\", \"$lat\", \"$long\", \"$fb\", \"$insta\", \"$tweet\", \"$yt\", \"$whattsapp\")";



    if (mysqli_query($mysqli, $query)) {

        $id = mysqli_insert_id($mysqli);

        $_SESSION['success_message'] = 'Data Updated Successfully';
    } else {

        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);

        header('Location: ../site-settings.php');

        exit();
    }
}



if (!empty($_FILES['profile_picture']) && is_uploaded_file($_FILES['profile_picture']['tmp_name'])) {

    $uploadDir = '../assets/images/admin-details/';

    $name = str_replace(' ', '_', $userName);

    $filename = $_FILES['profile_picture']['name'];

    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $uploadFile = 'admin_1.jpg';



    $imageInfo = getimagesize($_FILES['profile_picture']['tmp_name']);

    if ($imageInfo !== false) { // Check if it's a valid image

        $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

        if (in_array($imageInfo[2], $allowedTypes)) {

            $newWidth = 300;

            $newHeight = 300;



            list($origWidth, $origHeight) = getimagesize($_FILES['profile_picture']['tmp_name']);



            if ($extension == 'jpg' || $extension === 'jpeg' || $extension == 'JPG') {

                $image = imagecreatefromjpeg($_FILES['profile_picture']['tmp_name']);
            } else {

                $image = imagecreatefrompng($_FILES['profile_picture']['tmp_name']);
            }



            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            imagecopyresized($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);



            $resizedFilePath = $uploadDir . $uploadFile;

            imagejpeg($resizedImage, $resizedFilePath);



            imagedestroy($image);

            imagedestroy($resizedImage);



            if ($id != 0) {

                // Use prepared statement to update the image filename

                $sql2 = 'UPDATE site_settings SET `admin_img` = ? WHERE id = ?';

                $stmt = mysqli_prepare($con, $sql2);



                if ($stmt) {

                    mysqli_stmt_bind_param($stmt, 'si', $uploadFile, $id);

                    $result2 = mysqli_stmt_execute($stmt);



                    if (!$result2) {

                        $_SESSION['success_message'] .= ' But unable to upload profile picture becouse - ' . mysqli_error($con);
                    }

                    mysqli_stmt_close($stmt);
                } else {

                    $_SESSION['success_message'] .= ' But unable to upload profile picture becouse - ' . mysqli_error($con);
                }
            }
        }
    }
}

// echo mysqli_error($con);

header('Location: ../site-settings.php');

exit();
