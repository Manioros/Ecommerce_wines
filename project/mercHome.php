<?PHP
include 'init.php';

$email = $_POST['usremail'];
$pass = $_POST['pass'];


$onoma;
$sql_getinfo = "SELECT * from trader WHERE email='$email' AND password='$pass'";
if ($results = mysqli_query($conn, $sql_getinfo)) {
	$row = mysqli_fetch_array($results);
	$onoma = $row['trader_name'];
	$phone =  $row['phone'];
	$address =  $row['address'];
	$bank_account = $row['bank_account'];
	$debt = $row['debt'];
}
else {
    echo "Error: " . $sql_doubleAcc . "<br>" . mysqli_error($conn) . "<br>";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Wineshop-Λογαριασμός</title>
		<link rel="stylesheet" type="text/css" href="homestyle.css">
	</head>
	<body>
		<header>
		 	<h1>Λογαριασμός</h1>
		</header>
		<div align="right" class = "aposundesh_apenergopoihsh">
			<form action="login.php" method="POST">
				<button class="btn">Αποσύνδεση</button>
				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
				<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
			</form>
			<form action="delete_trader_account.php" method="POST">
				<button class="btn">Απενεργοποίηση Λογαριασμού</button>
				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
				<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
			</form>
		</div>
		<ul class = "nav">
			<li>
				<form action="mercHome.php" method="POST">
					<button class="btn-link">Λογαριασμός</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="markett.php" method="POST">
    				<button class="btn-link">Προϊόντα</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="cartt.php" method="POST">
					<button class="btn-link">Καλάθι</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
			<li>
				<form action="traderErwthseis.php" method="POST">
					<button class="btn-link">Ερωτήσεις</button>
    				<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
				</form>
			</li>
		</ul>
		<ul class = "info1">
			<li>Όνομα: <?PHP echo $onoma; ?></li>
			<li>Email: <?PHP echo $email; ?></li>
			<li>Τηλέφωνο : <?PHP echo $phone; ?></li>
			<li>Διευθυνση: <?PHP echo $address ; ?></li>
			<li>Λογαριασμός Τραπέζης: <?PHP echo $bank_account  ?></li>
			<li>Ποσό Οφειλής: <?PHP echo $debt . ' €'; ?></li>
		</ul>
	</body>
</html>