<?php
session_start();
include '../../configuration.php';

$ProjectName = $_POST["prject_name"] ?? '';
$description = $_POST["description"] ?? '';
$inputDate = $_POST["input_date"] ?? '';
$inputStatus = $_POST["input_status"] ?? '';
$featureImage = $_FILES["feature_image"] ?? '';
$editId = $_POST["editId"] ?? 0;

if ($ProjectName  == "" || $description == "" || $input_date == "" || $inputStatus == "") {
    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';
    header('Location: ../projects.php');
    exit;
} else {
    if (!empty($_FILES['feature_image']) && is_uploaded_file($_FILES['feature_image']['tmp_name'])) {
        $_SESSION['error_message'] = 'Please Select a Feature Image';
        header('Location: ../projects.php');
        exit;
    }
}

if ($editId == 0) {
    // Insert
    $sql = "INSERT INTO projects (`name`, `details`, `status`, `created_date`) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $ProjectName, $description, $inputStatus, $inputDate);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $isError = false;
            $editId = mysqli_insert_id($con);
            $_SESSION['success_message'] = 'Projects Inserted Successfully';
        } else {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // Update
    $sql = "UPDATE projects SET `name` = ?, `details` = ?, `status` = ?, `created_date` = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssi', $ProjectName, $description, $inputStatus, $inputDate, $editId);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        } else {
            $isError = false;
            $_SESSION['success_message'] = 'Projects Updated Successfully';
        }
        mysqli_stmt_close($stmt);
    } else {
        $editId = 0;
        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
    }
}

if (!empty($_FILES['feature_image']) && is_uploaded_file($_FILES['feature_image']['tmp_name'])) {
    if (!$isError) {
        $uploadDir = '../assets/images/projects/';
        $name = 'project_' . $editId;
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


// echo '<pre>';
// foreach ($_FILES['multiple_images'] as $imgs) {
//     print_r($imgs);
// }
