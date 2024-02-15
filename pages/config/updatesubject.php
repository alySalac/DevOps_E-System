<?php
include "dbcon.php";
$subject = $_POST['subject'];
$course = $_POST['course'];
$instructor = $_POST['instructor'];
$year = $_POST['year'];
$hours = $_POST['hours'];
$subject_id = $_POST['subject_id'];

$sql = "UPDATE tb_subject SET  subjectname = '$subject', course = '$course', instructor = '$instructor', years = '$year', numhours = '$hours' WHERE subject_id= '$subject_id'";

if ($conn->query($sql) === TRUE) {

  $_SESSION['success'] = '<div class="alert alert-success">
    <strong>Success! </strong> Subject Successfully Updated</a>.
  </div>';
  header('Location: ../dashboardcontent/manage.php');
} else {
  $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
  header('Location: ../dashboardcontent/manage.php');
}
?>
