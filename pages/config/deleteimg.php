<?php
include "dbcon.php";

$path =  $_GET['link'];
$delete = "DELETE FROM tb_cards WHERE path = '$path'";
if ($conn->query($delete) === TRUE) {
    $_SESSION['delete'] = "deleteimg";
    unlink($_GET['link']);
    header('Location: ../dashboardcontent/dashboard.php');
} else {
    echo "Error deleting record: " . $conn->error;
}


header('Location: ../dashboardcontent/dashboard.php');

?>