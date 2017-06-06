<html>
<head>
<title>Login</title>
</head>
<body>
	<h3 align="center">Login</h3>
	<table align="center" cellspacing="5" cellpadding="5" border="0">
		<form action="login_check.php" method="post">
		<tr>
				<td>Username</td>
				<td>Password</td>	
				<td><input type="submit" id="login" name="login" value="Login"></td>
		</tr>
		<tr>
				<td><input type="text" name="username" id="username" placeholder="Please Enter Your Username" Required></td>
				<td><input type="password" name="password" id="password" placeholder="Please Enter Your Password" Required></td>	
				<td><input type="reset" id="Clear" name="Clear" value="Clear"></td>
		</tr>
	</table>
	<h3 align="center"><font color="red"><?php echo $_GET['msg'] ?></font></h3>
	</form>
</body>	
</html>