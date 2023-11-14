<?php
session_start();
include '../../configuration.php';

$heading = $_POST['heading'];
$content = $_POST['comment'];
$editId = $_POST['editId'];
$isError = true;
if ($content == '' || $heading == '') {
    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';
    header('Location: ../services.php');
    exit;
}

if ($editId == 0) {
    // Insert
    $sql = "INSERT INTO services (`heading`, `content`) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $heading, $content);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $isError = false;
            $editId = mysqli_insert_id($con);
            $_SESSION['success_message'] = 'Services Inserted Successfully';
        } else {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // Update
    $sql = "UPDATE services SET `heading` = ?, `content` = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssi', $heading, $content, $editId);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        } else {
            $isError = false;
            $_SESSION['success_message'] = 'Services Updated Successfully';
        }
        mysqli_stmt_close($stmt);
    } else {
        $editId = 0;
        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
    }
}

if (!empty($_FILES['feature_image']) && is_uploaded_file($_FILES['feature_image']['tmp_name'])) {
    if (!$isError) {
        $uploadDir = '../assets/images/services/';
        $name = 'services_' . $editId;
        $filename = $_FILES['feature_image']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadFile = $name .  '.' . $extension;

        $imageInfo = getimagesize($_FILES['feature_image']['tmp_name']);
        if ($imageInfo !== false) { // Check if it's a valid image
            $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (in_array($imageInfo[2], $allowedTypes)) {
                $newHeight = 262;
                list($origWidth, $origHeight) = getimagesize($_FILES['feature_image']['tmp_name']);
                $newWidth = $newHeight * ($origWidth / $origHeight);
                if ($extension == 'jpg' || $extension === 'jpeg') {
                    $image = imagecreatefromjpeg($_FILES['feature_image']['tmp_name']);
                } else {
                    $image = imagecreatefrompng($_FILES['feature_image']['tmp_name']);
                }
                // $newHeight = imagesy($image) * ($newWidth / imagesx($image));
                $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresized($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

                $resizedFilePath = $uploadDir . $uploadFile;
                imagejpeg($resizedImage, $resizedFilePath);

                imagedestroy($image);
                imagedestroy($resizedImage);

                if ($editId != 0) {
                    // Use prepared statement to update the image filename
                    $sql2 = 'UPDATE services SET `image` = ? WHERE id = ?';
                    $stmt = mysqli_prepare($con, $sql2);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, 'si', $uploadFile, $editId);
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
}
// echo mysqli_error($con);
header('Location: ../services.php');
exit();
