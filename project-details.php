<?php
include 'header.php';
?>
<style>
    .iframe-div {
        height: 450px;
    }

    .iframe-div iframe {
        width: 100%;
        height: 100%;
    }

    .work_owl-carousel {
        margin-top: 30px;
    }

    .owl-nav {
        margin-top: 20px;
    }
</style>
<!-- contact section -->

<?php
if (isset($_GET['pid'])) {
    if (is_numeric($_GET['pid'])) {
        $sql = "SELECT * FROM projects WHERE status = 'active' AND id=" . $_GET['pid'] . " ORDER BY created_date DESC";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) < 1) {
            echo '
            <section class="contact_section layout_padding" style="background:#e6e6e6;">
                <div class="container">
                    <h1 style="font-size:8rem;">404</h1>
                    <p style="font-size:3rem;">Project Not Found</p>
                    <a href="index.php" class="btn btn-primary">Back To Home</a>
                </div>
            </section>';
        } else {
            $row = mysqli_fetch_assoc($result);
?>
            <section class="contact_section layout_padding">
                <div class="container">
                    <div class="heading_container">
                        <h2>
                            <?php echo $row['name']; ?>
                        </h2>
                    </div>
                    <img src="admin/assets/images/projects/<?php echo $row['main_img']; ?>" style="max-height: 450px; width: 100%;object-fit: cover;object-position: top;">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <?php echo $row['details']; ?>
                            </p>
                        </div>

                        <?php
                        if ($row['yt'] !== '') {
                            echo '
                            <div class="iframe-div col-md-12">
                                <iframe src="' . $row['yt'] . '" title="' . $row['name'] . '" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>';
                        }
                        ?>

                        <div class=" work_owl-carousel owl-carousel owl-theme ">
                            <?php
                            $sql = "SELECT * FROM project_images WHERE project_id=" . $row['id'] . " ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <div class="item">
                                        <div class="box" style="max-height: 262px;">
                                            <img src="<?php echo 'admin/assets/images/projects/sub-imgs/' . $row['image'] ?>" alt="">
                                        </div>
                                    </div>

                            <?php
                                }
                            }

                            ?>
                        </div>



                    </div>
                </div>
            </section>


<?php
        }
    } else {
        echo '
        <section class="contact_section layout_padding" style="background:#e6e6e6;">
            <div class="container">
                <h1 style="font-size:8rem;">404</h1>
                <p style="font-size:3rem;">Project Not Found</p>
                <a href="index.php" class="btn btn-primary">Back To Home</a>
            </div>
        </section>';
    }
} else {
    echo '
        <section class="contact_section layout_padding" style="background:#e6e6e6;">
            <div class="container">
                <h1 style="font-size:8rem;">404</h1>
                <p style="font-size:3rem;">Project Not Found</p>
                <a href="index.php" class="btn btn-primary">Back To Home</a>
            </div>
        </section>';
}
?>


<!-- end contact section -->
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.owl-prev').css('padding', '12px 20px');
            $('.owl-next').css('padding', '12px 20px');
        }, 1000);
    });
</script>
<?php
include 'footer.php';
?>