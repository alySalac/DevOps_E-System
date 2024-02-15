<?php 
  include "config/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  
  $schedule = "SELECT * FROM tb_schedule WHERE slot >= 1";
  $resultschedule = $conn->query($schedule);
  $sql = "SELECT * FROM tb_schoolprofile";
  $result = $conn->query($sql);
  $row2 = $result->fetch_assoc();
  ?>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $row2['name']; ?> - Enroll</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="config/registervalidation.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <!-- ======= Header ======= -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><?php echo $row2['name']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main id="main">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <br>
        <br>
        <?php
        if (isset($_SESSION['validation'])) {
          if ($_SESSION['validation'] == "OK") {
            echo '<div class="alert alert-success">
      Your application is Successfully Submitted, Please wait for your Enrollment approval!
    </div>';
          } else if ($_SESSION['validation'] == "FAILED") {
            echo '<div class="alert alert-danger">
     No Selected Schedule, Please try again
    </div>';
          }
        }
        ?>

        <?php
        session_unset();
        ?>

        <section>
          <form action="config/register.php" method="post">
            <div class="container mt-3">
              <h2>Select Your Appointment Schedule</h2>
              <br>
              <table class="table ">

                <?php
                if ($resultschedule->num_rows > 0) {
                  echo ' <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Slots</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>';
                  // output data of each row
                  while ($row = $resultschedule->fetch_assoc()) {
                    echo '
                                       <tr>
                                          <td>' . $row['date'] . ' | ' . $row['day'] . '</td>
                                          <td>' . $row['start_time'] . ' | ' . $row['end_time'] . '</td>
                                          <td>' . $row['slot'] . '</td>
                                          <td><input type="radio" name="selectsched" value="' . $row['shed_id'] . '" required></td>
                                  </tr>';
                  }
                } else {
                  echo '<div class="alert alert-danger">
                  <strong>No Available Schedule. </strong> Please wait for further announcement </a>.
                  <input type="hidden" name="selectsched" value="novalue">
                </div>';
                }

                ?>
                </tbody>
              </table>
            </div>
        </section>
        <br>


        <section class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-6">
                <h2>I. Create Student Portal Account</h2>
                <br>
                <div class="card">
                  <!-- /.card-header -->
                  <!-- form start -->

                  <div class="card-body">
                    <div class="form-row">
                      <!-- Email Address Input -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username" name="user" id="name">
                      </div>
                      <!-- Additional Textbox on the Right Side -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputAdditional">User Type</label>
                        <input type="number" class="form-control" placeholder="@student" name="extension" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" placeholder="Password" name="pass" id="pass">
                    </div>
                  </div>
                  <!-- /.card-body -->


                </div>
              </div>

              <div class="col-md-6">
                <h2>II. Educational Attainment</h2>
                <br>
                <div class="card">
                  <!-- /.card-header -->
                  <!-- form start -->

                  <div class="card-body">
                    <div class="form-row">
                      <!-- Email Address Input -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Elementary</label>
                        <input type="text" class="form-control" placeholder="Enter school" name="elem" id="elem" required>
                      </div>
                      <!-- Additional Textbox on the Right Side -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputAdditional">Graduation Year</label>
                        <input type="number" class="form-control" name="elemyear" id="elemyear" required max="9999" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <!-- Email Address Input -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Junior High School</label>
                        <input type="text" class="form-control" placeholder="Enter school" name="jhs" id="jhs" required>
                      </div>
                      <!-- Additional Textbox on the Right Side -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputAdditional">Graduation Year</label>
                        <input type="number" class="form-control" name="jhsyear" id="jhsyear" required max="9999" required>
                      </div>
                    </div>

                    <div class="form-row">
                      <!-- Email Address Input -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Senior High School</label>
                        <input type="text" class="form-control" placeholder="Enter school" name="shs" id="shs" required>
                      </div>
                      <!-- Additional Textbox on the Right Side -->
                      <div class="form-group col-md-6">
                        <label for="exampleInputAdditional">Graduation Year</label>
                        <input type="number" class="form-control" id="shsyear" name="shsyear" required max="9999" required>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->


                </div>
              </div>

              <section class="container mt-4">
                <div class="row">
                  <div class="col-md-12">
                    <h2>III. Enrollment Form</h2>
                    <br>
                    <div class="card">
                      <!-- /.card-header -->
                      <!-- form start -->


                      <div class="card-body">
                        <div class="form-group">
                          <label for="inputName">First Name</label>
                          <input type="text" class="form-control" id="fname" placeholder="Enter your first name" name="fname" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Middle Name</label>
                          <input type="text" class="form-control" id="mname" placeholder="Enter your middle name" name="mname" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Last Name</label>
                          <input type="text" class="form-control" id="lname" placeholder="Enter your last name" name="lname" required>
                        </div>

                        <div class="form-group">
                          <label for="genderSelect">Gender</label>
                          <select class="form-control" id="genderSelect" name="gender">
                            <option value="" selected></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="courseSelect">Course</label>
                          <select class="form-control" name="course" id="courseSelect">
                            <option value="" selected></option>
                            <option value="BS Computer Science">BS Computer Science</option>
                            <option value="BS Information Technology">BS Information Technology</option>
                            <option value="BS Information Technology">BS Information Technology</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="courseSelect">Year</label>
                          <select class="form-control" name="year" id="yearSelect">
                            <option value="" selected></option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="datepicker">Date of Birth</label>
                          <input type="date" class="form-control" id="datepicker" placeholder="Select date" name="birthday" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Home Address</label>
                          <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Phone Number (Philippine Format)</label>
                          <input type="text" class="form-control" name="number" id="number" required pattern="^(09|\+639)\d{9}$" title="Please enter a valid Philippine phone number starting with '09' or '+639' followed by 9 digits">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Guardian name</label>
                          <input type="text" class="form-control" name="guardianname" id="elemyear" required>
                        </div>

                        <div class="form-group">
                          <label for="inputName">Phone Number (Philippine Format)</label>
                          <input type="text" class="form-control" name="guardiannumber" id="guardiannumber" required pattern="^(09|\+639)\d{9}$" title="Please enter a valid Philippine phone number starting with '09' or '+639' followed by 9 digits">
                        </div>

                        <div class="form-group">
                          <label for="inputName">Guardian Address</label>
                          <input type="text" class="form-control" name="guardianaddress" id="guardianaddress" required>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      <!-- /.card-body -->

                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </section>

      </div>
      </form>
    </section><!-- End Services Section -->

    <!-- Footer -->
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
                <i class="fas fa-gem me-3"></i>Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer content. Lorem ipsum
                dolor sit amet, consectetur adipisicing elit.
              </p>
            </div>

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                info@example.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
              <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelector('form').addEventListener('submit', function(event) {
        // Iterate through all text and textarea input elements
        document.querySelectorAll('input[type="text"], textarea').forEach(function(input) {
          // Convert each input value to sentence case
          input.value = toSentenceCase(input.value);
        });
      });

      function toSentenceCase(str) {
        return str.replace(/\w\S*/g, function(txt) {
          return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
      }
    });
  </script>

</body>

</html>