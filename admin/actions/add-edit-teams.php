<?php
session_start();
include '../../configuration.php';

$name = $_POST['input_name'];
$desc = $_POST['comment'];
$role = $_POST['role'];
$order = $_POST['order'];
$status = $_POST['input_status'];
$editId = $_POST['editId'];
$isError = true;

if ($name == '' || $desc == '' || $role == '' || $order == '' || $status == '') {
    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';
    header('Location: ../teams.php');
    exit;
}

if (!ctype_digit($order)) {
    $_SESSION['error_message'] = 'Order should only contain numbers';
    header('Location: ../teams.php');
    exit;
}

if ($editId == 0) {
    // Insert
    $sql = "INSERT INTO teams (`name`, `role`, `description`, `order_by`, `status`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssss', $name, $role, $desc, $order, $status);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            $isError = false;
            $editId = mysqli_insert_id($con);
            $_SESSION['success_message'] = 'Member Inserted Successfully';
        } else {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
} else {
    // Update
    $sql = "UPDATE teams SET `name` = ? , `role` = ? , `description` = ? , `order_by` = ? , `status` = ?  WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssisi', $name, $role, $desc, $order, $status, $editId);
        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            $editId = 0;
            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        } else {
            $isError = false;
            $_SESSION['success_message'] = 'Member Updated Successfully';
        }
        mysqli_stmt_close($stmt);
    } else {
        $editId = 0;
        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
    }
}

if (!empty($_FILES['profile_picture']) && is_uploaded_file($_FILES['profile_picture']['tmp_name'])) {
    if (!$isError) {
        $uploadDir = '../assets/images/teams/';
        $name = preg_replace('/\s+/', ' ', $name);
        $name = str_replace(' ', '_', $name);
        $name = $name . '_member_' . $editId;
        $filename = $_FILES['profile_picture']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadFile = $name .  '.jpg';

        $imageInfo = getimagesize($_FILES['profile_picture']['tmp_name']);
        if ($imageInfo !== false) { // Check if it's a valid image
            $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (in_array($imageInfo[2], $allowedTypes)) {
                $newWidth = 800;
                $newHeight = 800;
                list($origWidth, $origHeight) = getimagesize($_FILES['profile_picture']['tmp_name']);
                if ($extension == 'jpg' || $extension === 'jpeg') {
                    $image = imagecreatefromjpeg($_FILES['profile_picture']['tmp_name']);
                } else {
                    $image = imagecreatefrompng($_FILES['profile_picture']['tmp_name']);
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
                    $sql2 = 'UPDATE teams SET `image` = ? WHERE id = ?';
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
header('Location: ../teams.php');
exit();
