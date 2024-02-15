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
$message = "SELECT * FROM tb_messages";
$resultmessage = $conn->query($message);
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
                        <a class="nav-link" href="classlist.php">Class List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="messages.php">Messages</a>
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
    if(isset($_SESSION['messagedeleted']))
    {
        echo $_SESSION['messagedeleted'];
        unset($_SESSION['messagedeleted']);
    }
    ?>

    <div class="shadow p-3 mb-5 bg-body round">
        <div class="container mt-3">
            <h2>Inbox</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Sender</th>
                            <th>Email Address</th>
                            <th>Date and Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($resultmessage->num_rows > 0) {
                            // output data of each row
                            while($row = $resultmessage->fetch_assoc()) {
                              echo '<form method="POST">
                              <tr>
                                  <td>'.$row['messageid'].'</td>
                                  <td>'.$row['name'].'</td>
                                  <td>'.$row['email'].'</td>
                                  <td>'.$row['date'].'</td>
                                  <td>
                                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                          Open
                                      </button>
                                      <input type="hidden" name = "id" value = "'.$row['messageid'].'">
                                      <input type="submit" class="btn btn-danger" value="Delete" formaction="../config/deletemessage.php">
                                  </td>
                              </tr>
                              </form>';

                              echo '<!-- The Modal -->
                              <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                              
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">'.$row['subject'].'</h4>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                              
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                    '.$row['message'].'
                                    </div>
                              
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                              
                                  </div>
                                </div>
                              </div>';
                            }
                          }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>