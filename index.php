<?php
include 'header.php';
?>
<style>
  #read-more-btn {
    margin-top: 20px;
    margin-top: 6px;
    font-size: 12px;
    padding: 5px 16px;
    vertical-align: top;
  }
</style>
<!-- slider section -->
<section class="slider_section ">
  <div class="slider_bg_box">
    <img src="images/slider-bg.jpg" alt="">
  </div>
  <div id="customCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container ">
          <div class="row">
            <div class="col-md-9 col-lg-7">
              <div class="detail-box">
                <h1>
                  We Provide <br>
                  Carpentry Services
                </h1>
                <p>
                  We provide expert carpentry services, transforming wood into functional artistry with precision and skill.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1">
                    Contact Us
                  </a>
                  <!-- <a href="" class="btn2">
                        Read More
                      </a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-9 col-lg-7">
              <div class="detail-box">
                <h1>
                  We Provide <br>
                  Customized Furniture
                </h1>
                <p>
                  Crafted with care, our customized furniture is a reflection of your unique style, ensuring your space is uniquely yours.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1">
                    Contact Us
                  </a>
                  <!-- <a href="" class="btn2">
                        Read More
                      </a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container ">
          <div class="row">
            <div class="col-md-9 col-lg-7">
              <div class="detail-box">
                <h1>
                  We Provide <br>
                  Free Home Consulting
                </h1>
                <p>
                  Unlock the potential of your living space with our free home consulting service, where we turn your ideas into a personalized home design.
                </p>
                <div class="btn-box">
                  <a href="" class="btn1">
                    Contact Us
                  </a>
                  <!-- <a href="" class="btn2">
                        Read More
                      </a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <ol class="carousel-indicators">
        <li data-target="#customCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel" data-slide-to="1"></li>
        <li data-target="#customCarousel" data-slide-to="2"></li>
      </ol>
    </div>
  </div>
</section>
<!-- end slider section -->
</div>


<!-- service section -->

<section class="service_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Our Services
      </h2>
    </div>
    <div class="row">

      <?php
      $sql = "SELECT * FROM services WHERE status = 'active' ORDER BY id DESC";
      $result = mysqli_query($con, $sql);
      if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $i++;
      ?>
          <div class="col-lg-4">
            <div class="box <?php if ($i % 2 == 1) {
                              echo 'b1';
                            } else {
                              echo 'b2';
                            } ?>">
              <div class="img-box">
                <img src="<?php echo 'admin/assets/images/services/' . $row['image']; ?>" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  <?php echo $row['heading'] ?? ''; ?>
                </h5>
                <p>
                  <?php echo $row['content'] ?? ''; ?>
                </p>
              </div>
            </div>
          </div>

      <?php
        }
      }
      ?>


    </div>
  </div>
</section>

<!-- end service section -->

<!-- about section -->

<section class="about_section layout_padding-bottom ">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.jpg" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About Us
            </h2>
          </div>
          <p>
            At Home Wood Work, we've proudly served our clients for over a decade. With a strong and satisfied customer base, we specialize in crafting customized furniture that complements your style and comfort. Our mission is to transform your living spaces into unique, artful expressions of your personality and lifestyle. Join us in shaping homes and bringing your dreams to life. Your home is our canvas, and we're here to make it beautiful.
          </p>
          <a href="">
            Read More About Us
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end about section -->

<!-- work section start -->

<section class="work_section layout_padding">
  <div class="container-fluid pr-0">
    <div class="heading_container">
      <h2>
        Our Works
        <a href="" id="read-more-btn">
          See All Our Works
        </a>
      </h2>
      <p>
        We specialize in creating exquisite home furniture, meticulously crafted to elevate your living space with style and functionality.
      </p>
    </div>
    <div class="work_container">
      <div class=" work_owl-carousel owl-carousel owl-theme ">

        <?php
        $sql = "SELECT * FROM projects WHERE status = 'active' ORDER BY created_date DESC";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="item">
              <div class="box" style="max-height: 262px;">
                <div class="img-box">
                  <img src="admin/assets/images/projects/<?php echo $row['main_img']; ?>" alt="">
                </div>

                <div class="detail-box">
                  <h4 style="font-size:1.1rem;">
                    <a href="project-details.php?pid=<?php echo $row['id'] ?>" style="color:white;">
                      <?php echo $row['name']; ?>
                    </a>
                  </h4>
                  <a href="project-details.php?pid=<?php echo $row['id'] ?>" style="color:white;">
                    <p>
                      <?php
                      $details = $row['details'];
                      if (strlen($details) > 150) {
                        echo substr($details, 0, 150) . '...';
                      } else {
                        echo $details;
                      }
                      ?>

                    </p>
                  </a>
                  <a href="project-details.php?pid=<?php echo $row['id'] ?>">
                    View Detail
                  </a>
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

<!-- work section ends -->

<!-- contact section -->
<section class="contact_section layout_padding ">
  <div class="container">
    <div class="heading_container">
      <h2>
        Contact Us
      </h2>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form_container">
          <form action="">
            <div>
              <input type="text" placeholder="Your Name" />
            </div>
            <div>
              <input type="text" placeholder="Phone Number" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="btn_box">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="map_container">
          <div class="map">
            <div id="googleMap">
              <?php
              $map = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d383112.9449491444!2d" . $globalRow['longitute'] . "!3dd" . $globalRow['latitute'] . "!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDUyJzM4LjMiTiA4OMKwMzgnNTIuMCJF!5e0!3m2!1sen!2sus!4v1584376029939!5m2!1sen!2sus"
              ?>
              <iframe src="<?php echo $map; ?>" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
          </div>longitute
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end contact section -->

<!-- client section -->

<section class="client_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center psudo_white_primary mb_45">
      <h2>
        What Says Our Customers
      </h2>
    </div>
    <div class="carousel-wrap row ">
      <div class="owl-carousel client_owl-carousel">

        <?php
        $sql = "SELECT * FROM testimonials WHERE status = 'active' ORDER BY id DESC";
        $result = mysqli_query($con, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <img src="admin/assets/images/testimonials/<?php echo $row['image']; ?>" alt="" class="box-img">
                </div>
                <div class="detail-box">
                  <p>
                    <?php echo $row['comment']; ?>
                  </p>
                  <h6>
                    <?php echo ucfirst($row['name']); ?>
                  </h6>
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

<!-- end client section -->

<?php
include 'footer.php';
?>