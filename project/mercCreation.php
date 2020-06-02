<!DOCTYPE html>
<html>
	<head>
		<title>Wine - Login Page</title>
		<link rel="stylesheet" type="text/css" href="loginstyle.css">
	</head>
	<body>
		<header>
		 	<h1>wine - New Account</h1>
		 </header>
		<div id="login">
			<form action="Trader_sign_up.php" method="POST">
			
			
				
				<p>
					<small>First name:</small>
					<input type="text"  id="name" size=28 name="name">
				</p>
				<p>
					<small>Last name:</small>
					<input type="text"  id="sname" size=28 name="sname">
				</p>
				<p>
					<small>E-mail:</small>
					<input type="email"  id="usremail" size=28 name="usremail">
				</p>
				<p>
					<small>Password:</small>
					<input type="password"  id="pass" size=28 name="pass">
				</p>
				<p>
					<small>Bank Account:</small>
					<input type="int"  id="bank_ac" size=28 name="bank_ac">
				</p>
				<p>
					<small>Phone Number:</small>
					<input type="int"  id="phone" size=28 name="phone">
				</p>
				<p>
					<small>Address:</small>
					<input type="text"  id="address" size=28 name="address">
				</p>
			
			<p>
					<input type="submit" id="createaccbtn" value="Create Account" />
				</form>
			</p>
			<p>
				<form action="createAcc.php">
				<input type="submit" id="backbtn" value="Back">
				</form>
			</p>
			<p>
				<form action="login.php">
				<input type="submit" id="cancelbtn" value="Cancel">
				</form>
			</p>
		</div>
	</body>
</html>	