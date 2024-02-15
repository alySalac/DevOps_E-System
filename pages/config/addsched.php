<?php
include "dbcon.php";
$date = $_POST['date'];
$dayOfWeek = date("l", strtotime($date));
$start_time = $_POST['time'];
// Parse the selected start time
$timeStamp = strtotime($start_time);
// Format the time to display in 12-hour format with AM/PM
$formattedTime = date("h:i A", $timeStamp);
// Extract AM or PM
$amPm = date("A", $timeStamp);

$end_time = $_POST['end-time'];
$slot = $_POST['slots'];

// Concatenate formatted time and AM/PM for the start time
$start_time_formatted = $formattedTime;

$sql = "INSERT INTO tb_schedule (date, day, start_time, end_time, slot) VALUES ('$date', '$dayOfWeek', '$start_time_formatted','$end_time','$slot')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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