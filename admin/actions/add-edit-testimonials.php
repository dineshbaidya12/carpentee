<?php

session_start();

include '../../configuration.php';



$name = $_POST['input_name'];

$comment = $_POST['comment'];

$inputDate = $_POST['input_date'];

$status = $_POST['input_status'];

$editId = $_POST['editId'];

$isError = true;

if ($comment == '' || $name == '') {

    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';

    header('Location: ../testimonials.php');

    exit;
}



if ($editId == 0) {

    // Insert

    $sql = "INSERT INTO testimonials (`name`, `comment`, `status`, `created_date`) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, 'ssss', $name, $comment, $status, $inputDate);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {

            $isError = false;

            $editId = mysqli_insert_id($con);

            $_SESSION['success_message'] = 'Testimonials Inserted Successfully';
        } else {

            $editId = 0;

            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    }
} else {

    // Update

    $sql = "UPDATE testimonials SET `name` = ?, `comment` = ?, `status` = ?, `created_date` = ? WHERE id = ?";

    $stmt = mysqli_prepare($con, $sql);



    if ($stmt) {

        mysqli_stmt_bind_param($stmt, 'ssssi', $name, $comment, $status, $inputDate, $editId);

        $result = mysqli_stmt_execute($stmt);



        if (!$result) {

            $editId = 0;

            $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
        } else {

            $isError = false;

            $_SESSION['success_message'] = 'Testimonials Updated Successfully';
        }

        mysqli_stmt_close($stmt);
    } else {

        $editId = 0;

        $_SESSION['error_message'] = 'Error: ' . mysqli_error($con);
    }
}



if (!empty($_FILES['profile_picture']) && is_uploaded_file($_FILES['profile_picture']['tmp_name'])) {

    if (!$isError) {

        $uploadDir = '../assets/images/testimonials/';

        $name = str_replace(' ', '_', $name);

        $filename = $_FILES['profile_picture']['name'];

        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $uploadFile = $name . '_' . $editId . '.jpg';



        $imageInfo = getimagesize($_FILES['profile_picture']['tmp_name']);

        if ($imageInfo !== false) { // Check if it's a valid image

            $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);

            if (in_array($imageInfo[2], $allowedTypes)) {

                $newWidth = 100;

                $newHeight = 100;

                list($origWidth, $origHeight) = getimagesize($_FILES['profile_picture']['tmp_name']);

                if ($extension == 'jpg' || $extension === 'jpeg' || $extension == 'JPG') {

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

                    $sql2 = 'UPDATE testimonials SET `image` = ? WHERE id = ?';

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

header('Location: ../testimonials.php');

exit();
