<?php
include "pages/config/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_SESSION['status'])) {
  session_unset();
}

$sql = "SELECT * FROM tb_schoolprofile";
$result = $conn->query($sql);
$row2 = $result->fetch_assoc();

$sql1 = "SELECT * FROM tb_cover";
$result1 = $conn->query($sql1);

$sql2 = "SELECT * FROM tb_cards";
$result2 = $conn->query($sql2);
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $row2['name']; ?> - Home</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .carousel-item {
      height: 400px;

      .captcha {
        display: flex;
        align-items: center;
      }

      #captchaText {
        margin-left: 10px;
        user-select: none;
        /* Prevent text selection */
      }

      /* Adjust the height as needed */
    }
  </style>



</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?php echo $row2['name']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="pages/enrollform.php">Enroll Now</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/login.php">Login</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- ======= Hero Section ======= -->

  <main id="main">

    <?php
    if (isset($_SESSION['send'])) {
      echo $_SESSION['send'];
    }
    unset($_SESSION['send']);

    ?>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        if ($result1->num_rows > 0) {
          // output data of each row
          while ($row = $result1->fetch_assoc()) {
            echo '<div class="carousel-item active">
        <img src="' . $row['new_path'] . '" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>' . $row['title'] . '</h5>
          <p>' . $row['caption'] . '</p>
        </div>
      </div>';
          }

          echo ' </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>';
        }
        ?>


        <br>



        <div class="container">
          <div class="row justify-content-center">
            <?php
            if ($result2->num_rows > 0) {
              // output data of each row
              while ($row = $result2->fetch_assoc()) {
                echo '
        <div class="col-lg-4">
          <div class="card mb-3" style="width: 18rem;">
            <img src="' . $row['newpath'] . '" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">' . $row['title'] . '</h5>
              <p class="card-text">' . $row['caption'] . '</p>
            </div>
          </div>
        </div>';
              }
            }
            ?>
          </div>
        </div>


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="hero">
            <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>Contact</h2>
                <p>If you have any inquiries or questions, please feel free to use the contact form below.</p>
              </div>
              <br>

              <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch">
                  <div class="info">
                    <div class="schoolname">
                      <i class=""></i>
                      <h4>School:</h4>
                      <p><?php echo $row2['name']; ?></p>
                    </div>

                    <div class="address">
                      <i class=""></i>
                      <h4>Location:</h4>
                      <p><?php echo $row2['location']; ?></p>
                    </div>

                    <div class="email">
                      <i class=""></i>
                      <h4>Email:</h4>
                      <p><?php echo $row2['email']; ?></p>
                    </div>

                    <div class="phone">
                      <i class=""></i>
                      <h4>Phone Number:</h4>
                      <p><?php echo $row2['number']; ?></p>
                    </div>

                    <div class="telphone">
                      <i class=""></i>
                      <h4>Telephone Number:</h4>
                      <p><?php echo $row2['telnumber']; ?></p>
                    </div>
                  </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                  <form action="pages/config/contactform.php" method="post" role="form" class="captcha-form" onsubmit="return validateForm()">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name">Your Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name">Subject</label>
                      <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Message</label>
                      <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <br>
                    <div class="form-group captcha">
                      <label for="captcha">Enter the Captcha code:</label>
                      <b><span id="captchaText" oncopy="return false" oncut="return false" onpaste="return false"></span></b>
                      <br>
                    </div>
                    <div class="form-group">
                      <input type="text" id="captchaInput" class="form-control" required>
                    </div>
                    <br>
                    <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
                  </form>
                </div>
                <script>
                  function generateCaptcha() {
                    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                    let captchaText = '';
                    for (let i = 0; i < 6; i++) {
                      captchaText += characters.charAt(Math.floor(Math.random() * characters.length));
                    }
                    document.getElementById('captchaText').textContent = captchaText;
                  }

                  function validateForm() {
                    const captchaInput = document.getElementById('captchaInput').value.trim();
                    const captchaText = document.getElementById('captchaText').textContent.trim();
                    if (captchaInput.toLowerCase() !== captchaText.toLowerCase()) {
                      alert('Incorrect captcha, please try again.');
                      generateCaptcha(); // Regenerate captcha on wrong attempt
                      return false;
                    }
                    return true;
                  }

                  // Generate captcha when page loads
                  generateCaptcha();

                  // Prevent copying via mouse events
                  document.getElementById('captchaText').addEventListener('mousedown', function(event) {
                    alert('Copying is disabled');
                    event.preventDefault();
                  });

                  // Prevent copying via keyboard events
                  document.getElementById('captchaText').addEventListener('keydown', function(event) {
                    if (event.ctrlKey === true && (event.key === 'c' || event.key === 'C')) {
                      alert('Copying is disabled');
                      event.preventDefault();
                    }
                  });
                </script>

              </div>

            </div>
          </div>
        </section><!-- End Contact Section -->

        <style>
          .hero {
            background-color: #f8f9fa;
            padding: 60px 0;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
          }
        </style>

        <footer class="text-center text-lg-start bg-body-tertiary text-muted">
          <br>

          <!-- Section: Links  -->
          <section class="">
            <div class="container text-center text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    <i class="fas fa-gem me-3"></i>Schoolname
                  </h6>
                  <p>
                    <?php echo $row2['name']; ?>
                  </p>
                </div>

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                  <p><i class="fas fa-home me-3">EMAIL: </i><?php echo $row2['email']; ?></p>
                  <p>
                    <i class="fas fa-envelope me-3">NUMBER: </i>
                    <?php echo $row2['number']; ?>
                  </p>
                  <p><i class="fas fa-phone me-3">TELNUMBER: </i><?php echo $row2['telnumber']; ?></p>
                  <p><i class="fas fa-print me-3">ABOUT: </i><?php echo $row2['description']; ?></p>
                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->

          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/"><?php echo $row2['name']; ?></a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->



  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>