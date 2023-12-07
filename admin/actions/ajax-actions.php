<?php

$page = $_POST['pageIs'];

include '../../configuration.php';

if ($page == 'del-testimonials') {

    try {

        $id = $_POST['id'];



        $sql = "SELECT * FROM testimonials where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $image = $row['image'];

            if (!empty($image) || $image != null || $image != '') {

                $imgPath = '../assets/images/testimonials/' . $image;

                if (file_exists($imgPath)) {

                    unlink($imgPath);
                }
            }

            $sql2 = 'DELETE FROM testimonials WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Testimonial Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-profilepic') {

    try {

        $id = $_POST['id'];



        $sql = "SELECT * FROM testimonials where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $sql = 'SELECT `image` FROM testimonials WHERE id = ' . $id;

            $result = mysqli_query($con, $sql);

            if (!$result) {

                return 'Error: ' . mysqli_error($con);
            }

            if ($row = mysqli_fetch_assoc($result)) {

                if ($row['image'] != null || $row['image'] != '') {

                    $imagePath = '../assets/images/testimonials/' . $row['image'];

                    if (file_exists($imagePath) && unlink($imagePath)) {

                        $sql2 = 'UPDATE testimonials SET `image` = null WHERE id = ' . $id;

                        $result2 = mysqli_query($con, $sql2);

                        return 'Image Deleted Successfully';
                    }
                } else {

                    return 'Image not found in the database';
                }
            } else {

                return 'Record not found in the database';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-profilepic-gen') {

    $query = $mysqli->query("SELECT id FROM site_settings ORDER BY id ASC LIMIT 1");



    if ($query) {

        $result = $query->fetch_assoc();

        $id = $result['id'];



        $query = "UPDATE site_settings SET admin_img = '' WHERE id = $id";



        if (mysqli_query($mysqli, $query)) {

            return 'Profile Picture Removed Successfully.';
        } else {

            return 'Unable to remove profile picture becouse of ' . mysqli_error($con);
        }
    }
}



if ($page == 'del-featureimg') {

    try {

        $id = $_POST['id'];



        $sql = "SELECT * FROM services where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $sql = 'SELECT `image` FROM services WHERE id = ' . $id;

            $result = mysqli_query($con, $sql);

            if (!$result) {

                return 'Error: ' . mysqli_error($con);
            }

            if ($row = mysqli_fetch_assoc($result)) {

                if ($row['image'] != null || $row['image'] != '') {

                    $imagePath = '../assets/images/services/' . $row['image'];

                    if (file_exists($imagePath) && unlink($imagePath)) {

                        $sql2 = 'UPDATE services SET `image` = null WHERE id = ' . $id;

                        $result2 = mysqli_query($con, $sql2);

                        return 'Image Deleted Successfully';
                    }
                } else {

                    return 'Image not found in the database';
                }
            } else {

                return 'Record not found in the database';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-services') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM services where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $image = $row['image'];

            if (!empty($image) || $image != null || $image != '') {

                $imgPath = '../assets/images/services/' . $image;

                if (file_exists($imgPath)) {

                    unlink($imgPath);
                }
            }

            $sql2 = 'DELETE FROM services WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Services Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == "del-single-img") {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM project_images where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $image = $row['image'];

            if (!empty($image) || $image != null || $image != '') {

                $imgPath = '../assets/images/projects/sub-imgs/' . $image;

                if (file_exists($imgPath)) {

                    unlink($imgPath);
                }
            }

            $sql2 = 'DELETE FROM project_images WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Project Image Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-projects') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM projects where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $image = $row['main_img'];

            if (!empty($image) || $image != null || $image != '') {

                $imgPath = '../assets/images/projects/' . $image;

                if (file_exists($imgPath)) {

                    unlink($imgPath);
                }
            }

            $sql2 = 'DELETE FROM projects WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);



            $nxtSql = "SELECT * FROM project_images where project_id=" . $id . "";

            $nxtResult = mysqli_query($con, $nxtSql);



            while ($nxtRow = mysqli_fetch_assoc($nxtResult)) {

                $nxtImage = $nxtRow['image'];

                if (!empty($nxtImage) || $nxtImage != null || $nxtImage != '') {

                    $nxtImgPath = '../assets/images/projects/sub-imgs/' . $nxtImage;

                    if (file_exists($nxtImgPath)) {

                        unlink($nxtImgPath);
                    }
                }

                $nxtSql2 = 'DELETE FROM project_images WHERE project_id = ' . $id . '';

                $nxtResult2 = mysqli_query($con, $sql2);
            }



            if ($result2) {

                return 'Project Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-team-dp') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM teams where id=" . $id . "";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            $sql = 'SELECT `image` FROM teams WHERE id = ' . $id;

            $result = mysqli_query($con, $sql);

            if (!$result) {

                return 'Error: ' . mysqli_error($con);
            }

            if ($row = mysqli_fetch_assoc($result)) {

                if ($row['image'] != null || $row['image'] != '') {

                    $imagePath = '../assets/images/teams/' . $row['image'];

                    if (file_exists($imagePath) && unlink($imagePath)) {

                        $sql2 = 'UPDATE teams SET `image` = null WHERE id = ' . $id;

                        $result2 = mysqli_query($con, $sql2);

                        return 'Image Deleted Successfully';
                    }
                } else {

                    return 'Image not found in the database';
                }
            } else {

                return 'Record not found in the database';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-teams') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM teams where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $image = $row['image'];

            if (!empty($image) || $image != null || $image != '') {

                $imgPath = '../assets/images/teams/' . $image;

                if (file_exists($imgPath)) {

                    unlink($imgPath);
                }
            }

            $sql2 = 'DELETE FROM teams WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Member Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-contact') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM contact where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $sql2 = 'DELETE FROM contact WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Contact Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'del-subs') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM subscriberss where id=" . $id . "";

        $result = mysqli_query($con, $sql);



        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $sql2 = 'DELETE FROM subscriberss WHERE id = ' . $id . '';

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                return 'Subscriber Deleted Successfully';
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'update-status') {

    try {

        $id = $_POST['id'];

        $status = $_POST['status'];

        $sql = "SELECT * FROM contact where id=" . $id . "";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {



            if ($status == 'read') {

                $upStatus = 'unread';
            } else {

                $upStatus = 'read';
            }

            // echo $upStatus;

            $sql2 = "UPDATE contact SET `status` = '$upStatus' WHERE id = $id";

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                echo $upStatus;
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'update-status-read') {

    try {

        $id = $_POST['id'];

        $sql = "SELECT * FROM contact where id=" . $id . "";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            // echo $upStatus;

            $sql2 = "UPDATE contact SET `status` = 'read' WHERE id = $id";

            $result2 = mysqli_query($con, $sql2);

            if ($result2) {

                echo 'contact.php?conid=' . $id;
            }
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'delete-all') {

    try {

        $sql = "DELETE FROM contact";

        $result = mysqli_query($con, $sql);

        if ($result) {

            echo 'Deleted Successfully';
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}



if ($page == 'delete-all-subs') {

    try {

        $sql = "DELETE FROM subscriberss";

        $result = mysqli_query($con, $sql);

        if ($result) {

            echo 'Deleted Successfully';
        } else {

            return 'Update Failed: ' . mysqli_error($con);
        }
    } catch (\Exception $e) {

        return $e;
    }
}
