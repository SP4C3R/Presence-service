<?php
session_start(); 
if(!isset($_GET['q']))
{
  $_GET['q']=1;
}
if(isset($_GET['w']))
{
  $w=$_GET['w'];
  echo '<script>alert("'.$w.'");</script>';
}

if(isset($_SESSION['pageTime']) && isset($_SESSION['type']))
{
  include 'connect.php';
  $email=$_SESSION['email'];

  $pageEnd = date('Y-m-d H:i:s');
  $_SESSION['pageEnd']= strtotime($pageEnd);
  // Formulate the Difference between two dates 
$diff = abs($_SESSION['pageEnd'] - $_SESSION['pageTime']);  

$years = floor($diff / (365*60*60*24));  
  
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  

$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
  
$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));  

$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  

$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
  
$totaltime=$years.'-'.$months.'-'.$days.' '.$hours.':'.$minutes.':'.$seconds;


  $query=mysqli_query($con,"UPDATE `fileVisit` SET `last`=NOW(),`previous`='$totaltime',`current`='close' WHERE `email`='$email'");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <?php

  //Error
    if($_GET['q']==0 && !isset($_SESSION['email']))
    {
      echo '
      <div style="width: 30%; height: auto; margin-left: 35%; margin-top: 10%; ">
      <h1>Login Unsucessful !!!, Try to login again.</h1>
      <a href="index.php?q=2"><button class="btn btn-lg btn-primary btn-block">Sign in again !!!</button></a>

      </div>';
    }

    // signup
    if($_GET['q']==1  && !isset($_SESSION['email']))
    {
      echo ' 
      <div style="width: 30%; height: auto; margin-left: 35%; margin-top: 10%; ">
        <form class="form-signin" method="post" action="service.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <label for="inputEmail" class="sr-only">Name</label>
      <input type="name" id="inputEmail" class="form-control" placeholder="Enter Name" name="name" required autofocus>
      <label for="inputEmail" class="sr-only">Phone</label>
      <input type="phone" id="inputEmail" class="form-control" placeholder="Enter Phone" name="phone" required>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" required=""> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="signup" name="submit">Sign up</button>
      <a href="index.php?q=2"><p class="mt-5 mb-3 text-muted">Already have an account ?</p></a>
    </form>
    </div>
      ';
    }

    // login
    if($_GET['q']==2  && !isset($_SESSION['email']))
    {
      echo '
      <div style="width: 30%; height: auto; margin-left: 35%; margin-top: 10%; ">
        <form class="form-signin" method="post" action="service.php">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" required=""> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="signin" name="submit">Sign in</button>
      <a href="index.php?q=1"><p class="mt-5 mb-3 text-muted">Create new account ?</p></a>
    </form>
    </div>
      ';
    }

    //profile display
    if($_GET['q']==3  && isset($_SESSION['email']))
    {
      echo'
      <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?q=3&step=open">
              <span data-feather="home"></span>
              connection open <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=3&step=close">
              <span data-feather="file"></span>
              Connection close
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=3&step=all">
              <span data-feather="file"></span>
              All users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=4&step=1" target="_blank">
              <span data-feather="file"></span>
              user file access
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=5&step=1" target="_blank">
              <span data-feather="file"></span>
              Admin file access
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="files.php" target="_blank">
              <span data-feather="file"></span>
              Admin Upload files
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service.php?submit=logout">
              <span data-feather="layers"></span>
              Signout
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
      <h2>Current Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Srno</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Connection</th>
              <th>Last Session Timeout</th>
              <th>Previous Session Time</th>
            </tr>
          </thead>
          <tbody>';

          include 'connect.php';
          $sr=1;
           if(!isset($_GET['step']))
            {
              $step="open";
            }
            else
            {
              $step=$_GET['step'];
            }
            if($step!='all')
            {
              $query=mysqli_query($con,"SELECT * FROM `profile` WHERE `connection`='$step'");
            }
            else
            {
              $query=mysqli_query($con,"SELECT * FROM `profile`");
            }
          if(mysqli_num_rows($query)!=0){
            while($single = mysqli_fetch_array($query)){
                $name = $single["name"];
                $email = $single["email"];
                $phone = $single["phone"];
                $connection = $single["connection"];
                $timeout = $single["timeout"];
                $totaltime = $single["totaltime"];

            echo '<tr>
              <td>'.$sr.'</td>
              <td>'.$name.'</td>
              <td>'.$email.'</td>
              <td>'.$phone.'</td>
              <td>'.$connection.'</td>
              <td>'.$timeout.'</td>';
              if($connection=='open')
              {
                echo '<td>working</td>';
              }
              else
              {
                echo '<td>'.$totaltime.'</td>';
              }

            echo '</tr>';
            $sr++;
          }}

            echo'
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>';
    }

    // select file
    if($_GET['q']==4 && isset($_GET['step']) && isset($_SESSION['email']))
    {
      echo '
      <div style="width: 30%; height: auto; margin-left: 35%; margin-top: 10%; ">
        <form class="form-signin" method="post" action="index.php?q=4">
      <h1 class="h3 mb-3 font-weight-normal">Please select file</h1>
      <label for="inputEmail" class="sr-only">File Name</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="enter file " name="file" required autofocus>
      <br><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="step" value="2">Find File</button>
    </form>
    </div>
      ';
    }

    // select file
    if($_GET['q']==4 && isset($_POST['step']) && isset($_POST['file']) && isset($_SESSION['email']))
    {
      include 'connect.php';
      $time = date('Y-m-d H:i:s');
      $_SESSION['pageTime']= strtotime($time);
      
      $email=$_SESSION['email'];
      $fid=$_POST['file'];
      $query=mysqli_query($con,"SELECT * from `filevisit` where `email`='$email' and `fid`='$fid'");
      if(mysqli_num_rows($query)==0){
      $query=mysqli_query($con,"INSERT INTO `fileVisit`(`fid`, `email`, `current`, `last`, `previous`) VALUES ('$fid','$email','open','$time','working')");}
      else
      {
        $query=mysqli_query($con,"UPDATE `filevisit` SET `current`='open',`previous`='working' WHERE `email`='$email' and `fid`='$fid'");
      }

      $fid=$_POST['file'];
      $query=mysqli_query($con,"SELECT * FROM `sfile` where `fileID`='$fid' limit 1");

          if(mysqli_num_rows($query)!=0){
            while($single = mysqli_fetch_array($query)){
                $fileAD = $single["fileAD"];
              }
            }
      echo '
  <div class="container-fluid">
    <div class="row">
    <main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-md-4">
      <iframe src="'.$fileAD.'" style="width:100%; height:600px;" frameborder="0"></iframe>
    </main>
  </div>
</div>
      ';
    }


