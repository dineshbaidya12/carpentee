<?php
include('configuration.php');
$gSql = "SELECT site_title, site_name, fb, insta, tweet, youtube, small_desc, phone, latitute, longitute,  location, contact_email FROM site_settings LIMIT 1";
$gResult = mysqli_query($con, $gSql);
if ($gResult) {
  $globalRow = mysqli_fetch_assoc($gResult);
  // print_r($globalRow);
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/favicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo $globalRow['site_title'] ?? "Das Furniture - Best Place to Decorate Your Home"; ?></title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section ">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              <?php echo $globalRow['site_name'] ?? "Das Furniture"; ?>
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="work.php"> Our Work </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php#contact-sec">Contact Us</a>
                </li>
              </ul>
            </div>
            <div class="social_box">
              <?php
              if ($globalRow['fb'] ?? '') {
                if ($globalRow['fb'] != '') {
                  echo '
                  <a href="' . $globalRow['fb'] . '" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                  </a>
              ';
                }
              }
              if ($globalRow['insta'] ?? '') {
                if ($globalRow['insta'] != '') {
                  echo '
                  <a href="' . $globalRow['insta'] . '" target="_blank">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  </a>
              ';
                }
              }
              if ($globalRow['tweet'] ?? '') {
                if ($globalRow['tweet'] != '') {
                  echo '
                  <a href="' . $globalRow['tweet'] . '" target="_blank">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  </a>
              ';
                }
              }
              if ($globalRow['youtube'] ?? '') {
                if ($globalRow['youtube'] != '') {
                  echo '
                  <a href="' . $globalRow['youtube'] . '" target="_blank">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                  </a>
              ';
                }
              }
              ?>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- end header section -->