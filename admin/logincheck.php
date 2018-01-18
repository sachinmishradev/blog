<?php

$Cser = mysqli_connect("localhost",'root','','blog') or die("server error ".mysqli_error());
$uname = $_POST['uname'];
$upassword = $_POST['upassword'];

$s = "SELECT * FROM admin where uname='$uname' and password='$upassword'";
$result = mysqli_query($Cser,$s);
$count  = mysqli_num_rows($result);
if($count > 0)
{
	setcookie("login","1");
	echo "<script>window.location.assign('index.php');</script>";
} 
else
{
echo "<script>window.location.assign('login.php?err=1');</script>";
}



?>