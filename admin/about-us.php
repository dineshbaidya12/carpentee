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

    .custom-file .error {
        position: absolute;
        z-index: 999;
        bottom: -28px;
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
    $sql = "SELECT * FROM about LIMIT 1";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $mainImg = $row['image'];
        $content = $row['content'];
        $shortContent = $row['short_content'];
    }
    ?>

    <!-- Heading Which Page -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        About Us
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
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
                <form class="furniture-form" method="POST" enctype="multipart/form-data" action="actions/about.php">
                    <div class="input-group mb-3">
                        <div id="dp-div">
                            <img src="<?php
                                        if (empty($mainImg) || !file_exists('assets/images/about/' . $mainImg)) {
                                            echo '../images/default.png';
                                        } else {
                                            echo 'assets/images/about/' . $mainImg;
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
                        <label for="short_content">Short Content <span class="astric">*</span></label>
                        <textarea name="short_content" id="short_content" class="comment form-control" style="resize:none; margin-bottom:10px; height:180px;" required><?php echo $shortContent ?? ''; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="main_content">Main Content <span class="astric">*</span></label>
                        <textarea name="main_content" id="main_content" class="comment form-control" style="resize:none; margin-bottom:10px; height:180px;" required><?php echo $content ?? ''; ?></textarea>
                    </div>

                    <p class="error" id="error-mul"></p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script>
    window.onload = function() {
        CKEDITOR.replace('main_content');
    };
</script>

<script>
    $('.furniture-form').validate({
        rules: {
            short_content: "required"
        },
        messages: {
            short_content: "Please Enter the short content"
        }
    });
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
</script>
<?php
include 'footer.php';
?>