<?php 
include "../config/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php 
$id = $_GET['id'];
$approval = "SELECT * FROM tb_studentinfo WHERE student_id = $id";
$resultapproval = $conn->query($approval);
$row = $resultapproval->fetch_assoc();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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

<body>
   <main>
    <section>
    <div class="modal show" id="myModal153" aria-modal="true" role="dialog" style="display: block; padding-left: 0px;">
<div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $row['fname']. " " . $row['mname']. " " . $row['lname']; ?></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="POST">
	  
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <strong>Appointment Schedule:</strong>
    </div>
    
    <div class="col-sm-6">
      <strong><?php echo $row['appointment_date']; ?></strong>
    </div>
   <div class="col-sm-6">
      <label>Enrollment Status:</label>
    </div>
    <div class="col-sm-6">
    <?php
    
    if ($row['status'] == 0 )
    {
        echo "PENDING";
    } ?>   </div>
    <div class="col-sm-6">
      <label>Username:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" name="username" type="text" value="<?php echo $row['username']; ?>">
    </div>
    <div class="col-sm-6">
      <label>First Name:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="fname" value="<?php echo $row['fname']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Middle Name:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="mname" value="<?php echo $row['mname'] ;?>">
    </div>
    <div class="col-sm-6">
      <label>Last Name:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="lname" value="<?php echo $row['lname']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Sex:</label>
    </div>
    <div class="col-sm-6">
      <select class="form-control" name="sex">
        <option value="<?php echo $row['gender']; ?>" selected=""><?php echo $row['gender']; ?></option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
      </select>
    </div>
    <div class="col-sm-6">
      <label>Course:</label>
    </div>
    <div class="col-sm-6">
      <select class="form-control" name="course">
      <option value="<?php echo $row['course']; ?>" selected=""><?php echo $row['course']; ?></option>
        <option value="BS Computer Engineering">BS Computer Engineering</option>
        <option value="BS Information Technology">BS Information Technology</option>
        <option value="BS Computer Science">BS Computer Science</option>
      </select>
    </div>
    <div class="col-sm-6">
      <label>Year:</label>
    </div>
    <div class="col-sm-6">
      <select class="form-control" name="year">
      <option value="<?php echo $row['year']; ?>" selected=""><?php echo $row['year']; ?></option>
        <option value="I">I</option>
        <option value="II">II</option>
        <option value="III">III</option>
        <option value="IV">IV</option>
      </select>
	  
    </div>
	
	  <div class="col-sm-6">
      <label>Section:</label>
    </div>
    <div class="col-sm-6">
      <select class="form-control" name="section">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
      </select>
	  
    </div>
    <div class="col-sm-6">
      <label>Birthdate:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="date" name="birthdate" value="<?php echo $row['birthday'] ;?>">
    </div>
    <div class="col-sm-6">
      <label>Home Address:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="homeAddress" value="<?php echo $row['address']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Phone Number:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="phoneNumber" value="<?php echo $row['num']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Guardian Name:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="guardianName" value="<?php echo $row['guardian']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Guardian Phone:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="guardianPhone" value="<?php echo $row['guardian_number']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Guardian Address:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="guardianAddress" value="<?php echo $row['guardian_address']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Elementary School:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="elementary_school" value="<?php echo $row['elem']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Elementary Graduation Year:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="number" min="1970" name="elementary_graduation_year" value="<?php echo $row['elem_year']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Junior High School:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="junior_high_school" value="<?php echo $row['jhs']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Junior High Graduation Year:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="number" min="1970" name="junior_high_graduation_year" value="<?php echo $row['jhs_year']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Senior High School:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="text" name="senior_high_school" value="<?php echo $row['shs']; ?>">
    </div>
    <div class="col-sm-6">
      <label>Senior High Graduation Year:</label>
    </div>
    <div class="col-sm-6">
      <input class="form-control" type="number" min="1970" name="senior_high_graduation_year" value="<?php echo $row['shs_year']; ?>">
    </div>
    <input type="hidden" value="<?php echo $row['student_id']; ?>" name = "id">
    <input type="hidden" value="<?php echo $row['user_id']; ?>" name = "userid">
    
  </div>
</div>
<div class="modal-footer">
      <input type="submit" class="btn btn-success" value="Enroll" formaction="../config/enrollpending.php">
                <input type="submit" class="btn btn-danger" value="Reject" formaction="../config/deletepending.php">
                <input type="submit" class="btn btn-primary" value="Return to Admin" formaction="manage.php">
      </div>          
  
      </form>
    </div>

      <!-- Modal footer -->
      
    
    </div>
  </div>
</div>
    </section>
   </main>
</body>

</html>