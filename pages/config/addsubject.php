<?php
include "dbcon.php";
$subject = $_POST['subject'];
$course = $_POST['course'];
$instructor = $_POST['instructor'];
$year = $_POST['year'];
$hours = $_POST['hours'];

$sql = "INSERT INTO tb_subject (subjectname, course, instructor, years, numhours)
VALUES ('$subject', '$course', '$instructor','$year ','$hours')";

if ($conn->query($sql) === TRUE) {
  echo "New subject created successfully";
  $_SESSION['success'] = '<div class="alert alert-success">
    <strong> Success! </strong> New Schedule created sucessfully </a>.
  </div>';
  header('Location: ../dashboardcontent/manage.php');
} else {
  $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
  header('Location: ../dashboardcontent/manage.php');
}
?>