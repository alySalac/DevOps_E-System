<?php
include "dbcon.php";

if (isset($_POST['create'])) {
    $user_id = $_POST['user_id'];
    $subject = $_POST['subject'];
    $instructor = $_POST['instructor'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $user_id = $_POST['user_id'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];
    $average = $_POST['average'];
    $remarks = $_POST['remarks'];

    $sql = "INSERT INTO tb_grades (subject, instructor, course, year, prelim, midterm, finals, average, remarks, user_id)
VALUES ('$subject', '$instructor','$course','$year', '$prelim', '$midterm', '$finals', '$average', '$remarks', ' $user_id ')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['grade'] = '<div class="alert alert-success">
        <strong>Success! </strong> Grade Sucessfully uploaded
      </div>';
        header('Location: ../dashboardcontent/classlist.php');

    } else {
    }
}

?>