// Admin select file
    if($_GET['q']==5 && isset($_GET['step']) && isset($_SESSION['email']))
    {
      echo '
      <div style="width: 30%; height: auto; margin-left: 35%; margin-top: 10%; ">
        <form class="form-signin" method="post" action="index.php?q=5">
      <h1 class="h3 mb-3 font-weight-normal">Please select file</h1>
      <label for="inputEmail" class="sr-only">File Name</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="enter file " name="file" required autofocus>
      <br><br>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="step" value="2">Find File</button>
    </form>
    </div>
      ';
    }

    //Admin  select file
    if($_GET['q']==5 && isset($_POST['step']) && isset($_POST['file']) && isset($_SESSION['email']))
    {
      $fid=$_POST['file'];
      
      echo '
           <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?q=3&step=open">
              <span data-feather="home"></span>
              connection open <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=3&step=close">
              <span data-feather="file"></span>
              Connection close
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=3&step=all">
              <span data-feather="file"></span>
              All users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=4&step=1" target="_blank">
              <span data-feather="file"></span>
              user file access
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?q=5&step=1" target="_blank">
              <span data-feather="file"></span>
              Admin file access
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="files.php" target="_blank">
              <span data-feather="file"></span>
              Admin Upload files
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="service.php?submit=logout">
              <span data-feather="layers"></span>
              Signout
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">file ID: '.$fid.'</h1>
      </div>
      <h2>List</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Srno</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Current users</th>
              <th>Last time</th>
              <th>Previous Session Time</th>
            </tr>
          </thead>
          <tbody>';

          include 'connect.php';
          $sr=1;
           
          $query=mysqli_query($con,"SELECT name,profile.email,phone,current,last,previous FROM `filevisit`,`profile` WHERE profile.email=filevisit.email and `fid`='$fid'");

          if(mysqli_num_rows($query)!=0){
            while($single = mysqli_fetch_array($query)){
                $name = $single["name"];
                $email = $single["email"];
                $phone = $single["phone"];
                $last = $single["last"];
                $current = $single["current"];
                $previous = $single["previous"];

            echo '<tr>
              <td>'.$sr.'</td>
              <td>'.$name.'</td>
              <td>'.$email.'</td>
              <td>'.$phone.'</td>
              <td>'.$current.'</td>
              <td>'.$last.'</td>
              <td>'.$previous.'</td>
              </tr>';
            $sr++;
          }}

            echo'
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
      ';
    }

    ?>
  
</body>
</htGET