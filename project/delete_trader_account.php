<?PHP
include 'init.php';

$email = $_POST['usremail'];



$sql_values = "SELECT debt FROM trader WHERE email='$email'";
	if ($results = mysqli_query($conn, $sql_values)) {
		$row = mysqli_fetch_assoc($results);
	}
	else {
		echo "Error: " . $sql_values . "<br>" . mysqli_error($conn) . "<br>";
	}
	
	
if($row["debt"] <= 0) {
	$sql_values = "DELETE FROM trader WHERE email='$email'";
	if ($results = mysqli_query($conn, $sql_values)) {
		mysqli_close($conn);
		include 'login.php';
	}
	else {
		echo "Error: " . $sql_values . "<br>" . mysqli_error($conn) . "<br>";
		mysqli_close($conn);
		include 'mercHome.php';
	}
} else {
	echo '<div align="center"> <b> There is some debt so account cannot be deleted. </b></div>';
	mysqli_close($conn);
	include 'mercHome.php';
}
?>