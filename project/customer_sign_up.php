<?PHP

include 'init.php';

$firstN= $_POST['name'];
$LastN =$_POST['sname'];
$email =$_POST['usremail'];
$pass =$_POST['pass'];
$address =$_POST['address'];
$phone =$_POST['phone'];
$bank =$_POST['bank_ac'];
$name =$firstN;
$name .=" ";
$name .=$LastN;



/* Elenhos gia idio email */
$Email_exist;
$sameEmail = "SELECT email FROM customer WHERE email='$email' UNION SELECT email FROM trader WHERE email='$email'";
if ($Email_exist = mysqli_query($conn, $sameEmail)) {
} else {
    echo "Error: " . $sameEmail . "<br>" . mysqli_error($conn) . "<br>";
}
/* elenhos gia idio bank acount */
$bank_exist;
$same_bank = "SELECT bank_account FROM customer WHERE bank_account='$bank'";
if ($bank_exist = mysqli_query($conn, $same_bank)) {
} else {
    echo "Error: " . $same_bank . "<br>" . mysqli_error($conn) . "<br>";
}

if(mysqli_num_rows($bank_exist) == 0 and mysqli_num_rows($Email_exist) == 0 and !empty($_POST["usremail"]) and !empty($_POST["pass"]) and !empty($_POST["name"]) and !empty($_POST["sname"]) and !empty($_POST["phone"]) and !empty($_POST["address"]))
{

	/*Dimiourgia customer */
	
	$ins = "INSERT INTO customer (customer_name, phone, address, debt,password, email,bank_account)
	VALUES ('$name', $phone,'$address',  0.0 ,'$pass','$email','$bank')";

	if (mysqli_query($conn, $ins)) {
		echo '<div align="center"> <b>!!! Account creation succeed !!! </b>  </div>';
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
	include 'custCreation.php';
}
?>