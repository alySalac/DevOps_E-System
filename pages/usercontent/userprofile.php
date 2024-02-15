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

$sql = "SELECT * FROM tb_studentinfo WHERE user_id = $id ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql = "SELECT * FROM tb_schoolprofile";
$result = $conn->query($sql);
$row2 = $result->fetch_assoc();


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
                        <a class="nav-link active" href="userprofile.php">User Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="egrades.php">Egrades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../config/logout.php">Logout</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>
    
    <?php 
if(isset($_SESSION['pass']))
{
    echo $_SESSION['pass'];
    unset($_SESSION['pass']);
}
?>

    
    <section class="content">

<div class="col-sm p-3 min-vh-100">
    <!-- ALERT -->

    <!-- ALERT -->
    <!-- ALERT -->

    <!-- ALERT -->
    <div class="shadow p-3 mb-5 bg-body round">
        <div class="container mt-3">
            <h1 style="margin-bottom: 20px;">Account Details</h1>





            <div class="container">
                <div class="row">
                    <div class="col-sm-6">


                        <label>Username:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['username']; ?>

                    </div>


                    <div class="col-sm-6">
                        <label>First Name:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['fname']; ?></div>


                    <div class="col-sm-6">
                        <label>Middle Name:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['mname']; ?></div>


                    <div class="col-sm-6">
                        <label>Last Name:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['lname']; ?></div>


                    <div class="col-sm-6">
                        <label>Sex:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['gender']; ?>
                    </div>


                    <div class="col-sm-6">
                        <label>Course:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['course']; ?>
                    </div>


                    <div class="col-sm-6">
                        <label>Year:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['year']; ?></div>


                    <div class="col-sm-6">
                        <label>Section:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['section']; ?>
                    </div>


                    <div class="col-sm-6">
                        <label>Birthdate:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['birthday']; ?></div>


                    <div class="col-sm-6">
                        <label>Home Address:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['address']; ?> </div>


                    <div class="col-sm-6">
                        <label>Phone Number:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['num']; ?> </div>


                    <div class="col-sm-6">
                        <label>Guardian Name:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['guardian']; ?></div>


                    <div class="col-sm-6">
                        <label>Guardian Phone:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['guardian_number']; ?></div>


                    <div class="col-sm-6">
                        <label>Guardian Address:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['guardian_address']; ?> </div>


                    <div class="col-sm-6">
                        <label>Elementary School:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['elem']; ?> </div>


                    <div class="col-sm-6">
                        <label>Elementary Graduation Year:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['elem_year']; ?></div>


                    <div class="col-sm-6">
                        <label>Junior High School:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['jhs']; ?> </div>


                    <div class="col-sm-6">
                        <label>Junior High Graduation Year:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['jhs_year']; ?> </div>


                    <div class="col-sm-6">
                        <label>Senior High School:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['shs']; ?> </div>


                    <div class="col-sm-6">
                        <label>Senior High Graduation Year:</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $row['shs_year']; ?> </div>

                </div>
            </div>





        </div>
    </div>
    <div class="shadow p-3 mb-5 bg-body round">
        <div class="container mt-3">
            <h3>Password</h3>
            <form action="../config/updatepass.php" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="hidden" class="form-control">
                            <input type="hidden" class="form-control">
                            <input type="hidden" class="form-control">
                            <label for="password1" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name = "currentpass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="password2" class="form-label">New Password</label>
                            <input type="password" class="form-control" name = "pass1">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="password2" class="form-label">Retype New Password</label>
                            <input type="password" class="form-control" name = "pass2">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12" style="margin-left: 8px">
                    <input type = "hidden" name = "id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn btn-success" value="Update" name="submit">
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>



</section>
   
    
</body>

</html>