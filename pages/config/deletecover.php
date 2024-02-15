<?php
include "dbcon.php";
$path =  $_GET['link'];
$delete = "DELETE FROM tb_cover WHERE path = '$path'";
if ($conn->query($delete) === TRUE) {
    $_SESSION['delete'] = "deletecover";
    unlink($_GET['link']);
    header('Location: ../dashboardcontent/dashboard.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
