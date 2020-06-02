

<!DOCTYPE html>
<html>
	<head >
		<title>Wineshop-Προϊόντα</title>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet"  href="homestyle.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
		 	<h1>Προϊόντα</h1>
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

		 


</body>
</html>

<?PHP
include 'init.php';

$sql_kaloi = " SELECT  email ,sum(cost) as ordertotal FROM order WHERE status>0  ORDER BY ordertotal";
$results = mysqli_query($conn, $sql_kaloi);





echo'<div align="center"><b>Κακοί εμπόροι</b><hr><hr></div>';

$row;
if (mysqli_num_rows($results) > 0) {

	
	while($row = mysqli_fetch_assoc($results))
	{
		echo '<div align="center">Email:&emsp;' . $row['email']. '&emsp;&emsp;-&emsp;&emsp;:&emsp;Τζιρος: ' . $row['ordertotal']. '€<br></div>';
	}
	
	mysqli_free_result($results);
	
}
else{
	
	echo '<div align="center">  ΚΑΝΕΝΑΣ </div>';
}
echo'<hr>';

/*$sql_katastasi = "SELECT customer_name, email, debt FROM customer WHERE debt>0 ";
$results = mysqli_query($conn, $sql_katastasi);

echo'<div align="center"><b>Κακοί πελάτες</b><hr><hr></div>';

$row;
if (mysqli_num_rows($results) > 0) {

	
	while($row = mysqli_fetch_assoc($results))
	{
		echo '<div align="center">Όνομα:&emsp;' . $row['customer_name']. '&emsp;&emsp;-&emsp;&emsp;Email:&emsp;' . $row['email']. '&emsp;&emsp;-&emsp;&emsp;:&emsp;Χρέος: ' . $row['debt']. '€<br></div>';
	}
	
	mysqli_free_result($results);
	
}
else{
	
	echo '<div align="center">  ΚΑΝΕΝΑΣ. </div>';
}


*/

?>