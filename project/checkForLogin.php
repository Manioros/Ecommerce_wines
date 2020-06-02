<?PHP

include 'init.php';

$email = $_POST['usremail'];
$pass = $_POST['pass'];



/*elenxw an uparxei to acount*/
$sql_acc_exist1 = "SELECT email, password FROM customer WHERE email='$email' AND password='$pass'";
$results1;
$sql_acc_exist2 = "SELECT email, password FROM trader WHERE email='$email' AND password='$pass'";
$results2;

if ($results1 = mysqli_query($conn, $sql_acc_exist1)) {
} else {
    echo "Error: " . $sql_acc_exist1 . "<br>" . mysqli_error($conn) . "<br>";
}
if ($results2 = mysqli_query($conn, $sql_acc_exist2)) {
} else {
    echo "Error: " . $sql_acc_exist2 . "<br>" . mysqli_error($conn) . "<br>";
}


	if(mysqli_num_rows($results1) == 1 and !empty($_POST["usremail"]) and !empty($_POST["pass"])) {
		mysqli_free_result($results1);
		include 'custHome.php';
	}
	elseif(mysqli_num_rows($results2) == 1 and !empty($_POST["usremail"]) and !empty($_POST["pass"])) {
		mysqli_free_result($results2);
		include 'mercHome.php';
	}
	else {
		echo '<div align="center"> <b>!!! Wrong email or password !!!. Try again.</b></div>';
		mysqli_free_result($results1);
		mysqli_free_result($results2);
		
		mysqli_close($conn);
		include 'login.php';
	}

?>