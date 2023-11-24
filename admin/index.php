<?php
include 'head.php';
?>
<style>
    .content-wrapper {
        background: url("https://wallpapers.com/images/featured/soft-aesthetic-cei80uravrnl6ltm.jpg") center center / cover;
    }
</style>
<?php
include 'header.php';
?>
<?php
include 'sidebar.php';
?>


<div class="content-wrapper">

    <!-- Heading Which Page -->
    <div class="content-header" style="background:transparent;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Heading Which Page -->

    <?php
    $service = "SELECT id FROM services";
    $serviceResult = mysqli_query($con, $service);
    if ($serviceResult) {
        $serviceCount = mysqli_num_rows($serviceResult);
    }

    $projects = "SELECT id FROM projects";
    $projectsResult = mysqli_query($con, $projects);
    if ($projectsResult) {
        $projectsCount = mysqli_num_rows($projectsResult);
    }

    $teams = "SELECT id FROM teams";
    $teamsResult = mysqli_query($con, $teams);
    if ($teamsResult) {
        $teamsCount = mysqli_num_rows($teamsResult);
    }

    $testimonials = "SELECT id FROM testimonials";
    $testimonialsResult = mysqli_query($con, $testimonials);
    if ($testimonialsResult) {
        $testimonialsCount = mysqli_num_rows($testimonialsResult);
    }

    ?>


    <!-- Main content -->
    <section class="content" style="background:transparent;">
        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $serviceCount ?? 0; ?></h3>

                            <p>Services</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-couch"></i>
                        </div>
                        <a href="services.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $projectsCount ?? 0; ?></h3>

                            <p>Projects</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <a href="projects.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $teamsCount ?? 0; ?></h3>

                            <p>Our Teams</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="teams.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3><?php echo $testimonialsCount ?? 0; ?></h3>

                            <p>Testimonials</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comment"></i>
                        </div>
                        <a href="testimonials.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>


        </div>
    </section>
</div>
<?php
include 'footer.php';
?>