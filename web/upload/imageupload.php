<?php
session_start();

if(isset($_POST['submit'])){
  $imgname = $_POST['filename'];
  if(empty($imgname)){
    $imgname = "new";
  }
  else {
    $imgname = strtolower(str_replace(" ","-",$imgname));
  }

  $imgTitle = $_POST['filename'];

  $file = $_FILES['file'];

  $filename = $file["name"];
  $filetype = $file["type"];
  $fileError = $file["error"];
  $filesize = $file["size"];
  $filetempname = $file["tmp_name"];

  if(empty($imgTitle)){
    $imgTitle = $filename;
  }


  $fileExt = explode(".",$filename);
  $filetrueExt = strtolower(end($fileExt));

  $allowed = array("jpg","jpeg","png");

  if(in_array($filetrueExt,$allowed)){
    if ($fileError === 0) {
      $imagefilename = $filename . "." . uniqid("",true). "." . $filetrueExt;
      $filedestination = "../images/" . $imagefilename;

      include_once "dbc.php";

      if(empty($filename)){
        header("Location: ../index.php?upload = empty");
        exit();
      }else{
        $sql = "SElECT * FROM gallery;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo "Sql error";
        }else{
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $rowCount = mysqli_num_rows($result);
          $setImageOrder = $rowCount + 1;

          $sql = "INSERT INTO gallery (imgtitle, imgFullNameGallery) VALUES (?, ?);";

          if(!mysqli_stmt_prepare($stmt,$sql)){
            echo "Sql error";
          }else {
            mysqli_stmt_bind_param($stmt,"ss",$imgTitle,$imagefilename);
            mysqli_stmt_execute($stmt);

            move_uploaded_file($filetempname,$filedestination);
            header("Location: ../index.php?upload=success");
          }
        }
      }
    }
    else {
      echo "Error";
      exit();
    }
  }
  else {
    echo "Please upload an image";
    exit();
  }

}
