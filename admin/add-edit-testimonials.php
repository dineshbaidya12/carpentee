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
    $isEdit = 'Add testimonials';
    if (isset($_GET['pageid'])) {
        $isEdit = 'Edit Testimonials';
        $pageId = $_GET['pageid'];
        $sql = "SELECT * FROM testimonials WHERE id = " . $pageId;
        $result = mysqli_query($con, $sql);

        if ($result) {
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $comment = $row['comment'];
                $status = $row['status'];
                $profilePic = $row['image'];
                $date = $row['created_date'];
            }
        }
    }
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
                        <li class="breadcrumb-item"><a href="testimonials.php">Testimonials</a></li>
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
                <form class="furniture-form" method="POST" enctype="multipart/form-data"
                    action="actions/add-edit-testimonials.php">
                    <input type="hidden" name="editId" value="<?php echo $pageId ?? 0; ?>">
                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                            if (empty($profilePic) || !file_exists('assets/images/testimonials/' . $profilePic)) {
                                echo 'assets/images/default-user.jpg';
                            } else {
                                echo 'assets/images/testimonials/' . $profilePic;
                            }
                            ?>" class="user-dp" id="user-dp" alt="Profile Picture">
                            <span class="cross" id="cross">
                                <img style="width: 70%;" src="assets/images/cross.png">
                            </span>

                            <?php
                            if ($profilePic != '') {
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
                            <input type="file" class="custom-file-input" id="profilePicInput" accept=".png, .jpg, .jpeg"
                                name="profile_picture">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Name <span class="astric">*</span></label>
                        <input type="text" class="form-control" id="inputName" name="input_name"
                            value="<?php echo $name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Comment <span class="astric">*</span></label>
                        <textarea name="comment" id="comment" class="comment form-control"
                            style="resize:none; margin-bottom:10px;" required><?php echo $comment ?? ''; ?></textarea>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Comment Date</label>
                                <input type="date" class="form-control" id="inputdate" name="input_date"
                                    value="<?php echo $date ?? ''; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputStatus">Status</label>
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
    // current date select autometically 
    const inputDate = document.getElementById("inputdate");
    if (inputDate.value == null || inputDate.value == '') {
        const currentDate = new Date().toISOString().slice(0, 10);
        inputDate.value = currentDate;
    }


    //profie picture
    const imageInput = document.getElementById("profilePicInput");
    const selectedImage = document.getElementById("user-dp");

    imageInput.addEventListener("change", function () {
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                selectedImage.src = e.target.result;
            };
            reader.readAsDataURL(imageInput.files[0]);
        }
        $('#cross').css('display', 'block');
    });

    //cross img
    $('#cross').on('click', function (e) {
        $('#profilePicInput').val('');
        $('#user-dp').attr('src', 'assets/images/default-user.jpg');
        $(this).css('display', 'none');
    });

    //input trigget by img click
    $('#user-dp').on('click', function () {
        $('#profilePicInput').click();
    });

    //form validation
    $('.furniture-form').validate({
        rules: {
            input_name: "required",
            comment: "required",
        },
        messages: {
            input_name: "Please enter User Name",
            comment: "Please enter User Comment",
        }
    });



    //remove dp
    $('#remove-dp').on('click', function (e) {
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
                        'pageIs': 'del-profilepic'
                    },
                    url: 'actions/ajax-actions.php',
                    success: function (data) {
                        Swal.fire('Deleted Successfully', data, 'success');
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 2000);
                        $('#user-dp').attr('src', 'assets/images/default-user.jpg');
                        $('#remove-dp').css('display', 'none');
                    },
                    error: function (data) {
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