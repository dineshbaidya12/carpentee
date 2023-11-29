<?php
include 'header.php';
?>
<style>
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
    height: 262px;
    overflow: auto;
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
        $sql = "SELECT * FROM projects WHERE status = 'active' ORDER BY created_date DESC";
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
                  <span class="heading-card"><?php echo $row['name']; ?></span>
                  <p>
                    <?php
                    $details = $row['details'];
                    if (strlen($details) > 120) {
                      echo substr($details, 0, 120) . '<a href="project-details.php?pid=' . $id . '">...</a>';
                    } else {
                      echo $details;
                    }
                    ?>
                  </p>
                  <a href="project-details.php?pid=<?php echo $id ?? 0; ?>" class="btn btn-primary click">CLick</a>
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
include 'footer.php';
?>