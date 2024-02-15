<?php
include "dbcon.php";

if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $current = $_POST['currentpass'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    $sql = "SELECT * FROM tb_userdata WHERE user_id = $id ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if($row['pass']== $current)
    {
        if($pass1 == $pass2)
        {

            $sql1 = "UPDATE tb_userdata SET  pass = '$pass2' WHERE user_id = $id";
            if ($conn->query($sql1) === TRUE) {

                $_SESSION['pass'] = '<div class="alert alert-success">
                  <strong>Success! </strong> Password Successfully Updated</a>.
                </div>';
                header('Location: ../usercontent/userprofile.php');
              } else {
                $_SESSION['pass'] = '<div class="alert alert-danger">
                  <strong>Failed!</strong>Something went wrong , please try again</a>.
                </div>';
                header('Location: ../usercontent/userprofile.php');
              }

        }
        else{
            $_SESSION['pass'] = '<div class="alert alert-danger">
                  <strong>Failed!</strong> Password do not match </a>.
                </div>';
                header('Location: ../usercontent/userprofile.php');
        }
    }
    else{
        $_SESSION['pass'] = '<div class="alert alert-danger">
                  <strong>Failed!</strong> Wrong current pass, Please try again</a>.
                </div>';
                header('Location: ../usercontent/userprofile.php');
    }

    
}
?>
