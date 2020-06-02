<?PHP
include 'init.php';

$firstN = $_POST['name'];
$lastN = $_POST['sname'];
$email = $_POST['usremail'];
$pass = $_POST['pass'];
$bank= $_POST['bank_ac'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$name = $firstN;
$name .= " ";
$name .= $lastN;

/* Elenhos gia idio email */
$Email_exist;
$sameEmail = "SELECT email FROM customer WHERE email='$email' UNION SELECT email FROM trader WHERE email='$email'";


if ($Email_exist = mysqli_query($conn, $sameEmail)) {
} else {
    echo "Error: " . $sameEmail . "<br>" . mysqli_error($conn) . "<br>";
}

$bank_exist;
$same_bank = "SELECT bank_account FROM trader WHERE bank_account='$bank'";
if ($bank_exist = mysqli_query($conn, $same_bank)) {
} else {
    echo "Error: " . $same_bank . "<br>" . mysqli_error($conn) . "<br>";
}


if(mysqli_num_rows($bank_exist) == 0 and mysqli_num_rows($Email_exist) == 0 and !empty($_POST["usremail"]) and !empty($_POST["pass"]) and !empty($_POST["name"]) and !empty($_POST["sname"]) and !empty($_POST["phone"]) and !empty($_POST["address"]))
{

	/*Dimiourgia trader */
	
	$ins = "INSERT INTO trader (email, trader_name,address ,password, phone, debt,
	bank_account)
	VALUES ('$email', '$name','$address','$pass','$phone',0.0,'$bank')";

	if (mysqli_query($conn, $ins)) {
		echo '<div align="center"> <b> Account creation succeed!!! </b> </div>';
	} else {
		echo "Error: ".$ins."<br>". mysqli_error($conn) . "<br>";
	}
	mysqli_free_result($bank_exist);
	mysqli_free_result($Email_exist);
	
	mysqli_close($conn);
	include 'login.php';

}else{
	if(mysqli_num_rows($Email_exist) > 0)
	{
		echo '<div align="center"> <b>!!! Email already exist !!!</b></div>';

	} elseif(mysqli_num_rows($bank_exist) > 0) 
	{
		echo '<div align="center"> <b>!!! Bank acount already exist !!!</b></div>';

	} else
	{
		echo '<div align="center"> <b>!!! Error empty fields!!!</b></div>';
		
	}

	mysqli_free_result($bank_exist);
	mysqli_free_result($Email_exist);
	mysqli_close($conn);
	include 'mercCreation.php';
}

?>