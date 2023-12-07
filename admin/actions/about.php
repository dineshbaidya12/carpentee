<?php
session_start();
include '../../configuration.php';

$shortContent = $_POST['short_content'];
$content = $_POST['main_content'];
$image = $_FILES['feature_image'];
if ($shortContent == '' || $content == '') {
    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';
    header('Location: ../about-us.php');
    exit;
}
$checkSql = "SELECT * FROM about WHERE id=1";
$resultSql = mysqli_query($con, $checkSql);

if (mysqli_num_rows($resultSql) > 0) {
    $editId = 1;
} else {
    $editId = 0;
}

// echo $editId;
// exit;
if ($editId == 0) {
    // Insert
    $sql = "INSERT INTO about (`id`, `content`, `short_content`) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'iss', 1, $content, $shortContent);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $isError = false;
            $editId = mysqli_insert_id($con);
            $_SESSION['success_message'] = 'About Section Inserted Successfully';
        } else {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // Update
    $sql = "UPDATE about SET `content` = ?, `short_content` = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssi', $content, $shortContent, $editId);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        } else {
            $isError = false;
            $_SESSION['success_message'] = 'About Section Updated Successfully';
        }
        mysqli_stmt_close($stmt);
    } else {
        $editId = 0;
        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
    }
}

if (!empty($_FILES['feature_image']) && is_uploaded_file($_FILES['feature_image']['tmp_name'])) {
    if (!$isError) {
        $uploadDir = '../assets/images/about/';
        $filename = $_FILES['feature_image']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadFile = 'about-img.jpg';

        $imageInfo = getimagesize($_FILES['feature_image']['tmp_name']);
        if ($imageInfo !== false) {
            $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (in_array($imageInfo[2], $allowedTypes)) {
                $newWidth = 972;
                $newHeight = 648;
                list($origWidth, $origHeight) = getimagesize($_FILES['feature_image']['tmp_name']);
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
                    $sql2 = 'UPDATE about SET `image` = ? WHERE id = ?';
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
header('Location: ../about-us.php');
exit();
