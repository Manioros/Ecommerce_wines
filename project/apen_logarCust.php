<?PHP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project1";

$email = $_POST['usremail'];

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_values = "SELECT debt FROM customer WHERE email='$email'";
	if ($results = mysqli_query($conn, $sql_values)) {
		$row = mysqli_fetch_assoc($results);
	}
	else {
		echo "Error: " . $sql_values . "<br>" . mysqli_error($conn) . "<br>";
	}
	
	
if($row["debt"] <= 0) {
	$sql_values = "DELETE FROM customer WHERE email='$email'";
	if ($results = mysqli_query($conn, $sql_values)) {
		mysqli_close($conn);
		include 'login.php';
	}
	else {
		echo "Error: " . $sql_values . "<br>" . mysqli_error($conn) . "<br>";
		mysqli_close($conn);
		include 'custHome.php';
	}
} else {
	echo '<div align="center"> <b> There is some debt so account cannot be deleted. </b></div>';
	mysqli_close($conn);
	include 'custHome.php';
}
?>