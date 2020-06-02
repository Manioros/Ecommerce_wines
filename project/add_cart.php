<?PHP

include 'init.php';

$wine_id = $_POST['wine_id'];
$quantity = $_POST['quantity'];

$email = $_POST['email'];
$pass = $_POST['pass'];



$sql = "SELECT email FROM customer WHERE email='$email' AND password='$pass'";



$product = "SELECT * FROM cart WHERE email='$email' AND wine_id='$wine_id'";

if($product_exist=mysqli_query($conn, $product)){} 
else {
    echo "Error: " . $product_exist . "<br>" . mysqli_error($conn) . "<br>";
}

if(mysqli_num_rows($product_exist) == 0){

	$ins = "INSERT INTO cart ( wine_id, quantity,email)
	VALUES ($wine_id,$quantity,'$email' )";

	if (mysqli_query($conn, $ins)) {
		
	} else {
		echo "Error: ".$ins."<br>". mysqli_error($conn) . "<br>";
	}

}
else{

	$sql="SELECT quantity FROM cart WHERE email='$email' AND wine_id='$wine_id'";
	$result=mysqli_query($conn, $sql);
	$row=mysqli_fetch_array ($result);
	$quantity_new = $row['quantity'] + $quantity;
	

	$sql="UPDATE cart
		SET quantity ='$quantity_new'
		WHERE email ='$email' AND wine_id='$wine_id'";

	mysqli_query($conn, $sql);

	
}
mysqli_free_result($quantity_new);
mysqli_free_result($sql);
mysqli_free_result($ins);


?>


