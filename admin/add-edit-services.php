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
    $isEdit = 'Add Services';
    if (isset($_GET['pageid'])) {
        $isEdit = 'Edit Services';
        $pageId = $_GET['pageid'];
        $sql = "SELECT * FROM services WHERE id = " . $pageId;
        $result = mysqli_query($con, $sql);

        if ($result) {
            if ($row = mysqli_fetch_assoc($result)) {
                $heading = $row['heading'];
                $content = $row['content'];
                $featureImage = $row['image'];
            }
        }
    }
    $featureImage = $featureImage ?? '';
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
                        <li class="breadcrumb-item"><a href="services.php">Services</a></li>
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
                <form class="furniture-form" method="POST" enctype="multipart/form-data" action="actions/add-edit-services.php">
                    <input type="hidden" name="editId" value="<?php echo $pageId ?? 0; ?>">
                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                                        if (empty($featureImage) || !file_exists('assets/images/services/' . $featureImage)) {
                                            echo '../images/default.png';
                                        } else {
                                            echo 'assets/images/services/' . $featureImage;
                                        }
                                        ?>" class="user-dp" id="user-dp" alt="Profile Picture">
                            <span class="cross" id="cross">
                                <img style="width: 70%;" src="assets/images/cross.png">
                            </span>

                            <?php
                            if ($featureImage != '' && file_exists('assets/images/services/' . $featureImage)) {
                                echo '
                                <i class="fas fa-trash" id="remove-dp" data-id="' . $pageId . '" style="color: red; right: -50px; bottom: 0px; position: absolute; cursor:pointer;" data-toggle="tooltip" title="Remove The Profile Picture"></i>
                                ';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="profilePicInput">Select a Feature Image</label>
                            <input type="file" class="custom-file-input" id="profilePicInput" accept=".png, .jpg, .jpeg" name="feature_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Heading <span class="astric">*</span></label>
                        <input type="text" class="form-control" id="inputName" name="heading" value="<?php echo $heading ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Comment <span class="astric">*</span></label>
                        <textarea name="comment" id="comment" class="comment form-control" style="resize:none; margin-bottom:10px; height:120px;" required><?php echo $content ?? ''; ?></textarea>
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
        $('#user-dp').attr('src', '../images/default.png');
        $(this).css('display', 'none');
    });

    //input trigget by img click
    $('#user-dp').on('click', function() {
        $('#profilePicInput').click();
    });

    //form validation
    $('.furniture-form').validate({
        rules: {
            heading: "required",
            comment: "required",
        },
        messages: {
            heading: "Please Enter the heading",
            comment: "Please write details about the service",
        }
    });

    //remove dp
    $('#remove-dp').on('click', function(e) {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure you want to delete this feature image?',
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
                        'pageIs': 'del-featureimg'
                    },
                    url: 'actions/ajax-actions.php',
                    success: function(data) {
                        Swal.fire('Deleted Successfully', data, 'success');
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 2000);
                        $('#user-dp').attr('src', '../images/default.png');
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