<!DOCTYPE html>
<html>
<head>
	<title>Blog Admin login</title>
</head>
<body>

<table border="0" align="center">
<form  method="post" action="logincheck.php">
<tr>
	<td>Name</td>
	<td><input type="text" name="uname" size="20" maxlength="20"></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="upassword" size="20" maxlength="20"></td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" name="submit" size="20" value="Login">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

	<input type="reset" size="20"  name="clear" value="reset">
	</td>
</tr>
<tr>
	
	<td colspan="2"  align="center">
	<?php if (isset($_REQUEST['err'])) {
		echo "Invalid username or password";
	} ?>
	</td>
	</tr>
</form>	
</table>
</body>
</html>