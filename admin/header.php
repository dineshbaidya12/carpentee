</head>
<?php include '../configuration.php'; ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <style>
        .scroll {
            max-height: 475px;
            overflow: auto;
        }
    </style>
    <div class="wrapper">
        <span class="brand-link" style="display:none;"></span>
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="background:white;">
            <img style="height: 30%;  width: 30%; object-fit: cover;" src="assets/images/preloader.gif" alt="Please Wait..." height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="scroll">
                            <?php
                            $sql = "SELECT * FROM contact ORDER BY id DESC";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>


                                    <div class="dropdown-divider"></div>
                                    <span data-id="<?php echo $row['id']; ?>" class="dropdown-item contact-list" <?php
                                                                                                                    if ($row['status'] == 'read') {
                                                                                                                        echo 'style="opacity:.5;"';
                                                                                                                    }
                                                                                                                    ?>>
                                        <i class="fas fa-user mr-2"></i> <?php echo $row['name']; ?>
                                        <span class="float-right text-muted text-sm">
                                            <?php
                                            $date = $row['date'];
                                            $storedDate = new DateTime($date);
                                            $currentDate = new DateTime();
                                            $interval = $currentDate->diff($storedDate);
                                            if ($interval->y > 0) {
                                                echo $interval->y . ' year' . ($interval->y > 1 ? 's' : '') . ' ago';
                                            } elseif ($interval->m > 0) {
                                                echo $interval->m . ' month' . ($interval->m > 1 ? 's' : '') . ' ago';
                                            } elseif ($interval->d > 7) {
                                                echo floor($interval->d / 7) . ' week' . (floor($interval->d / 7) > 1 ? 's' : '') . ' ago';
                                            } elseif ($interval->d > 1) {
                                                echo $interval->d . ' days ago';
                                            } elseif ($interval->d == 1) {
                                                echo 'yesterday';
                                            } else {
                                                echo 'today';
                                            }
                                            ?>
                                        </span>
                                        <p class="message" style="font-size:12px;">
                                            <?php
                                            $message = $row['message'];

                                            if (strlen($message) > 100) {
                                                $truncatedMessage = substr($message, 0, 100) . '...';
                                                echo $truncatedMessage;
                                            } else {
                                                echo $message;
                                            }
                                            ?>
                                        </p>
                                        <p style="font-size:12px">Phone - <?php echo $row['phone']; ?></p>
                                        <p style="font-size:12px">Email - <?php echo $row['email']; ?></p>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>

        <script>
            $('.contact-list').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    data: {
                        'id': id,
                        'pageIs': 'update-status-read',
                    },
                    url: 'actions/ajax-actions.php',
                    success: function(data) {
                        console.log(data);
                        window.location.href = data;
                    },
                    error: function(data) {
                        Swal.fire({
                            html: data,
                            icon: 'error',
                        });
                    }
                });
            });
        </script>