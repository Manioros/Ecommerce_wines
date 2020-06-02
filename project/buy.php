<?PHP
include 'init.php';

$email = $_POST['usremail'];
$pass = $_POST['pass'];
$pay = $_POST['payment'];
if(isset($_POST['amount'])){ $amount = $_POST['amount']; }else{ $amount =0; }


$today = date("Y-m-d");
$date10=date_create("$today");
$date10=date_modify($date10,"-10 days");
$date1=date_format($date10,"Y-m-d");




$sql5="SELECT email,debt FROM customer WHERE email='$email' ";

if($isCustomer = mysqli_query($conn, $sql5)){}
else {
    echo "Error: " . $isCustomer . "<br>" . mysqli_error($conn) . "<br>";
}

if (mysqli_num_rows($isCustomer)!=0) {
	$sql = "SELECT sum(cart.quantity * wine.retail_price) as ordersum FROM cart, wine where cart.email='$email' AND wine.wine_id=cart.wine_id";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			$tmp= $row['ordersum'];
			

}

$sql6="SELECT email,debt FROM trader WHERE email='$email' ";
if($isTrader = mysqli_query($conn, $sql6)){}
else {
    echo "Error: " . $isTrader . "<br>" . mysqli_error($conn) . "<br>";
}


if (mysqli_num_rows($isTrader)!=0) {
	$sql = "SELECT sum(cart.quantity * wine.wholesale_price) as ordersum FROM cart, wine where cart.email='$email' AND wine.wine_id=cart.wine_id";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_array($result);
			$tmp= $row['ordersum'];
			
} 





$proceed=1;
$mhnhma="Η Αγορά πραγματοποιήθηκε με επιτυχία";
$status=0.0;
/*pelaths*/
if($rowd=mysqli_num_rows($isTrader) == 0){
	$sql6="SELECT MIN(order_date) FROM `order` WHERE email='$email' AND status>0 "; 
	

	if ($oldorder=mysqli_query($conn,$sql6)) {
	} else {
    echo "Error: " . $oldorder . "<br>" . mysqli_error($conn) . "<br>";
	}

	$row= mysqli_fetch_array($oldorder);
	$dat=$row[0];
	

	if($dat<$date1 && $dat!=0 ){
		$proceed=0;
		$mhnhma="Η Αγορά δεν είναι δυνατόν να πραγματοποιήθει λόγο χρέους ";
		
	}


}else{
	$sql21 = "SELECT quantity FROM cart WHERE email='$email'";

	$result21=mysqli_query($conn,$sql21);

	if ($result21) {} 
	else {
		echo "Error: ".$sql21."<br>". mysqli_error($conn) . "<br>";
	}
	$wines=0;
	while($row21 = mysqli_fetch_array($result21)){
		$wines=$wines+1;
		if($row21[0]<6 ){
			$proceed=0;
			$mhnhma="Η Αγορά δεν είναι δυνατόν να πραγματοποιήθει λόγο ποσότητας ";
		}
		
	}
	if($wines<3 ){
		$proceed=0;
		$mhnhma="Η Αγορά δεν είναι δυνατόν να πραγματοποιήθει λόγο ποσότητας ";
	}


}

if($proceed==1 && mysqli_num_rows($isTrader)== 0 ){

		
		if($pay==="all"){
			$status = 0.0;
			
		}else{
			$status = $tmp-$amount;
			
			$sql="UPDATE customer
			SET debt =debt+'$status'
			WHERE email ='$email'";

			mysqli_query($conn, $sql);
			
		}

		

		$sql3 = "INSERT INTO `order`(`order_date`, `cost`, `email`, `status`) VALUES ('$today',$tmp,'$email',$status)";
					$result3=mysqli_query($conn,$sql3);

		$last_id = mysqli_insert_id($conn);	



		

			


			if ($result3) {} 
			else {
				echo "Error: ".$sql3."<br>". mysqli_error($conn) . "<br>";
			}



		




		$sql2 = "SELECT cart.quantity, cart.idr, wine.retail_price , wine.wine_id FROM cart, wine where cart.email='$email' 
		AND wine.wine_id=cart.wine_id";
					$result2=mysqli_query($conn,$sql2);

					if ($result2) {} 
					else {
							echo "Error: ".$sql2."<br>". mysqli_error($conn) . "<br>";
					}
					

					while($row3 = mysqli_fetch_array($result2)){

						$q= $row3["quantity"];
						$price = $row3["retail_price"];
						$wid =  $row3["wine_id"];
						$idr =   $row3["idr"];

						/*echo "q:".$q." p:".$price. "wine id:" .$wid;*/

						$sql4 = "INSERT INTO `item`(`order_id`, `quantity`, `wine_id`, `price`) VALUES ('$last_id','$q','$wid','$price')";
						$result4=mysqli_query($conn,$sql4);

						if ($result4) {} 
						else {
							echo "Error: ".$sql4."<br>". mysqli_error($conn) . "<br>";
						}

						$sql3 = "DELETE FROM `cart` WHERE idr ='$idr'";
						$result3=mysqli_query($conn,$sql3);


						if ($result3) {} 
						else {
							echo "Error: ".$sql3."<br>". mysqli_error($conn) . "<br>";
						}

					}

}elseif($proceed==1 && mysqli_num_rows($isCustomer)== 0){

		if($pay==="all"){
			$status = 0.0;
			
		}else{
			$status = $tmp-$amount;
			$sql="UPDATE trader
			SET debt =debt+'$status'
			WHERE email ='$email'";

			mysqli_query($conn, $sql);
			
		}

		$sql3 = "INSERT INTO `order`(`order_date`, `cost`, `email`, `status`) VALUES ('$today',$tmp,'$email',$status)";
					$result3=mysqli_query($conn,$sql3);

		$last_id = mysqli_insert_id($conn);		

			

			if ($result3) {} 
			else {
				echo "Error: ".$sql3."<br>". mysqli_error($conn) . "<br>";
			}




		$sql2 = "SELECT cart.quantity, cart.idr, wine.wholesale_price , wine.wine_id FROM cart, wine where cart.email='$email' 
		AND wine.wine_id=cart.wine_id";
					$result2=mysqli_query($conn,$sql2);

					if ($result2) {} 
					else {
							echo "Error: ".$sql2."<br>". mysqli_error($conn) . "<br>";
					}
					

					while($row3 = mysqli_fetch_array($result2)){

						$q= $row3["quantity"];
						$price = $row3["wholesale_price"];
						$wid =  $row3["wine_id"];
						$idr =   $row3["idr"];

						/*echo "q:".$q." p:".$price. "wine id:" .$wid;*/

						$sql4 = "INSERT INTO `item`(`order_id`, `quantity`, `wine_id`, `price`) VALUES ('$last_id','$q','$wid','$price')";
						$result4=mysqli_query($conn,$sql4);

						if ($result4) {} 
						else {
							echo "Error: ".$sql4."<br>". mysqli_error($conn) . "<br>";
						}

						$sql3 = "DELETE FROM `cart` WHERE idr ='$idr'";
						$result3=mysqli_query($conn,$sql3);


						if ($result3) {} 
						else {
							echo "Error: ".$sql3."<br>". mysqli_error($conn) . "<br>";
						}

					}

}




?>



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

		 <h2 class = "text-center">Καλάθι</h2>
		 <hr>
		<h4 class = "text-center"> <?PHP echo $mhnhma?> </h4>


</body>
</html>