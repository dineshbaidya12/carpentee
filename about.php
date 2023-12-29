<?php

include 'header.php';

?>

<style>
  .about-us-img {

    width: 80vw;

    height: auto;

    object-fit: cover;

    object-position: top;

    /* max-height: 400px; */

    display: block;

    margin: auto;

  }



  .card-img-top {

    transition: .7s ease-in;

  }



  .card-img-top:hover {

    transform: scale(1.2);

  }



  .card {

    overflow: auto;

    display: inline-block;

    vertical-align: top;

  }



  @media (min-width: 982px) and (max-width: 5000px) {

    .card {

      max-width: 22rem !important;

    }

  }
</style>

<!-- contact section -->

<section class="contact_section layout_padding ">

  <div class="container">

    <div class="heading_container">

      <h2>
  
        About Us

      </h2>

    </div>

    <div class="row">

      <div class="col-md-12">


        <?php

        $sql = "SELECT * FROM about LIMIT 1";

        $result = mysqli_query($con, $sql);

        if ($result) {
          $row = mysqli_fetch_assoc($result);
          $image = $row['image'];
          $content = $row['content'] ?? '';
        } else {
          $image = 'none';
        }

        if (file_exists('admin/assets/images/about/' . $image)) {

          $image = 'admin/assets/images/about/' . $image;
        } else {

          $image = 'images/about-img.jpg';
        }
        ?>

        <img src="<?php echo $image; ?>" alt="about us" class="about-us-img">

        <div class="mt-2 p-5">

          <?php 
          //get the content from database and print
          echo $content;
          ?>

        </div>

      </div>

      <div class="col-12">

        <div class="heading_container">

          <h2>

            Our Teams

          </h2>

        </div>



        <div class="container">

          <div class="row g-5">

            <?php

            $sql = "SELECT * FROM teams WHERE status = 'active' ORDER BY order_by ASC";

            $result = mysqli_query($con, $sql);

            if ($result) {

              while ($row = mysqli_fetch_assoc($result)) {

            ?>

                <div class="card col-12 col-lg-4 col-md-5 mb-4 ml-md-auto mx-auto" style="width: 18rem;">

                  <!-- The "mb-4" class adds margin-bottom to create space between cards -->

                  <div class="image-div" style="width:100%; overflow:hidden;">

                    <?php

                    if ($row['image'] == '' || $row['image'] == null) {

                      $image = 'admin/assets/images/Default-welcomer.png';
                    } else {

                      if (file_exists('admin/assets/images/teams/' . $row['image'])) {

                        $image = 'admin/assets/images/teams/' . $row['image'];
                      } else {

                        $image = 'admin/assets/images/Default-welcomer.png';
                      }
                    }



                    ?>

                    <img class="card-img-top" style="cursor:pointer;max-height: 300px;" src="<?php echo $image; ?>" alt="<?php echo $row['name'] ?? ''; ?>">

                  </div>

                  <div class="card-body">

                    <h5 class="card-title" style="color: gray; font-size: 12px;  font-family: verdana;"><?php echo $row['role'] ?? ''; ?></h5>

                    <h5 class="card-title"><b><?php echo $row['name'] ?? ''; ?></b></h5>

                    <p class="card-text" style="font-size:14px; color:#797979;"><?php echo $row['description'] ?? ''; ?></p>

                  </div>

                </div>

            <?php

              }
            }

            ?>

          </div>

        </div>

      </div>

    </div>

  </div>

  </div>

</section>

<!-- end contact section -->



<?php

include 'footer.php';

?>
