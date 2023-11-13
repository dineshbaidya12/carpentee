<?php
include 'head.php';
?>
<?php
include 'header.php';
?>
<?php
include 'sidebar.php';
?>
<?php
$query = $mysqli->query("SELECT * FROM site_settings ORDER BY id ASC LIMIT 1");
if ($query) {
    $result = $query->fetch_assoc();
    $profilePic = $result["admin_img"];
    $adminName = $result["admin_name"];
    $username = $result["username"];
    $email = $result["email"];
    $password = $result["admin_pass"];
    $phone = $result["phone"];
    $fb = $result["fb"];
    $insta = $result["insta"];
    $tweet = $result["tweet"];
    $youtube = $result["youtube"];
    $siteName = $result["site_name"];
    $siteTitle = $result["site_title"];
    $location = $result["location"];
    $lat = $result["latitute"];
    $long = $result["longitute"];
    $smallDesc = $result["small_desc"];
} else {
    $profilePic = "";
}
?>

<div class="content-wrapper">

    <!-- Heading Which Page -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Site Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Heading Which Page -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="start-content">
                <form class="furniture-form" method="POST" enctype="multipart/form-data" action="actions/general-setting.php">

                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                                        if (empty($profilePic) || !file_exists('assets/images/admin-details/' . $profilePic)) {
                                            echo 'assets/images/default-user.jpg';
                                        } else {
                                            echo 'assets/images/admin-details/' . $profilePic;
                                        }
                                        ?>" class="user-dp" id="user-dp" alt="Profile Picture">
                            <span class="cross" id="cross">
                                <img style="width: 70%;" src="assets/images/cross.png">
                            </span>

                            <?php
                            if ($profilePic != '') {
                                echo '
                                <i class="fas fa-trash" id="remove-dp" data-id="' . $result['id'] . '" style="color: red; right: -50px; bottom: 0px; position: absolute; cursor:pointer;" data-toggle="tooltip" title="Remove The Profile Picture"></i>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="profilePicInput">Select a profile picture</label>
                            <input type="file" class="custom-file-input" id="profilePicInput" accept=".png, .jpg, .jpeg" name="profile_picture" req>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="admin-name" class="form-label">Admin Name <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="admin-name" name="admin_name" value="<?php echo $adminName ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-label">Username <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="username" name="username" value="<?php echo $username ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">Admin Email <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="email" name="email" value="<?php echo $email ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="password" name="password" value="<?php echo $password ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="form-label">Phone <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="phone" name="phone" value="<?php echo $phone ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input class="form-control form-control-sm" type="text" id="facebook" name="facebook" value="<?php echo $fb ?? ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input class="form-control form-control-sm" type="text" id="instagram" name="instagram" value="<?php echo $insta ?? ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="tweeter" class="form-label">Tweeter</label>
                        <input class="form-control form-control-sm" type="text" id="tweeter" name="tweeter" value="<?php echo $tweet ?? ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input class="form-control form-control-sm" type="text" id="youtube" name="youtube" value="<?php echo $youtube ?? ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="site-name" class="form-label">Site Name <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="site-name" name="site_name" value="<?php echo $siteName ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="site-title" class="form-label">Site Title <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="site-title" name="site_title" value="<?php echo $siteTitle ?? ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="location" class="form-label">Location <span class="astric">*</span></label>
                        <input class="form-control form-control-sm" type="text" id="location" name="location" value="<?php echo $location ?? ''; ?>">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="latitude" class="form-label">Latitude <span class="astric">*</span></label>
                                <input class="form-control form-control-sm" type="text" id="latitude" name="latitude" value="<?php echo $lat ?? '22.5076003'; ?>" required>
                            </div>
                            <div class="col">
                                <label for="longitute" class="form-label">Longitute <span class="astric">*</span></label>
                                <input class="form-control form-control-sm" type="text" id="longitute" name="longitute" value="<?php echo $long ?? '88.3462019'; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="comany_desc">Write Something About Your Company..</label>
                        <textarea class="form-control" id="comany_desc" rows="3" style="resize:none;" name="comany_desc" maxlength="300"><?php echo $smallDesc ?? ''; ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    //profie picture
    const imageInput = document.getElementById("profilePicInput");
    const selectedImage = document.getElementById("user-dp");

    imageInput.addEventListener("change", function() {
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };
            reader.readAsDataURL(imageInput.files[0]);
        }
        $('#cross').css('display', 'block');
    });

    //cross img
    $('#cross').on('click', function(e) {
        $('#profilePicInput').val('');
        $('#user-dp').attr('src', 'assets/images/default-user.jpg');
        $(this).css('display', 'none');
    });

    //input trigget by img click
    $('#user-dp').on('click', function() {
        $('#profilePicInput').click();
    });

    // remove dp 
    $('#remove-dp').on('click', function() {
        Swal.fire({
            title: 'Are you sure you want to delete this profile picture?',
            text: 'Do you want to confirm this action?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: {
                        'pageIs': 'del-profilepic-gen'
                    },
                    url: 'actions/ajax-actions.php',
                    success: function(data) {
                        Swal.fire('Deleted Successfully', data, 'success');
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 2000);
                        $('#user-dp').attr('src', 'assets/images/default-user.jpg');
                        $('#remove-dp').css('display', 'none');
                    },
                    error: function(data) {
                        Swal.fire({
                            html: data,
                            icon: 'error',
                        });
                    }
                });

            }
        });
    });

    // form validation

    $('.furniture-form').validate({
        rules: {
            admin_name: {
                required: true
            },
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            phone: {
                required: true
            },
            site_name: {
                required: true
            },
            site_title: {
                required: true
            },
            location: {
                required: true
            },
            latitude: {
                required: true,
                number: true // Ensures that the value is a number
            },
            longitude: {
                required: true,
                number: true // Ensures that the value is a number
            }
        }
    });
</script>
<?php
include 'footer.php';
?>