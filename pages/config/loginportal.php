<?php
include "dbcon.php";


if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Using prepared statements to prevent SQL injection
    $sql = "SELECT username, pass, verified, user_id FROM tb_userdata WHERE username = ? AND  pass = BINARY ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['user_id'];

        if(strpos($username, "@student"))
        {
            if($row['verified'] == 0)
            {
                $_SESSION['status'] = '<div class="alert alert-success">
  <strong>You Are Currently Pending !</strong> Please try again</a>.
</div>';
                header("Location: ../login.php");
              
                
            }
            else
            {
                $_SESSION['response'] = $id;
                header("Location:  ../usercontent/userdashboard.php");
            }
        }
        else if(strpos($username, "@admin"))
        {
            $_SESSION['response'] = "admin";
            header("Location: ../dashboardcontent/dashboard.php");
          
        }
    } else {
        // Display danger alert if login fails
        $_SESSION['status'] = '<div class="alert alert-danger">
  <strong>Login Error !</strong> Wrong credential, please try again</a>.
</div>';
        header("Location: ../login.php");
        
    }
    $stmt->close();
}

?>