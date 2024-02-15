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
$approval = "SELECT * FROM tb_studentinfo WHERE status = 0";
$resultapproval = $conn->query($approval);

$approval1 = "SELECT * FROM tb_studentinfo WHERE status = 1";
$resultapproval1 = $conn->query($approval1);

$schedule = "SELECT * FROM tb_schedule";
$resultschedule = $conn->query($schedule);

$subject = "SELECT * FROM tb_subject";
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the time input element
            var timeInput = document.getElementById("time-input");
            var endTimeInput = document.querySelector('input[name="end-time"]');

            // Add event listener for input change
            timeInput.addEventListener("change", function() {
                // Get the selected time value
                var selectedTime = timeInput.value;

                // Parse the selected time
                var timeParts = selectedTime.split(':');
                var hours = parseInt(timeParts[0], 10);
                var minutes = parseInt(timeParts[1], 10);

                // Adjust for AM/PM
                var amPm = (hours >= 12) ? 'AM' : 'PM';
                hours = (hours % 12) || 12;

                // Convert to Date object
                var selectedDateTime = new Date();
                selectedDateTime.setHours(hours, minutes);

                // Add 10 hours to the selected time
                var endTime = new Date(selectedDateTime.getTime() + (10 * 60 * 60 * 1000));

                // Format the end time
                var formattedEndHours = ('0' + (endTime.getHours() % 12 || 12)).slice(-2);
                var formattedEndTime = formattedEndHours + ':' + ('0' + endTime.getMinutes()).slice(-2) + ' ' + amPm;

                // Update the end time display
                var endTimeParagraph = document.getElementById("end-time");
                endTimeParagraph.textContent = formattedEndTime;
                endTimeInput.value = formattedEndTime;
            });
        });
    </script>

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
                        <a class="nav-link active" href="manage.php">Manage Students</a>
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

    <?php
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>


    <div class="col-sm p-3 min-vh-100">
        <main>
            <div class="shadow p-3 mb-5 bg-body round">
                <div class="container mt-3">
                    <h2>Enrollment Scheduling Appointment</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Slots</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultschedule->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $resultschedule->fetch_assoc()) {
                                        echo '
                                        <form method = "POST"><tr>
                                          <td>' . $row['date'] . ' | ' . $row['day'] . '</td>
                                          <td>' . $row['start_time'] . '</td>
                                          <td>' . $row['end_time'] . '</td>
                                          <td>' . $row['slot'] . '</td>
                                          <td>
                                              <input type="submit" class="btn btn-danger" value="Delete" formaction="../config/deletesched.php?id=' . $row['shed_id'] . '">
                                          </td>
                                  </tr></form>';
                                    }
                                } else {
                                    echo "0 results";
                                }

                                ?>

                                <form action="../config/addsched.php" method="POST">
                                    <tr>
                                        <td> <input type="date" name="date" id="date-input" class="form-control" required=""></td>
                                        <td><input type="time" name="time" id="time-input" class="form-control" required=""></td>
                                        <td><input type="hidden" name="end-time" class="form-control" value="">
                                            <p id="end-time"></p></input>
                                        </td>
                                        <td><input type="number" min="1" name="slots" class="form-control" required=""></td>
                                        <td><input type="submit" class="btn btn-primary" value="  Add "> </td>
                                    </tr>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var today = new Date().toISOString().split('T')[0];
                    document.getElementById("date-input").setAttribute("min", today);

                    document.getElementById("add-schedule-form").addEventListener("submit", function(event) {
                        var selectedDate = document.getElementById("date-input").value;
                        if (selectedDate < today) {
                            alert("You can't schedule appointments before today.");
                            event.preventDefault();
                        }
                    });
                });
            </script>

            <div class="shadow p-3 mb-5 bg-body round">
                <div class="container mt-3">
                    <h2>Student Approval Requests</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Appointment Date</th>
                                    <th>Time</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultapproval->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $resultapproval->fetch_assoc()) {
                                        if ($row['status'] == 0) {
                                            $status = "PENDING";
                                            echo '
                                    <form method = "POST">
                                      <tr>
                                      <td>' . $row['appointment_date'] . '</td>
                                      <td>' . $row['time'] . '</td>
                                      <td>' . $row['username'] . '</td>
                                      <td>' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . '</td>
                                      <td>' . $row['course'] . '</td>
                                      <td>' . $row['year'] . '</td>
                                      <td>' . $status . '</td>
                                      <td><input type="submit" value = "OPEN" class="btn btn-primary" formaction = "showapproval.php?id=' . $row['student_id'] . '"></td>
                                      </tr>
                                      </form>
                                      ';
                                        } else {
                                            $status = "Accepted";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="shadow p-3 mb-5 bg-body round">
                <div class="container mt-3">
                    <h2>Master List</h2>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Year</th>
                                    <th>Section</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultapproval1->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $resultapproval1->fetch_assoc()) {
                                        if ($row['status'] == 1) {
                                            $status = "ENROLLED";
                                            echo '
                                    <form method = "POST">
                                      <tr>
                                      <td>' . $row['username'] . '</td>
                                      <td>' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'] . '</td>
                                      <td>' . $row['course'] . '</td>
                                      <td>' . $row['year'] . '</td>
                                      <td>' . $row['section'] . '</td>
                                      <td>' . $status . '</td>
                                      <td><input type="submit" value = "OPEN" class="btn btn-primary" formaction = "showmasterlist.php?id=' . $row['student_id'] . '"></td>
                                      </tr>
                                      </form>
                                      ';
                                        } else {
                                            $status = "Accepted";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="shadow p-3 mb-5 bg-body round">
                <div class="container mt-3">
                    <h2>Subjects</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Course</th>
                                    <th>Instructor</th>
                                    <th>Year</th>
                                    <th>Hours</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($resultsubject->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $resultsubject->fetch_assoc()) {
                                        echo '<form method = "POST"><tr>
                                        <td><input type="text" value="' . $row['subjectname'] . '" class="form-control" name="subject" required=""></td>
    
                                        <td> <select class="form-control" name="course">
                                            <option value="' . $row['course'] . '" selected="">' . $row['course'] . '</option>
                                                <option value="BS Computer Engineering" >BS Computer Engineering</option>
                                                <option value="BS Information Technology">BS Information Technology</option>
                                                <option value="BS Computer Science">BS Computer Science</option>
                                            </select>
    
                                        </td>
                                        <td><input type="text" value="' . $row['instructor'] . '" class="form-control" name="instructor" required=""></td>
                                        <td style="width: 10%"><select class="form-control" name="year">
                                                <option value="' . $row['years'] . '" selected ="">' . $row['years'] . '</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                            </select></td>
                                        <td style="width: 10%"><input type="number" min="1" value="' . $row['numhours'] . '" class="form-control" name="hours" required=""></td>
                                        <td>
                                            <input type = "hidden" name = "subject_id" value = "' . $row['subject_id'] . '">
                                            <input type="submit" class="btn btn-success" value="Update" formaction="../config/updatesubject.php">
                                            <input type="submit" class="btn btn-danger" value="Delete" formaction="../config/deletesubject.php">
                                        </td>
                                    </tr></form>';
                                    }
                                }

                                ?>

                                <tr>
                                    <form method="POST">

                                        <td><input type="text" name="subject" class="form-control" placeholder="Type an subject" required=""></td>
                                        <td><select class="form-control" name="course">
                                                <option selected="">Select course...</option>
                                                <option value="BS Computer Engineering">BS Computer Engineering</option>
                                                <option value="BS Information Technology">BS Information Technology</option>
                                                <option value="BS Computer Science">BS Computer Science</option>
                                            </select></td>
                                        <td><input type="text" name="instructor" class="form-control" placeholder="Type a instructor" required=""></td>
                                        <td> <select name="year" class="form-select" id="inputCourse" required="">
                                                <option selected=""> </option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                            </select></td>
                                        <td><input type="number" name="hours" class="form-control" placeholder="Type a hours" required=""></td>
                                        <td>
                                            <input type="submit" class="btn btn-primary" value="Add" formaction="../config/addsubject.php">
                                        </td>
                                    </form>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>