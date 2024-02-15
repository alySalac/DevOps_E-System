<?php include "../config/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_SESSION['response']))
{
  header("Location:  ../../index.php");
  exit(); 
}
$uploadDir = '../../images/cover/';
$images = glob($uploadDir . '*.{jpg,jpeg,png,gif,JPG}', GLOB_BRACE);

$imgdir = '../../images/img/';
$image1 = glob($imgdir . '*.{jpg,jpeg,png,gif,JPG}', GLOB_BRACE);

//DETAILS
$details = "SELECT * FROM tb_schoolprofile WHERE schoolprofile_id = 1";
$runresult = $conn->query($details);
$row = $runresult->fetch_assoc();

//COVER
$cover = "SELECT * FROM tb_cover";
$runcover = $conn->query($cover);

//COVER
$cards = "SELECT * FROM tb_cards";
$runcards = $conn->query($cards);
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management Dashboard</title>
  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ADMIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Manage Content</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage.php">Manage Students</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="classlist.php">Class List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messages.php">Messages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../config/logout.php">Logout</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Logout</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="col-sm p-3 min-vh-100">
    <main>
      <?php
      if (isset($_SESSION['delete'])) {
        if ($_SESSION['delete'] == "deletecover") {
          echo '<div class="alert alert-danger">
          <strong>Success!</strong> Cover Sucessfully Deleted</a>.
        </div>';
        unset($_SESSION['delete']);
        } else if ($_SESSION['delete'] == "deleteimg") {
          echo '<div class="alert alert-danger">
          <strong>Success!</strong> Img Sucessfully Deleted</a>.
        </div>';
          unset($_SESSION['delete']);
        }
      }
      if (isset($_SESSION['change'])) {
        if ($_SESSION['change'] == "success") {
          echo '<div class="alert alert-success">
          <strong>Success!</strong> Details Sucessfully Updated</a>.
        </div>';

          unset($_SESSION['change']);
        }
      }
      if (isset($_SESSION['updatecover'])) {
        if ($_SESSION['updatecover'] == "success") {
          echo '<div class="alert alert-success">
          <strong>Success!</strong> Cover Successfully Updated</a>.
        </div>';

          unset($_SESSION['updatecover']);
        }
      }
      if(isset($_SESSION['upload']))
      {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
      }
      ?>
      <section>
        <form action="../config/changedetails.php" method="post">
          <div id="footer" class="shadow p-3 mb-5 bg-body rounded">
            <h3 style="text-align: center;"> School Profile </h3>
            <div class="container mt-3">
              <div class="table-responsive">
                <table class="table table-borderless">
                  <thead>
                    <tr>

                      <th>Category</th>
                      <th>Details</th>

                    </tr>
                  </thead>
                  <tbody>

                    <tr>
                      <td><i class="fas fa-user"></i> Name</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school name here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolName" required="" value="<?php echo $row['name']; ?>">
                          <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><i class="fas fa-map-marker-alt"></i> Location</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school address here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolAddress" required="" value="<?php echo $row['location']; ?>">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><i class="fas fa-envelope"></i> Email Address</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school email here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolEmail" required="" value="<?php echo $row['email']; ?>">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><i class="fas fa-mobile-alt"></i> Mobile Number</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school phone number here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolMobilePhone" required="" value="<?php echo $row['number']; ?>">
                          <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                      </td>

                    </tr>
                    <tr>
                      <td><i class="fas fa-phone"></i> Telephone Number</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school tel number here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolTelePhone" required="" value="<?php echo $row['telnumber']; ?>">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                      </td>
                    </tr>

                    <tr>
                      <td><i class="fas fa-comment"></i> Description</td>
                      <td>
                        <div class="input-group">
                          <input type="text" placeholder="Insert a school description here" style="background-color: inherit; width: 250px; height: 30px; padding: 20px; border-style: solid;" name="schoolDescription" required="" value="<?php echo $row['description']; ?>">
                          <span class="input-group-text"><i class="fas fa-comment"></i></span>
                        </div>


                      </td>
                    </tr>



                    <tr>
                      <td>
                      </td>
                      <td>
                        <button style="float: right" type="submit" class="btn btn-primary" name='submit'>
                          <i class="fas fa-save"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </form>

        <div class="shadow p-3 mb-5 bg-body rounded" style="text-align: center">
          <h3 id="carousel"> Cover Page </h3>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carouselModal">
            Upload
          </button>
          <!-- grid layout -->
          <?php
          if ($runcover->num_rows > 0) {
            echo '<div class="row" style="margin-top: 0px; display: flex; justify-content: center;">'; // Start main row
            while ($row1 = $runcover->fetch_assoc()) {
              echo '<div class="col-md-4">'; // Each cover photo in a column
              echo '<div class="card" style="margin-bottom: 20px;">';
              echo '<img class="card-img-top" src="' . $row1['path'] . '" alt="Cover image" style="height: 200px;">'; // Set a fixed height
              echo '<div class="card-body">';
              echo '<form method="POST">';
              echo '<h5 class="card-title">';
              echo '<input type="text" class="form-control" value="' . $row1['title'] . '" style="border: none;" placeholder="Insert a title" name="title">';
              echo '<input type="hidden" value="' . $row1['cover_id'] . '" name="id">';
              echo '<input type="hidden" value="' . $row1['path'] . '" name="name">';
              echo '</h5>';
              echo '<p class="card-text">';
              echo '<textarea placeholder="Insert a Caption" class="form-control" name="caption" style="border: none; background-color: inherit;">' . $row1['caption'] . '</textarea></p>';
              echo '<button formaction="../config/updatecover.php?id=' . $row1['cover_id'] . '" type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i></button>';
              echo '<button formaction="../config/deletecover.php?link=' . $row1['path'] . '" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
              echo '</form>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            echo '</div>'; // End main row
          } else {
            echo '<div class="row" style="margin-top: 0px; display: flex; justify-content: center;">';
            echo '<div class="col-md-12 col-lg-8 text-center">';
            echo '<img src="../../assets/icon/empty.gif" alt="Empty Logo" style="width: 50%">';
            echo '<br>';
            echo '<p><strong>You can upload a cover photo for your website homepage</strong></p>';
            echo '</div>';
            echo '</div>';
          }
          ?>
          <!-- end of coding here -->
        </div>

        <div class="shadow p-3 mb-5 bg-body rounded" style="text-align: center">
          <h3 id="gallery"> Cards and Images </h3>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal">
            Upload
          </button>
          <!-- grid layout -->
          <?php
          if ($runcards->num_rows > 0) {
            echo '<div class="row" style="margin-top: 20px; display: flex; justify-content: center;">'; // Start main row
            while ($row2 = $runcards->fetch_assoc()) {
              echo '<div class="col-md-4">'; // Each card in a column
              echo '<div class="card" style="margin-bottom: 20px;">';
              echo '<img class="card-img-top" src="' . $row2['path'] . '" style="height: 300px; object-fit: cover;" alt="Card image">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title">';
              echo '<form method="POST">';
              echo '<input type="text" class="form-control" style="border: none;" placeholder="Insert a title" name="title" value="' . $row2['title'] . '">';
              echo '</h5>';
              echo '<p class="card-text">';
              echo '<textarea placeholder="Insert a Caption" class="form-control" name="caption" style="border: none; background-color: inherit;">' . $row2['caption'] . '</textarea>';
              echo '</p>';
              echo '<button formaction="../config/updatecards.php?id=' . $row2['card_id'] . '" type="submit" class="btn btn-primary" name="submit"><i class="fas fa-save"></i></button>';
              echo '<button formaction="../config/deleteimg.php?link=' . $row2['path'] . '" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>';
              echo '</form>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            echo '</div>'; // End main row
          } else {
            echo '<div class="row" style="margin-top: 20px; display: flex; justify-content: center;">';
            echo '<div class="col-md-12 col-lg-8 text-center">';
            echo '<img src="../../assets/icon/empty.gif" alt="Empty Logo" style="width: 50%">';
            echo '<br>';
            echo '<p><strong> You can upload cards and images to showcase in your home </strong></p>';
            echo '</div>';
            echo '</div>';
          }
          ?>
          <!-- end of coding here -->
        </div>
      </section>

      <div class="modal" id="carouselModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload a cover photo</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../config/uploadcover.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" required="">
                <div class="modal-footer">
                  <input type="submit" value="Upload" class="btn btn-primary" name="submit">

                </div>

              </form>
            </div>

          </div>
        </div>
      </div>

      <div class="modal" id="imageModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Upload an image</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../config/uploadimg.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload" required="">
                <br>
                <br>
                <div class="modal-footer">
                  <input type="submit" value="Upload" class="btn btn-primary" name="submit">


              </form>
            </div>

          </div>
        </div>
      </div>
  </div>
  </main>
  </div>
</body>

</html>