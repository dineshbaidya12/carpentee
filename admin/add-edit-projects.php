<?php
include 'head.php';
?>
<style>
    .projects-all-sub-images-div {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        /* width: 100%; */
        /* padding: 20px; */
        margin: auto;
    }

    .projects-sub-images {
        max-width: 100px;
        box-sizing: border-box;
        margin: 10px;
    }

    .sub-single-img-div {
        position: relative;
    }

    .cross-mul-img {
        display: block;
        top: -6px;
        right: -15px;
        z-index: 500;
    }
</style>
<?php
include 'header.php';
?>
<?php
include 'sidebar.php';
?>

<div class="content-wrapper">
    <?php
    $isEdit = 'Add Project';
    if (isset($_GET['pageid'])) {
        $isEdit = 'Edit Project';
        $pageId = $_GET['pageid'];
        $sql = "SELECT * FROM projects WHERE id = " . $pageId;
        $result = mysqli_query($con, $sql);

        if ($result) {
            if ($row = mysqli_fetch_assoc($result)) {
                $name = $row['name'];
                $details = $row['details'];
                $mainImg = $row['main_img'];
                $status = $row['status'];
                $date = $row['created_date'];
            }
        }
    }
    $mainImg = $mainImg ?? '';
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
                        <li class="breadcrumb-item"><a href="projects.php">Projects</a></li>
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
                <form class="furniture-form" method="POST" enctype="multipart/form-data" action="actions/add-edit-projects.php">
                    <input type="hidden" name="editId" value="<?php echo $pageId ?? 0; ?>">
                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                                        if (empty($mainImg) || !file_exists('assets/images/projects/' . $mainImg)) {
                                            echo '../images/default.png';
                                        } else {
                                            echo 'assets/images/projects/' . $mainImg;
                                        }
                                        ?>" class="user-dp" id="user-dp" alt="Profile Picture">
                            <span class="cross" id="cross">
                                <img style="width: 70%;" src="assets/images/cross.png">
                            </span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="profilePicInput">Select a Main Image <span class="astric">*</span></label>
                            <input type="file" class="custom-file-input" id="profilePicInput" accept=".png, .jpg, .jpeg" name="feature_image">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Name <span class="astric">*</span></label>
                        <input type="text" class="form-control" id="inputName" name="prject_name" value="<?php echo $name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Description <span class="astric">*</span></label>
                        <textarea name="description" id="description" class="comment form-control" style="resize:none; margin-bottom:10px; height:180px;" required><?php echo $details ?? ''; ?></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Comment Date <span class="astric">*</span></label>
                            <input type="date" class="form-control" id="inputdate" name="input_date" value="<?php echo $date ?? ''; ?>">
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
                    <div class="input-group mb-3">
                        <div class="projects-all-sub-images-div">

                            <?php
                            $p =  $pageId ?? 0;
                            $sql = "SELECT * FROM project_images WHERE project_id = " . $p;
                            $result = mysqli_query($con, $sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if (file_exists('assets/images/projects/sub-imgs/' . $row['image'])) {
                            ?>
                                        <div class="sub-single-img-div">
                                            <img src="assets/images/projects/sub-imgs/<?php echo $row['image']; ?>" alt="Sub Project Image" class="projects-sub-images">
                                            <span class="cross cross-mul-img" data-id="<?php echo $row['id']; ?>">
                                                <img style="width: 70%;" src="assets/images/cross.png">
                                            </span>
                                        </div>
                            <?php
                                    }
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="input-group mb-3">

                        <div class="custom-file">
                            <label class="custom-file-label" for="multiple_images">Select a project sub images</label>
                            <input type="file" class="custom-file-input" id="multiple_images" accept=".png, .jpg, .jpeg" name="multiple_images[]" multiple>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php
if (isset($_GET['pageid'])) {
?>
    <script>
        $('.furniture-form').validate({
            rules: {
                prject_name: "required",
                description: "required"
            },
            messages: {
                prject_name: "Please Enter the project name",
                description: "Please write details about the project",
            }
        });
    </script>
<?php
} else {
?>
    <script>
        $('#profilePicInput').attr("required", true);
        //form validation
        $('.furniture-form').validate({
            rules: {
                feature_image: "required",
                prject_name: "required",
                description: "required"
            },
            messages: {
                feature_image: "Please select a main image",
                prject_name: "Please Enter the project name",
                description: "Please write details about the project",
            }
        });
    </script>
<?php
}

?>

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

    $(document).on('click', '.cross-mul-img', function() {
        let subSingleImgDiv = $(this).closest('.sub-single-img-div');
        let id = $(this).data('id');
        console.log(id);
        if (id == 0) {
            console.log(0);
            if (subSingleImgDiv.length) {
                subSingleImgDiv.fadeOut();
            }
        } else {
            $.ajax({
                type: 'POST',
                data: {
                    'id': id,
                    'pageIs': 'del-single-img'
                },
                url: 'actions/ajax-actions.php',
                success: function(data) {
                    if (subSingleImgDiv.length) {
                        subSingleImgDiv.fadeOut();
                    }
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


    $(document).ready(function() {
        $('#multiple_images').on('change', function() {
            $('.added-extra').remove();
            let files = this.files;
            let projectsAllSubImagesDiv = $('.projects-all-sub-images-div');
            for (let i = 0; i < files.length; i++) {
                let subSingleImgDiv = $('<div class="sub-single-img-div added-extra"></div>');
                let image = $('<img class="projects-sub-images">');
                image.attr('src', URL.createObjectURL(files[i]));
                let crossImage = $('<img style="width: 70%;" src="assets/images/cross.png">');
                subSingleImgDiv.append(image);
                projectsAllSubImagesDiv.append(subSingleImgDiv);
            }
        });
    });
</script>
<?php
include 'footer.php';
?>