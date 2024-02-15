<?php include "../config/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
$user_id = $_POST['user_id'];

$subject = "SELECT * FROM tb_studentinfo where user_id = '$user_id'";
$resultsubject = $conn->query($subject);
$row1 = $resultsubject->fetch_assoc();
$course = $row1['course'];
$year = $row1['year'];

$subject = "SELECT * FROM tb_subject where course = '$course' AND years = '$year'";
$resultsubject = $conn->query($subject);
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

    <div class="col-sm p-3 min-vh-100">
        <div class="shadow p-3 mb-5 bg-body round">
            <div class="container mt-3">
                <h2>E-Grades</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">


                            <p>Name: <?php echo $row1['fname'] .' '.$row1['mname'].' '.$row1['lname']; ?></p>
                            <p>Course: <?php echo $course; ?></p>
                        </div>
                        <div class="col-md-6">

                            <p>Year: <?php echo $year; ?></p>
                            <p>Section: <?php echo $row1['section']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Instructor</th>
                                <th style="width: 10%">Prelim</th>
                                <th style="width: 10%">Midterm</th>
                                <th style="width: 10%">Finals</th>
                                <th style="width: 10%">Average</th>
                                <th style="width: 10%">Remarks</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                if ($resultsubject->num_rows > 0) {
                  // output data of each row
                  while ($row = $resultsubject->fetch_assoc()) {
                    echo ' <form action="../config/updategrades.php" method="POST">
                                    <tr>
                                        <td>' . $row['subjectname'] . '</td>
                                        <td>' . $row['instructor'] . '</td>
                                        <td><input type="text" value="" class="form-control" name="prelim"> </td>
                                        <td><input type="text" value="" class="form-control" name="midterm"></td>
                                        <td><input type="text" value="" class="form-control" name="finals"></td>
                                        <td><input type="text"  value="" class="form-control" name="average"></td>
                                        <td><input type="text"  value="" class="form-control" name="remarks"></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="Upload" name = "create">
                                            <input type="hidden"  value="' . $row['subjectname'] . '" class="form-control" name="subject">
                                            <input type="hidden"  value="' . $row['instructor'] . '" class="form-control" name="instructor">
                                            <input type="hidden"  value="' . $row1['course'] . '" class="form-control" name="course">
                                            <input type="hidden"  value="' . $row1['year'] . '" class="form-control" name="year">
                                            <input type="hidden"  value="' . $user_id . '" class="form-control" name="user_id">
                                        </td>
                                    </tr>
                                </form>';
                  }
                }
                ?>
                        </tbody>
                    </table>
                </div>
                 
          <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all input elements
        var prelimInputs = document.querySelectorAll('input[name="prelim"]');
        var midtermInputs = document.querySelectorAll('input[name="midterm"]');
        var finalsInputs = document.querySelectorAll('input[name="finals"]');
        var averageInputs = document.querySelectorAll('input[name="average"]');
        var remarksInputs = document.querySelectorAll('input[name="remarks"]');

        // Calculate average and determine remarks dynamically
        function calculateAverageAndRemarks() {
            for (var i = 0; i < prelimInputs.length; i++) {
                var prelim = parseFloat(prelimInputs[i].value) || 0;
                var midterm = parseFloat(midtermInputs[i].value) || 0;
                var finals = parseFloat(finalsInputs[i].value) || 0;

                var average = (prelim + midterm + finals) / 3;
                var remarks = (average >= 75 && average <= 100) ? 'PASSED' : 'FAILED';

                averageInputs[i].value = average.toFixed(2);
                remarksInputs[i].value = remarks;
            }
        }

        // Add event listeners to input elements
        prelimInputs.forEach(input => input.addEventListener('input', calculateAverageAndRemarks));
        midtermInputs.forEach(input => input.addEventListener('input', calculateAverageAndRemarks));
        finalsInputs.forEach(input => input.addEventListener('input', calculateAverageAndRemarks));

        // Initial calculation on page load
        calculateAverageAndRemarks();
    });
</script>
            </div>
        </div>
    </div>

</body>
</html>