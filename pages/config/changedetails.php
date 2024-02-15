<?php
include "dbcon.php";

if (isset($_POST['submit'])) {
    $name = $_POST['schoolName'];
    $address = $_POST['schoolAddress'];
    $email = $_POST['schoolEmail'];
    $number = $_POST['schoolMobilePhone'];
    $telnumber = $_POST['schoolTelePhone'];
    $description = $_POST['schoolDescription'];

    $sql = "UPDATE tb_schoolprofile SET name ='$name', location = '$address', email = '$email', number = '$number', telnumber = '$telnumber', description = '$description' WHERE schoolprofile_id=1";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["change"] = "success";
        header('Location: ../dashboardcontent/dashboard.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
