<?php #login 
session_start();

if(isset($_SESSION['adminname']) and isset($_SESSION['adminpassword']) ): ?>
<!DOCTYPE html>
<html>
<head>
	<title>HI</title>
</head>
<body>
<a href="<?php    session_destroy();  ?>" >logout</a>
<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
</body>
</html>
<?php  else : ?>

<form method="post" action="hello.php">
	<input type="text" name="adminname" required>
	<input type="password" name="adminpassword" required>
	<input type="submit" name="loginsubmit">
</form>
<?php 
if(isset($_POST['loginsubmit'])){

		if( $_POST['adminname'] ==  'sachin mishra' && $_POST['adminpassword'] == 'misra')
					{


					$_SESSION["adminname"] = $_POST["adminname"];
					$_SESSION["adminpassword"] = $_POST["adminpassword"];
					$_SESSION["loginsubmit"] = $_POST["loginsubmit"];
					header("Location:hello.php");

					}
		else
		{

		echo "<script>alert('login credientials are not valid!');</script>";
		//header("Location:hello.php");
		}
} ?>

<?php endif; ?>