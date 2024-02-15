<?php
include "dbcon.php";
$id = $_POST['id'];
$sql = "DELETE FROM tb_messages WHERE messageid = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['messagedeleted'] = '<div class="alert alert-danger">
    <strong>Success! </strong> Message Successfully Deleted </a>.
  </div>';
    header('Location: ../dashboardcontent/messages.php');
} else {
    $_SESSION['messagedeleted'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
    header('Location: ../dashboardcontent/messages.php');
}

?>
