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
		<div id="createAcc">
			<b>You are a ...</b>
				<form action="accTypeSelection.php" method="POST">
				<p>
				<div class="accOptions">
					<select name="accType">
						<option>customer</option>
						<option>trader</option>
						
					</select>
				</div>
				</p>
				
			<p>
				<input type="submit" id="nextbtn" value="Next">
			</p>
			</form>
			
			<p>
				<form action="login.php">
					<input type="submit" id="cancelbtn" value="Cancel" />
				</form>
			</p>
		</div>
	</body>
</html>	