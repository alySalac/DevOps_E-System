<?php include "../config/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php
if (!isset($_SESSION['response'])) {
    header("Location:  ../../index.php");
    exit();
}

$list = "SELECT * FROM tb_studentinfo WHERE status = 1";
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
            <h2>Class List</h2>

            <table class="table" id="student-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Section</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultlist->num_rows > 0) {
                        // output data of each row
                        while ($row = $resultlist->fetch_assoc()) {
                            echo '<tr>
                        <form action="egrades.php" method="POST">
                            <td><input type="hidden" value="'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'" name="name">'.$row['fname'].' '.$row['mname'].' '.$row['lname'].'</td>
                            <td>
                                <input type="hidden" value="'.$row['username'].'" name="username">
                                '.$row['username'].'

                            </td>
                            <td> <input type="hidden" value="'.$row['course'].'" name="course">'.$row['course'].'</td>
                            <td> <input type="hidden" value="'.$row['year'].'" name="year">'.$row['year'].'</td>
                            <td> <input type="hidden" value="'.$row['section'].'" name="section">'.$row['section'].'</td>
                            <input type="hidden" value="'.$row['user_id'].'" name="user_id">
                            <td> <input type="submit" class="btn btn-primary" value="View">
                            <input type="submit" class="btn btn-success" value="Show" formaction = "showgrades.php"></td>
                        </form>
                    </tr>';
                        }
                    } else {
                        
                    }
                    ?>

                    
                </tbody>
            </table>

        </div>
    </div>

</body>

</html>