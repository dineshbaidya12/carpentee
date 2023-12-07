<?php
include 'header.php';
?>
<style>
  .anchor {
    user-select: none;
  }

  .card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  .img-div {
    position: relative;
    overflow: hidden;
  }

  .img-div img {
    width: 100%;
    height: auto;
    display: block;
  }

  .card h3 {
    font-size: 1.5rem;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .card p {
    font-size: 1rem;
    margin-bottom: 15px;
  }

  .card .click {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .card .click:hover {
    background-color: #0056b3;
  }

  .img-div {
    height: 200px;
    overflow: hidden;
  }

  .img-div img {
    object-fit: cover;
    width: 100% !important;
    max-height: 200px;
    transition: all .5s ease-in-out;
    cursor: pointer;
  }

  .img-div img:hover {
    transform: scale(1.2);
  }

  .details {
    padding: 15px;
    /* height: 230px; */
    height: 280px;
    overflow: auto;
  }

  @media only screen and (max-width: 767px) {
    .details {
      padding: 15px;
      height: 285px;
      overflow: auto;
    }

  }


  .details::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar for IE, Edge and Firefox */
  .details {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  .details h1,
  .details h2,
  .details h3,
  .details h4,
  .details h5,
  .details p,
  .details h6,
  .details {
    font-size: 1rem !important;
  }

  .heading-card {
    font-size: 1.4rem !important;
  }

  .date-div {
    display: flex;
    justify-content: start;
  }

  .date {
    font-size: 12px;
    color: gray;
  }
</style>
<!-- contact section -->
<section class="contact_section layout_padding ">
  <div class="container">
    <div class="heading_container">
      <h2>
        Our Works
      </h2>
    </div>

    <div class="container">
      <div class="row">
        <?php
        $sql = "SELECT * FROM projects WHERE status = 'active' ORDER BY order_num ASC";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
        ?>
            <div class="col-md-4 col-sm-12">
              <div class="card">
                <div class="img-div w-100">
                  <a href="project-details.php?pid=<?php echo $id ?? 0; ?>">
                    <img src="admin/assets/images/projects/<?php echo $row['main_img']; ?>" class="w-100">
                  </a>
                </div>
                <div class="details">
                  <div class="date-div">
                    <span class="date">
                      <?php

                      $date = explode('-', $row['created_date']);

                      if ($date[1] == 01) {
                        $month = 'January';
                      } else if ($date[1] == '02') {
                        $month = 'February';
                      } else if ($date[1] == '03') {
                        $month = 'March';
                      } else if ($date[1] == '04') {
                        $month = 'April';
                      } else if ($date[1] == '05') {
                        $month = 'May';
                      } else if ($date[1] == '06') {
                        $month = 'June';
                      } else if ($date[1] == '07') {
                        $month = 'July';
                      } else if ($date[1] == '08') {
                        $month = 'August';
                      } else if ($date[1] == '09') {
                        $month = 'September';
                      } else if ($date[1] == '10') {
                        $month = 'October';
                      } else if ($date[1] == '11') {
                        $month = 'Novermber';
                      } else if ($date[1] == '12') {
                        $month = 'December';
                      }

                      if ($date[2] == '01') {
                        $day = '01<sup>st</sup>';
                      } else if ($date[2] == '02') {
                        $day = '02<sup>nd</sup>';
                      } else if ($date[2] == '03') {
                        $day = '03<sup>rd</sup>';
                      } else if ($date[2] == '31') {
                        $day = '31<sup>st</sup>';
                      } else {
                        $day = $date[2] . '<sup>th</sup>';
                      }

                      echo $day . ' ' . $month . ' ' . $date[0];


                      ?>
                    </span>
                  </div>
                  <div class="heading-card mb-lg-3"><?php echo $row['name']; ?></div>
                  <p>
                    <?php
                    $details = $row['details'];
                    if (mb_strlen($details) > 120) {
                      $truncatedDetails = truncateText($details, 120);
                      echo $truncatedDetails . '<a class="anchor" href="project-details.php?pid=' . $id . '">...</a>';
                    } else {
                      echo $details;
                    }
                    ?>
                  </p>
                  <a href="project-details.php?pid=<?php echo $id ?? 0; ?>" class="btn btn-primary click">Details</a>
                </div>
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
<!-- end contact section -->
<?php
function truncateText($text, $length)
{
  // Remove any existing HTML tags
  $text = strip_tags($text);

  // Truncate the text to the specified length
  $truncatedText = mb_substr($text, 0, $length);

  return $truncatedText;
}

?>
<?php
include 'footer.php';
?>