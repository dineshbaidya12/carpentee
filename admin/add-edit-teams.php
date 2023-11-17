<?php
include 'head.php';
?>
<?php
include 'header.php';
?>
<?php
include 'sidebar.php';
?>

<div class="content-wrapper">
    <?php
    $isEdit = 'Add Member';
    if (isset($_GET['pageid'])) {
        $isEdit = 'Edit Member';
        $pageId = $_GET['pageid'];
        $sql = "SELECT * FROM teams WHERE id = " . $pageId;
        $result = mysqli_query($con, $sql);

        if ($result) {
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $comment = $row['description'];
                $status = $row['status'];
                $profilePic = $row['image'];
                $role = $row['role'];
                $order = $row['order_by'];
            }
        }
    }
    $role = $role ?? '';
    $order = $order ?? 0;
    $profilePic = $profilePic ?? '';
    $status = $status ?? '';
    ?>

    <!-- Heading Which Page -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        <?php echo $isEdit; ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="teams.php">Our Teams</a></li>
                        <li class="breadcrumb-item active">
                            <?php echo $isEdit; ?>
                        </li>
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
                <form class="furniture-form" method="POST" enctype="multipart/form-data" action="actions/add-edit-teams.php">
                    <input type="hidden" name="editId" value="<?php echo $pageId ?? 0; ?>">
                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                                        if (empty($profilePic) || !file_exists('assets/images/teams/' . $profilePic)) {
                                            echo 'assets/images/default-user.jpg';
                                        } else {
                                            echo 'assets/images/teams/' . $profilePic;
                                        }
                                        ?>" class="user-dp" id="user-dp" alt="Profile Picture">
                            <span class="cross" id="cross">
                                <img style="width: 70%;" src="assets/images/cross.png">
                            </span>

                            <?php
                            if ($profilePic != '' && file_exists('assets/images/teams/' . $profilePic)) {
                                echo '
                                <i class="fas fa-trash" id="remove-dp" data-id="' . $pageId . '" style="color: red; right: -50px; bottom: 0px; position: absolute; cursor:pointer;" data-toggle="tooltip" title="Remove The Profile Picture"></i>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="profilePicInput">Select a profile picture</label>
                            <input type="file" class="custom-file-input" id="profilePicInput" accept=".png, .jpg, .jpeg" name="profile_picture">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Name <span class="astric">*</span></label>
                        <input type="text" class="form-control" id="inputName" name="input_name" value="<?php echo $name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Description <span class="astric">*</span></label>
                        <textarea name="comment" id="comment" class="comment form-control" style="resize:none; margin-bottom:10px;" required><?php echo $comment ?? ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Role <span class="astric">*</span></label>
                        <input type="text" class="form-control" id="role" name="role" value="<?php echo $role ?? ''; ?>" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Order <span class="astric">*</span></label>
                            <input type="text" class="form-control" id="order" name="order" value="<?php echo $order ?? 0; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputStatus">Status <span class="astric">*</span></label>
                            <select id="inputStatus" class="form-control" name="input_status">
                                <option value="active" <?php if ($status == 'active') {
                                                            echo 'selected';
                                                        } ?>>Active</option>
                                <option value="inactive" <?php if ($status == 'inactive') {
                                                                echo 'selected';
                                                            } ?>>Inctive</option>
                            </select>
                        </div>
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

    //form validation
    $('.furniture-form').validate({
        rules: {
            input_name: "required",
            comment: "required",
            role: "required",
            order: {
                required: true,
                number: true
            },
            input_status: "required"
        },
        messages: {
            input_name: "Please enter User Name",
            comment: "Please enter User Comment",
            role: "Please enter User Comment",
            order: "Order Should be a number",
            input_status: "Please enter User Comment"
        }
    });



    //remove dp
    $('#remove-dp').on('click', function(e) {
        let id = $(this).data('id');
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
                        'id': id,
                        'pageIs': 'del-team-dp'
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
</script>
<?php
include 'footer.php';
?>