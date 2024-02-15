<?php
include "dbcon.php";
$id = $_GET['id'];
$sql = "DELETE FROM tb_schedule WHERE shed_id = '$id'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Success! </strong> Schedule Successfully Deleted </a>.
  </div>';
    header('Location: ../dashboardcontent/manage.php');
} else {
    $_SESSION['success'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
    header('Location: ../dashboardcontent/manage.php');
}

?>
