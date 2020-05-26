<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css" media="screen">
      form {
      width: 30%;
      margin: 100px auto;
      padding: 30px;
      border: 1px solid #555;
    }
    input {
      width: 100%;
      border: 1px solid #f1e1e1;
      display: block;
      padding: 5px 10px;
    }
    button {
      border: none;
      padding: 10px;
      border-radius: 5px;
    }
    table {
      width: 60%;
      border-collapse: collapse;
      margin: 100px auto;
    }
    th,
    td {
      height: 50px;
      vertical-align: center;
      border: 1px solid black;
    } 
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form method="post" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>
        </form>
      </div>
    </div>
  </body>
</html>

<?php

include 'connect.php';

if (isset($_POST['save'])) { 
    $uniqID=uniqid();
    $allowed =  array('zip', 'pdf', 'docx');
    $filename =$_FILES["myfile"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed) ) {
     
    $file =$_FILES["myfile"]["tmp_name"];
    $destination = "files/". time().$filename;
    move_uploaded_file($file,$destination);
  }


    if (!in_array($ext,$allowed)) {
        echo "You file extension must be .zip, .pdf or .docx";
    } else {
            $sql = "INSERT INTO `sfile` (`fileID`,`fileAD`) VALUES ('$uniqID', '$destination')";
            echo $sql;
            if (mysqli_query($con, $sql)) {
                echo "File uploaded successfully";
            }
        } 
    }
    ?>