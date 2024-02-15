<?php
include "dbcon.php";
if (isset($_POST['submit'])) {
    if ($_POST['selectsched'] == "novalue") {
        $_SESSION["validation"] = "FAILED";

        header("Location: ../enrollform.php");
        exit();
    } else {
        $sched_id = $_POST['selectsched'];
        $sql = "SELECT * FROM tb_schedule WHERE shed_id = '$sched_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $appointmentdate = $row['date'] . ' | ' . $row['day'];
            $time = $row['start_time'] . ' | ' . $row['end_time'];
            $slotnow = intval($row['slot']) - 1;

            $sql1 = "UPDATE tb_schedule SET slot= '$slotnow' WHERE shed_id = '$sched_id'";
            $result1 = $conn->query($sql1);
        } else {
        }


        $user = $_POST['user'] . "@student";
        $pass = $_POST['pass'];
        $email = $_POST['email'];
        $elem = $_POST['elem'];
        $elemyear = $_POST['elemyear'];
        $jhs = $_POST['jhs'];
        $jhsyear = $_POST['jhsyear'];
        $shs = $_POST['shs'];
        $shsyear = $_POST['shsyear'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $course = $_POST['course'];
        $year = $_POST['year'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $guardianname = $_POST['guardianname'];
        $guardiannumber = $_POST['guardiannumber'];
        $guardianaddress = $_POST['guardianaddress'];
        $verified = 0;

        // Prepare userdata query
        $user_data = $conn->prepare("INSERT INTO tb_userdata (username, pass, email, verified) VALUES (?, ?, ?, ?)");
        $user_data->bind_param("sssi", $user, $pass, $email, $verified);
        $user_data->execute();

        // Get the inserted user ID
        $find_id = $conn->prepare("SELECT user_id FROM tb_userdata WHERE username = ? AND pass = ? AND email = ?");
        $find_id->bind_param("sss", $user, $pass, $email);
        $find_id->execute();
        $result_id = $find_id->get_result();

        if ($result_id->num_rows > 0) {
            $row =  $result_id->fetch_assoc();
            $id = $row['user_id'];
             $section = "";

            // Prepare studentinfo query
            $sql = $conn->prepare("INSERT INTO tb_studentinfo (username, appointment_date, time ,elem, elem_year, jhs, jhs_year, shs, shs_year, fname, mname, lname, gender, course, year, section, birthday, address, num, guardian, guardian_number, guardian_address, status, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssssssssssssssssssssii", $user, $appointmentdate, $time, $elem, $elemyear, $jhs, $jhsyear, $shs, $shsyear, $fname, $mname, $lname, $gender, $course, $year, $section, $birthday, $address, $number, $guardianname, $guardiannumber, $guardianaddress, $verified, $id);

            if ($sql->execute()) {
                $_SESSION["validation"] = "OK";

                header("Location: ../enrollform.php");
                exit();
            } else {
                echo "Error";
            }
        } else {

            echo "Something Wrong, Please Try again";
            header("Location: ../../index.php");
            exit();
        }
    }
}
?>