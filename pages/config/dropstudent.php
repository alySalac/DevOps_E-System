<?php
include "dbcon.php";
$id = $_POST['id'];
$userid = $_POST['userid'];
$sql = "DELETE FROM tb_studentinfo WHERE student_id= '$id'";
$sql1 = "DELETE FROM tb_userdata WHERE user_id= '$userid'";
if ($conn->query($sql) === TRUE) {
    $conn->query($sql1);
    $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Success! </strong> Student Successfully Drop </a>.
  </div>';
    header('Location: ../dashboardcontent/manage.php');
} else {
    $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
    header('Location: ../dashboardcontent/manage.php');
}

?>
