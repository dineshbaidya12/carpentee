<?php
include 'header.php';
?>
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
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d383112.9449491444!2d88.43769474203594!3d22.556154544226665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjLCsDUyJzM4LjMiTiA4OMKwMzgnNTIuMCJF!5e0!3m2!1sen!2sus!4v1584376029939!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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