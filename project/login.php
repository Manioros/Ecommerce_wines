<!DOCTYPE html>
<html>
	<head>
		<title>Wineshop-Login Page</title>
		<link rel="stylesheet" type="text/css" href="loginstyle.css">
	</head>
	<body>
		<header>
		 	<h1>Wineshop Login</h1>
		</header>
		<div id="login">
			<form action="checkForLogin.php" method="POST">
				<div class="entries">
					<p>
						<small>Email:</small>
						<input type="email"  id="usremail" size=28 name="usremail">
					</p>
					<p>
						<small>Password:</small>
						<input type="password"  id="pass" size=28 name="pass">
					</p>
				</div>
				<input type="submit" id="loginbtn" value="Login">
			</form>
			<form action="createAcc.php">
				<input type="submit" id="createaccbtn" value="Create Account" />
			</form>
		</div>
	</body>
</html>	