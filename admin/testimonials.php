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

    <!-- Heading Which Page -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimonial</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Testimonial</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Heading Which Page -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <a href="add-edit-testimonials.php"><button class="btn btn-primary add-btn">Add New
                    Testimonials</button></a>
            <table id="dataTableShowing" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM testimonials";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['image'] == null || $row['image'] == '') {
                                        echo '<img src="assets/images/default-user.jpg" class="user-profile-pic">';
                                    } else {
                                        if (file_exists('assets/images/testimonials/' . $row['image'])) {
                                            echo '<img src="assets/images/testimonials/' . $row['image'] . '" class="user-profile-pic">';
                                        } else {
                                            echo '<img src="assets/images/default-user.jpg" class="user-profile-pic">';
                                        }
                                    }
                                    ?>

                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <p class="comment">
                                        <?php echo $row['comment']; ?>
                                    </p>
                                </td>
                                <td>
                                    <?php echo ucfirst($row['status']); ?>
                                </td>
                                <td>
                                    <a href="add-edit-testimonials.php?pageid=<?php echo $row['id']; ?>">
                                        <button class="btn action-btn edit-action-btn" data-id="<?php echo $row['id']; ?>">
                                            <i class="fas fa-solid fa-edit edit"></i>
                                        </button>
                                    </a>
                                    <button class="btn action-btn trash-btn" data-id="<?php echo $row['id']; ?>">
                                        <i class="fas fa-solid fa-trash trash"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>



        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        let table = new DataTable('#dataTableShowing', {
            columns: [{
                width: '7%'
            }, {
                width: '7%'
            }, {
                width: '25%'
            }, {
                width: '35%'
            }, {
                width: '11%'
            }, {
                width: '15%'
            }]
        });

        $('.edit-action-btn').on('click', function(e) {
            $('#edit-testimonial').modal('show');
        });

        $('#edit-testimonial .show').on('click', function(e) {
            e.preventDefault();
        });

        $('.trash-btn').on('click', function(e) {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure you want to delete this testimonial?',
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
                            'pageIs': 'del-testimonials'
                        },
                        url: 'actions/ajax-actions.php',
                        success: function(data) {
                            console.log(data);
                            Swal.fire('Deleted Successfully', data, 'success');
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
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

    });
</script>
<?php
include 'footer.php';
?>