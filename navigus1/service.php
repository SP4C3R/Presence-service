<?php
session_start();
include 'connect.php';

// login
if(isset($_POST["submit"]) && $_POST['submit']=="signin" && !isset($_SESSION['email']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	$query = mysqli_query($con,"SELECT * FROM `profile` WHERE `email`='$email' and `password`='$password'");
	if(mysqli_num_rows($query)!=0)
	{
		$time = date('Y-m-d H:i:s');
		$_SESSION['start']= strtotime($time);
		$query=mysqli_query($con,"UPDATE `profile` SET `connection`='open' WHERE `email`='$email'");
		$_SESSION['email']=$email;
		$_SESSION['type']="user";
		header("location:index.php?q=3&w=login done sucessfully");
	}
	else
	{
		header("location:index.php?q=0&w=something went wrong, either your account already registered with us, kindly try with login also !!!");
	}
}

// signup
if(isset($_POST["submit"]) && $_POST['submit']=="signup" && !isset($_SESSION['email']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$phone=$_POST['phone'];

	$allowed =  array('png' ,'jpg', 'jpeg','JPG','PNG','JPEG');
	$filename =$_FILES["image"]["name"];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(in_array($ext,$allowed) ) {
	   	$tempname =$_FILES["image"]["tmp_name"];
		$folder = "uploads/". time().$filename;
		move_uploaded_file($tempname,$folder);
	}

	$query=mysqli_query($con,"insert into `profile`(`name`,`phone`,`email`,`password`,`image`,`connection`,`timeout`) values ('$name','$phone','$email','$password','$folder','close',NOW())");
	if($query)
	{
		header("location:index.php?q=2&w=please login know !!!");
	}
	else
	{
		header("location:index.php?q=0&w=something went wrong");
	}
}


//logout
if(isset($_GET["submit"]) && $_GET['submit']=="logout" && isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	$end = date('Y-m-d H:i:s');
	$_SESSION['end']= strtotime($end);
	// Formulate the Difference between two dates 
$diff = abs($_SESSION['end'] - $_SESSION['start']);  

$years = floor($diff / (365*60*60*24));  
  
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  

$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 
  
$hours = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));  

$minutes = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60);  

$seconds = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));  
  
$totaltime=$years.'-'.$months.'-'.$days.' '.$hours.':'.$minutes.':'.$seconds;


	$query=mysqli_query($con,"UPDATE `profile` SET `timeout`=NOW(),`totaltime`='$totaltime',`connection`='close' WHERE `email`='$email'");
	session_destroy();
	header("location:index.php");
}

?>
