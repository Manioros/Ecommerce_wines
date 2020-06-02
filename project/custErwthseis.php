<?php

include 'init.php';

$email = $_POST['usremail'];
$pass = $_POST['pass'];

	$sql = "SELECT wine.wine_name , cart.wine_id ,cart.quantity FROM cart INNER JOIN wine ON wine.wine_id=cart.wine_id WHERE cart.email='$email'  "; 
	$products = $conn->query($sql);
  	
?>

<!DOCTYPE html>
<html>
	<head >
		<title>Wineshop-Καλάθι</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet"  href="homestyle.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
		 	<h1>Καλάθι</h1>
		</header>
		<div align="right" class = "aposundesh_apenergopoihsh">
			<form action="login.php" method="POST">
				<button class="btn">Αποσύνδεση</button>
				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
				<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
			</form>
			<form action="apen_logarCust.php" method="POST">
				<button class="btn">Απενεργοποίηση Λογαριασμού</button>
				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
				<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
			</form>
		</div>
		<ul class = "nav">
			<li>
				<form action="custHome.php" method="POST">
					<button class="btn-link">Λογαριασμός</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="market.php" method="POST">
    				<button class="btn-link">Προϊόντα</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="epistrofh.php" method="POST">
					<button class="btn-link">Επιστροφή</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="cart.php" method="POST">
					<button class="btn-link">Καλάθι</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="custErwthseis.php" method="POST">
					<button class="btn-link">Ερωτήσεις</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
		</ul>







			
			
				<hr>
				<hr>
				<form action="kaloipelates.php" method="POST">
					<input type="submit" id="searchbtn" value="Καλοι Πελάτες">
					
					<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
					
					
				</form>
				<form action="kakoipelates.php" method="POST">
					<input type="submit" id="searchbtn" value="Κακοί Πελάτες">
					
					<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
					
					
				</form>
			


<html>