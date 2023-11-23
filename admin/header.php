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
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
        </nav>