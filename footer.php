<!-- info section -->
<section class="info_section ">

  <div class="container">
    <div class="info_top ">
      <div class="row ">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="info_detail">
            <a href="index.php">
              <h4>
                <?php echo $globalRow['site_name'] ?? 'Das Furniture'; ?>
              </h4>
            </a>
            <p>
              <?php echo $globalRow['small_desc'] ?? "We're excited to transform your home with our experienced team's custom-made furniture, tailored to your vision"; ?>
            </p>

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
              if ($globalRow['whattsapp'] ?? '') {
                if ($globalRow['whattsapp'] != '') {
                  echo '
                  <a href="https://wa.me/' . $globalRow['whattsapp'] . '?text=Hello%20,%20I%20Have%20a%20Query%20about%20your%20company." target="_blank">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
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
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
          <h4>
            Contact us
          </h4>
          <p>
            <?php echo $globalRow['location'] ?? ''; ?>
          </p>
          <div class="contact_nav">
            <a href="tel:+91 <?php echo $globalRow['phone'] ?? ''; ?>">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +91 <?php echo $globalRow['phone'] ?? ''; ?>
              </span>
            </a>
            <a href="mailto:<?php echo $globalRow['contact_email'] ?? ''; ?>">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : <?php echo $globalRow['contact_email']; ?>
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="info_form">
            <h4>
              SIGN UP TO OUR NEWSLETTER
            </h4>
            <form id="newsletter-form">
              <input type="text" placeholder="Enter Your Email" id="email-newsletter" />
              <button type="button" id="submit-newsletter">
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end info_section -->


<!-- footer section -->
<footer class="footer_section">
  <div class="container">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      <a href="index.php"><?php echo $globalRow['site_name'] ?? 'Das Furniture'; ?></a>
    </p>
  </div>
</footer>
<!-- footer section -->
<script>
  //form submuit news letter

  let submitBtnTwo = document.getElementById('submit-newsletter');

  submitBtnTwo.addEventListener('click', function() {
    let emailNewsletter = document.getElementById('email-newsletter');

    if (emailNewsletter.value == '' || !/^\S+@\S+\.\S+$/.test(emailNewsletter.value)) {
      emailNewsletter.style.border = '1px solid red';
    } else {
      emailNewsletter.style.border = '';
    }

    if (emailNewsletter.value == '' || !/^\S+@\S+\.\S+$/.test(emailNewsletter.value)) {
      console.log('Validation Failed');
    } else {
      let data = {
        email: emailNewsletter.value
      };
      let url = 'ajax-req2.php';
      sendTheDataTwo(data, url);
    }


  });


  function isValidPhoneNumberTwo(phone) {
    return /^\d+$/.test(phone);
  }

  function sendTheDataTwo(data, url) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.status) {
            document.getElementById('newsletter-form').reset();
            Swal.fire({
              title: "Thank You!",
              text: response.message,
              icon: "success"
            });
          } else {
            Swal.fire({
              title: "Sorry!",
              text: response.message,
              icon: "error"
            });
          }
        } else {
          console.error('HTTP error! Status:', xhr.status);
        }
      }
    };

    xhr.onerror = function() {
      console.error('Request failed.');
    };

    xhr.send(JSON.stringify(data));
  }
</script>
<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->
</body>

</html>