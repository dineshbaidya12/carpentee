<?php
include 'head.php';
?>
<style>
    .user-profile-pic {
        box-shadow: 1px 1px 1px;
        max-width: 60px;
        height: 60px;
        width: 60px;
        object-fit: cover;
    }

    .current_contact {
        transition: all .5s ease-in;
        cursor: pointer;
    }

    .status-btn {
        background: transparent;
        border: transparent;
        color: white;
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
                    <h1 class="m-0">Subscribers</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Subscribers</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /. Heading Which Page -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <button class="btn float-right btn-danger mb-1" id="delete-all">Delete All</button>
            <table id="dataTableShowing" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM subscriberss ORDER BY id DESC";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>
                                <td>
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
                width: '15%'
            }, {
                width: '15%'
            }, {
                width: '40%'
            }, {
                width: '30%'
            }],
            pageLength: 100
        });

        $('.trash-btn').on('click', function(e) {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure you want to delete this contact?',
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
                            'pageIs': 'del-subs'
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

    $('.current_contact').click(function() {
        $(this).css('background', 'transparent');
    });

    $('#delete-all').on('click', function(e) {
        Swal.fire({
            title: 'Are you sure you want to delete all contact info?',
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
                        'pageIs': 'delete-all-subs'
                    },
                    url: 'actions/ajax-actions.php',
                    success: function(data) {
                        console.log(data);
                        Swal.fire('Deleted Successfully', '', 'success');
                        // btn.data('status', data);
                        // btn.text(data);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
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