<?php
session_start(); 
if(!isset($_GET['q']) && !isset($_SESSION['email']))
{
  $_GET['q']=1;
}
if(!isset($_GET['q']) && isset($_SESSION['email']))
{
  $_GET['q']=3;
}
if(isset($_GET['w']))
{
  $w=$_GET['w'];
  echo '<script>alert("'.$w.'");</script>';
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
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
      .box16{text-align:center;color:#fff;position:relative}
      .box16 .box-content,.box16:after{width:100%;position:absolute;left:0}
      .box16:after{content:"";height:100%;background:linear-gradient(to bottom,rgba(0,0,0,0) 0,rgba(0,0,0,.08) 69%,rgba(0,0,0,.76) 100%);top:0;transition:all .5s ease 0s}
      .box16 .post,.box16 .title{transform:translateY(145px);transition:all .4s cubic-bezier(.13,.62,.81,.91) 0s}
      .box16:hover:after{background:linear-gradient(to bottom,rgba(0,0,0,.01) 0,rgba(0,0,0,.09) 11%,rgba(0,0,0,.12) 13%,rgba(0,0,0,.19) 20%,rgba(0,0,0,.29) 28%,rgba(0,0,0,.29) 29%,rgba(0,0,0,.42) 38%,rgba(0,0,0,.46) 43%,rgba(0,0,0,.53) 47%,rgba(0,0,0,.75) 69%,rgba(0,0,0,.87) 84%,rgba(0,0,0,.98) 99%,rgba(0,0,0,.94) 100%)}
      .box16 img{width:100%;height:auto}
      .box16 .box-content{padding:20px;margin-bottom:20px;bottom:0;z-index:1}
      .box16 .title{font-size:22px;font-weight:700;text-transform:uppercase;margin:0 0 10px}
      .box16 .post{display:block;padding:8px 0;font-size:15px}
      .box16 .social li a,.box17 .icon li a{border-radius:50%;font-size:20px;color:#fff}
      .box16:hover .post,.box16:hover .title{transform:translateY(0)}
      .box16 .social{list-style:none;padding:0 0 5px;margin:40px 0 25px;opacity:0;position:relative;transform:perspective(500px) rotateX(-90deg) rotateY(0) rotateZ(0);transition:all .6s cubic-bezier(0,0,.58,1) 0s}
      .box16:hover .social{opacity:1;transform:perspective(500px) rotateX(0) rotateY(0) rotateZ(0)}
      .box16 .social:before{content:"";width:50px;height:2px;background:#fff;margin:0 auto;position:absolute;top:-23px;left:0;right:0}
      .box16 .social li{display:inline-block}
      .box16 .social li a{display:block;width:40px;height:40px;line-height:40px;background:#6d3795;margin-right:10px;transition:all .3s ease 0s}
      .box17 .icon li,.box17 .icon li a{display:inline-block}
      .box16 .social li a:hover{background:#bea041}
      .box16 .social li:last-child a{margin-right:0}
      @media only screen and (max-width:990px){.box16{margin-bottom:30px}
      }
    </style>
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
      <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-10"><center><h1>Please Signup</h1></center></div>
    </div>
    <br>
    <br>
    <form class="form" method="post" action="service.php" id="registrationForm" enctype="multipart/form-data">
    <div class="row">
      <div class="col-sm-3"><!--left col-->
        <div class="text-center">
            <img src="uploads/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
            <center><input type="file" name="image" class="text-center center-block file-upload" ></center>
        </div></hr><br>
      </div>  
      <div class="col-sm-9">
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>User Name</h4></label>
                              <input type="name" id="inputEmail" class="form-control" placeholder="Enter Name" name="name" title="enter your first name if any." required autofocus>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile Number</h4></label>
                              <input type="phone" id="inputEmail" class="form-control" placeholder="Enter Phone" name="phone" title="enter your mobile number if any." required >
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-12">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" title="enter your email." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" placeholder="Password" name="password" title="enter your password." required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify Password</h4></label>
                              <input type="password" id="ipassword2"  class="form-control" placeholder="Password2" name="password2" title="enter your password Again." required>
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <br>
                                <center><button class="btn btn-lg btn-success" type="submit" value="signup" name="submit"><i class="glyphicon glyphicon-ok-sign" onclick="return Validate()" ></i> Save</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button></center>
                            </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <center><a href="index.php?q=2"><p class="mt-5 mb-3 text-muted">Already have an account ?</p></a></center>
                            </div>
                      </div>
                </form>
              </div><!--/tab-pane-->
          </div><!--/tab-content-->
        </div>
        </div><!--/col-9-->
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
      <Br>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      <div class="checkbox mb-3">
      <br>
        <label>
          <input type="checkbox" value="remember-me" required=""> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary " type="submit" value="signin" name="submit">Sign in</button>
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
      <div class="container mt-40">
            <div class="row mt-30">

      ';

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
                $image=$single["image"];

            // echo '<tr>
            //   <td>'.$sr.'</td>
            //   <td>'.$name.'</td>
            //   <td>'.$email.'</td>
            //   <td>'.$phone.'</td>
            //   <td>'.$connection.'</td>
            //   <td>'.$timeout.'</td>';
            //   if($connection=='open')
            //   {
            //     echo '<td>working</td>';
            //   }
            //   else
            //   {
            //     echo '<td>'.$totaltime.'</td>';
            //   }

            // echo '</tr>';
            echo '<div class="col-md-4 col-sm-6">
                    <div class="box16">
                        <img src="'.$image.'" style="height:400px">
                        <div class="box-content">
                            <h3 class="title">'.$name.'</h3>
                            <span class="post">'.$email.'</span>
                            <ul class="social">
                                <span class="post">'.$phone.'</span>
                                <span class="post">'.$timeout.'</span>';
                                  if($connection=='open')
                                  {
                                    echo '<span class="post">Working</span>';
                                  }
                                  else
                                  {
                                    echo '<span class="post">'.$totaltime.'</span>';
                                  }
                           echo'</ul>
                        </div>
                    </div>
                     <span class="post" style="font-size=30px">connection-'.$connection.'</span><br><br>';
                     if($connection=='open')
                                  {
                                    echo '<span class="post">Working</span>';
                                  }
                                  else
                                  {
                                    echo '<span class="post">Sessiontime'.$totaltime.'</span>';
                                  }
                echo '</div>';

            $sr++;
          }}

            echo'
          </div>
        </div>

    </main>
  </div>
</div>';
    }

    ?>
  
</body>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
<script>
  $(document).ready(function() {

    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function(){
        readURL(this);
    });
  });
</script>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password2").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
</html>
