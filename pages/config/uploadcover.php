<?php
include "dbcon.php";
$target_dir = "../../images/cover/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    
    $_SESSION['upload'] = '<div class="alert alert-danger">
    <strong>Upload failed! </strong>File is not an image</a>.
  </div>';
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['upload'] = '<div class="alert alert-danger">
  <strong>Upload failed! </strong> File already exist</a>.
</div>';
  $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $_SESSION['upload'] = '<div class="alert alert-danger">
    <strong>Upload failed! </strong> File Is too large</a>.
  </div>';

  $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $_SESSION['upload'] = '<div class="alert alert-danger">
    <strong>Upload failed! </strong> only JPG, JPEG, PNG & GIF files are allowed</a>.
  </div>';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header('Location: ../dashboardcontent/dashboard.php');
  
  // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $target_dir1 = "images/cover/";
    $target_file1 = $target_dir1 . basename($_FILES["fileToUpload"]["name"]);
    $title = "";
    $caption = "";

    $send = "INSERT INTO tb_cover (path, new_path, title, caption) VALUES ('$target_file', '$target_file1','$title', '$caption')";

    if ($conn->query($send) === TRUE) {
    
    } else {
     
    }

    echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    $_SESSION['upload'] = '<div class="alert alert-success">
    <strong>Upload Success! </strong> File has been uploaded</a>.
  </div>';
    header('Location: ../dashboardcontent/dashboard.php');
  } else {

    $_SESSION['upload'] = '<div class="alert alert-danger">
    <strong>Upload failed! </strong> Unknown error occured</a>.
  </div>';
  }
}
?>