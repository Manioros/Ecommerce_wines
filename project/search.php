
<?PHP

$email = $_POST['usremail'];
$pass = $_POST['pass'];

$ColorType = $_POST['ColorType'];


$conn = mysqli_connect("localhost","root", "", "project1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}





if($ColorType == NULL)
{
	$sql = "SELECT * FROM wine ";
	$products = $conn->query($sql);
  
} else
{
	$sql = "SELECT * FROM wine  WHERE color='$ColorType'";
	$products = $conn->query($sql);

	
}else{


}

?>
<?php

$conn = mysqli_connect("localhost","root", "", "project1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['usremail'];
$pass = $_POST['pass'];


	$sql = "SELECT wine_name , wine_id ,quantity FROM cart INNER JOIN wine ON cart.wine_id=wine.wine_id wine WHERE email='$email' UNION SELECT wine_name FROM wine_name ";
	$id = $conn->query($sql);
  	$sql = "SELECT wine_id FROM wine WHERE email='$email' ";




?>
