<?php 
include "../config/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
if(!isset($_SESSION['response']))
{
  header('Location: ../../index.php');

}

$id = $_SESSION['response'];


$sql = "SELECT * FROM tb_schoolprofile";
$result = $conn->query($sql);
$row2 = $result->fetch_assoc();

$sql = "SELECT * FROM tb_studentinfo WHERE user_id = $id ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$sql1 = "SELECT * FROM tb_grades WHERE user_id = $id ";
$result1 = $conn->query($sql1);
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
            <a class="navbar-brand" href="#"><?php echo $row2['name']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="userdashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="userprofile.php">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="egrades.php">Egrades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config/logout.php">Logout</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

    <section class="content">

        <div class="col-sm p-3 min-vh-100">
          <div class="shadow p-3 mb-5 bg-body round">

            <div class="container mt-3">

              <h1 style="margin-bottom: 20px;">E-Grades</h1>



              <div class="row">
                <div class="col-md-6">

                  <p><strong> Name: </strong><?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></p>
                  <p><strong>Course: </strong><?php echo $row['course']; ?></p>
                  <p><strong>Status:</strong> <span style="padding: 10px" class="badge bg-success"><?php 
                  if($row['status'] == 1)
                  {
                    echo "ENROLLED";
                  }
                  ?></span>
                  </p>

                </div>
                <div class="col-md-6">
                  <p><strong>Year: </strong><?php echo $row['year']; ?></p>
                  <p><strong>Section: </strong><?php echo $row['section']; ?></p>

                </div>
              </div>

              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Subject</th>
                      <th>Instructor</th>
                      <th>Prelim</th>
                      <th>Midterm</th>
                      <th>Finals</th>
                      <th>Average</th>
                      <th>Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if ($result1->num_rows > 0) {
                      // output data of each row
                      while($row = $result1->fetch_assoc()) {
                        echo '<tr>

                        <td>'.$row['subject'].'</td>
                        <td>'.$row['instructor'].'</td>
                        <td>'.$row['prelim'].'</td>
                        <td>'.$row['midterm'].'</td>
                        <td>'.$row['finals'].'</td>
                        <td>'.$row['average'].'</td>
                        <td>'.$row['remarks'].'</td>
  
  
                      </tr>';
                      }
                    }
                    ?>
                    
                  </tbody>
                </table>
              </div>


            </div>
          </div>
        </div>


      </section>

    
</body>

</html>