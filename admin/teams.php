<?php
include 'head.php';
?>
<style>
    .user-profile-pic {
        box-shadow: 1px 1px 1px;
        height: 35px;
        width: 35px;
        object-fit: cover;
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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Our Teams</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Our Teams</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Heading Which Page -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <a href="add-edit-teams.php"><button class="btn btn-primary add-btn">Add New
                    Member</button></a>
            <table id="dataTableShowing" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Desciption</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM teams";
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
                                        echo '<img src="../images/default.png" class="user-profile-pic">';
                                    } else {
                                        if (file_exists('assets/images/teams/' . $row['image'])) {
                                            echo '<img src="assets/images/teams/' . $row['image'] . '" class="user-profile-pic">';
                                        } else {
                                            echo '<img src="../images/default.png" class="user-profile-pic">';
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <p class="comment">
                                        <?php echo $row['description']; ?>
                                    </p>
                                </td>
                                <td>
                                    <?php echo $row['role']; ?>
                                </td>
                                <td>
                                    <?php echo $row['status']; ?>
                                </td>
                                <td>
                                    <?php echo $row['order_by']; ?>
                                </td>
                                <td>
                                    <a href="add-edit-teams.php?pageid=<?php echo $row['id']; ?>">
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
                width: '20%'
            }, {
                width: '25%'
            }, {
                width: '10%'
            }, {
                width: '6%'
            }, {
                width: '9%'
            }, {
                width: '15%'
            }]
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
                            'pageIs': 'del-teams'
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