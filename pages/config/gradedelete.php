<?php
include "dbcon.php";


$id = $_GET['id'];
$sql = "DELETE FROM tb_grades WHERE grades_id= '$id'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['deletegrade'] = '<div class="alert alert-danger">
    <strong>Success! </strong> Grade Successfully Deleted </a>.
  </div>';
    header('Location: ../dashboardcontent/classlist.php');
} else {
    $_SESSION['deletegrade'] = '<div class="alert alert-danger">
    <strong>Failed!</strong>Something went wrong , please try again</a>.
  </div>';
    header('Location: ../dashboardcontent/classlist.php');
}

?>
