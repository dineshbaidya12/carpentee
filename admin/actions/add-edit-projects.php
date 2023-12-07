<?php
session_start();
include '../../configuration.php';

$ProjectName = $_POST["prject_name"] ?? '';
$description = $_POST["description"] ?? '';
$inputDate = $_POST["input_date"] ?? '';
$inputStatus = $_POST["input_status"] ?? '';
$featureImage = $_FILES["feature_image"] ?? '';
$ytLink = $_POST["youtube"] ?? '';
$editId = $_POST["editId"] ?? 0;
$mulImgExist = false;
$ordernumber = $_POST["ordernumber"] ?? 10;

if ($ProjectName  == "" || $description == "" || $inputDate == "" || $inputStatus == "") {
    $_SESSION['error_message'] = 'Please Fill All The Mendatory Feild';
    $_SESSION['bkp_name'] = $ProjectName;
    $_SESSION['bkp_desc'] = $description;
    $_SESSION['bkp_status'] = $inputStatus;
    $_SESSION['bkp_date'] = $inputDate;
    $_SESSION['bkp_yt'] = $ytLink;
    header('Location: ../projects.php');
    exit;
}

if ($_FILES['feature_image']['size'] < 1 && $editId == 0) {
    $_SESSION['error_message'] = 'Please select a feature image and the size should less than 5MB';
    $_SESSION['bkp_name'] = $ProjectName;
    $_SESSION['bkp_desc'] = $description;
    $_SESSION['bkp_status'] = $inputStatus;
    $_SESSION['bkp_date'] = $inputDate;
    $_SESSION['bkp_yt'] = $ytLink;
    header('Location: ../projects.php');
    exit;
}

if ($_FILES['multiple_images']['size'][0] > 0) {
    $mulImgExist = true;
    foreach ($_FILES['multiple_images']['name'] as $key => $filename) {
        if (($_FILES['multiple_images']['size'][$key] / 1024) / 1024 > 2 || ($_FILES['multiple_images']['size'][$key] / 1024) / 1024 == 0) {
            $_SESSION['error_message'] = 'Please select sub images less than 2MB';
            $_SESSION['bkp_name'] = $ProjectName;
            $_SESSION['bkp_desc'] = $description;
            $_SESSION['bkp_status'] = $inputStatus;
            $_SESSION['bkp_date'] = $inputDate;
            $_SESSION['bkp_yt'] = $ytLink;
            header('Location: ../projects.php');
            exit;
        }
    }
}


if ($editId == 0) {
    // Insert
    $sql = "INSERT INTO projects (`name`, `details`, `status`, `created_date`, `order_num`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssi', $ProjectName, $description, $inputStatus, $inputDate, $ordernumber);
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
    $sql = "UPDATE projects SET `name` = ?, `details` = ?, `status` = ?, `created_date` = ?, `order_num` = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssii', $ProjectName, $description, $inputStatus, $inputDate, $ordernumber, $editId);
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
        $uploadFile = $name .  '.jpg';

        $imageInfo = getimagesize($_FILES['feature_image']['tmp_name']);
        if ($imageInfo !== false) { // Check if it's a valid image
            $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
            if (in_array($imageInfo[2], $allowedTypes)) {
                $newHeight = 762;
                $newWidth = 844;
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
                    $sql2 = 'UPDATE projects SET `main_img` = ? WHERE id = ?';
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


if ($mulImgExist) {
    if (!$isError) {
        foreach ($_FILES['multiple_images']['name'] as $key => $filename) {
            $uploadDir = '../assets/images/projects/sub-imgs/';
            $name = 'project_' . $editId . '_' . uniqid();
            $filename = $_FILES['multiple_images']['name'][$key];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $uploadFile = $name .  '.jpg';

            $imageInfo = getimagesize($_FILES['multiple_images']['tmp_name'][$key]);
            if ($imageInfo !== false) { // Check if it's a valid image
                $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
                if (in_array($imageInfo[2], $allowedTypes)) {
                    list($origWidth, $origHeight) = getimagesize($_FILES['multiple_images']['tmp_name'][$key]);

                    if ($origWidth > $origHeight && $origWidth > 555) {
                        // Landscape
                        $newWidth = 555;
                        $diff = (($origWidth - $newWidth) / $origWidth) * 100;
                        $newHeight = $origHeight * (1 - $diff / 100);
                    } else if ($origHeight > $origWidth && $origHeight > 370) {
                        // Portrait
                        $newHeight = 370;
                        $diff = (($origHeight - $newHeight) / $origHeight) * 100;
                        $newWidth = $origWidth * (1 - $diff / 100);
                    } else {
                        // Equal or smaller
                        $newHeight = 370;
                        $newWidth = 555;
                    }

                    if ($extension == 'jpg' || $extension === 'jpeg') {
                        $image = imagecreatefromjpeg($_FILES['multiple_images']['tmp_name'][$key]);
                    } else {
                        $image = imagecreatefrompng($_FILES['multiple_images']['tmp_name'][$key]);
                    }
                    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresized($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

                    $resizedFilePath = $uploadDir . $uploadFile;
                    imagejpeg($resizedImage, $resizedFilePath);

                    imagedestroy($image);
                    imagedestroy($resizedImage);

                    if ($editId != 0) {
                        $sql = "INSERT INTO project_images (`image`, `project_id`) VALUES (?, ?)";
                        $stmt = mysqli_prepare($con, $sql);
                        if ($stmt) {
                            mysqli_stmt_bind_param($stmt, 'ss', $uploadFile, $editId);
                            $result = mysqli_stmt_execute($stmt);
                            if (!$result) {
                                $_SESSION['success_message'] .= mysqli_error($con);
                            }
                            mysqli_stmt_close($stmt);
                        }
                    }
                }
            }
        }
    }
}

if ($ytLink != '') {
    $videoId = getYouTubeVideoId($ytLink);
    if ($videoId) {
        $iframeTag = 'https://www.youtube.com/embed/' . $videoId . '';
        $sql3 = 'UPDATE projects SET `yt` = ?, yt_raw = ? WHERE id = ?';
        $stmt = mysqli_prepare($con, $sql3);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssi', $iframeTag, $ytLink,  $editId);
            $result2 = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    } else {
        $_SESSION['success_message'] .= ' -- Invalid Youtube Video Link';
    }
} else {
    $sql3 = 'UPDATE projects SET `yt` = "", yt_raw = "" WHERE id = ?';
    $stmt = mysqli_prepare($con, $sql3);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $editId);
        $result2 = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}


function getYouTubeVideoId($youtubeLink)
{
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $youtubeLink, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    } else {
        return false;
    }
}

header('Location: ../projects.php');
exit();
