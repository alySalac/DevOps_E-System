<?php
include "../config/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['response'])) {
    header("Location:  ../../index.php");
    exit();
}

 $user_id = $_POST['user_id'];
    $list = "SELECT * FROM tb_grades WHERE user_id = '$user_id'";
    $resultlist = $conn->query($list);

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
                        <a class="nav-link " aria-current="page" href="dashboard.php">Manage Content</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="manage.php">Manage Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="classlist.php">Class List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="messages.php">Messages</a>
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
    <div class="shadow p-3 mb-5 bg-body round">
        <div class="container mt-3">
            
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Grades</h1>
            </div>
          </div>
        </div>
      </div>




      <section class="content">
        <div class="container-fluid">

         


            <table class="table table-bordered" style="margin-top: 20px;">
              <thead>
                <tr>
                  <th>Subject</th>
                  <th>Instructor</th>
                  <th>Course</th>
                  <th>Year</th>
                  <th>Prelim</th>
                  <th>Midterms</th>
                  <th>Finals</th>
                  <th>Average</th>
                  <th>Remarks</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($resultlist->num_rows > 0) {
                  // output data of each row
                  while ($row = $resultlist->fetch_assoc()) {
                    echo '<tr>
                        <form action="" method="POST">
                            <td>'.$row['subject'].'</td>
                            <td>'.$row['instructor'].'</td>
                            <td>'.$row['course'].'</td>
                            <td>'.$row['year'].'</td>
                            <td>'.$row['prelim'].'</td>
                            <td>'.$row['midterm'].'</td>
                            <td>'.$row['finals'].'</td>
                            <td>'.$row['average'].'</td>
                            <td>'.$row['remarks'].'</td>
                            <td><input type="submit" class="btn btn-danger" value="Delete" formaction = "../config/gradedelete.php?id='.$row['grades_id'].'"></td>
                            
                        </form>
                    </tr>';
                  }
                } 
                ?>
              </tbody>


            </table>

          </div>

          <div class="row">

            <section class="col-lg-7 connectedSortable">

            </section>
          </div>

        </div>
      </section>
        </div>
    </div>



</body>

</html>