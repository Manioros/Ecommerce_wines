<?php

include 'init.php';

$email = $_POST['usremail'];
$pass = $_POST['pass'];

if(isset($_POST['ColorType'])){ $ColorType = $_POST['ColorType']; }else{ $ColorType = NULL; }
if(isset($_POST['WineryType'])){ $WineryType = $_POST['WineryType']; }else{ $WineryType = NULL; }
if(isset($_POST['YearType'])){ $YearType = $_POST['YearType']; }else{ $YearType = NULL; }


if(isset($_POST["id"])){ $id = $_POST["id"]; }else{ $id = NULL; }


if($ColorType == NULL && $WineryType == NULL&& $YearType == NULL)
{
	$sql = "SELECT * FROM wine ";
	$products = $conn->query($sql);
  
} else{
	if($WineryType == NULL){

		if($YearType == NULL){

		$sql = "SELECT * FROM wine  WHERE color=N'$ColorType' ";
		$products = $conn->query($sql);
		}elseif($ColorType == NULL){

		$sql = "SELECT * FROM wine  WHERE year=N'$YearType' ";
		$products = $conn->query($sql);
		}
		else{
			$sql = "SELECT * FROM wine  WHERE color=N'$ColorType' AND year=N'$YearType' ";
			$products = $conn->query($sql);

		}

		
	}elseif($ColorType == NULL){
		if($YearType == NULL){

		$sql = "SELECT * FROM wine  WHERE winery=N'$WineryType' ";
		$products = $conn->query($sql);
		}elseif($WineryType == NULL){

		$sql = "SELECT * FROM wine  WHERE year=N'$YearType' ";
		$products = $conn->query($sql);
		}
		else{
			$sql = "SELECT * FROM wine  WHERE winery=N'$WineryType' AND year=N'$YearType' ";
			$products = $conn->query($sql);

		}

	}elseif($YearType == NULL){
		if($ColorType == NULL){

		$sql = "SELECT * FROM wine  WHERE winery=N'$WineryType' ";
		$products = $conn->query($sql);
		}elseif($WineryType == NULL){

		$sql = "SELECT * FROM wine  WHERE color=N'$ColorType' ";
		$products = $conn->query($sql);
		}
		else{
			$sql = "SELECT * FROM wine  WHERE winery=N'$WineryType' AND color=N'$ColorType' ";
			$products = $conn->query($sql);

		}

	}else{
		$sql = "SELECT * FROM wine  WHERE color=N'$ColorType' AND winery=N'$WineryType' AND year=N'$YearType' ";
		$products = $conn->query($sql);

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
				<form action="epistrofh.php" method="POST">
					<button class="btn-link">Επιστροφή</button>
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
		
	
    <div class = "container-fluid">
    	<!-- left side bar SEARCH -->
		<div class = "col-md-2">
			<h2 class = "text-center"><small>Αναζήτηση</small></h2>
			<div id="search">
				<b>Επιλογή Χρώματος</b>
				<form action="market.php" method="POST">
					<input type="hidden" name="usremail" id="usremail" value="<?PHP echo $_POST['usremail']?>" />
					<input type="hidden" name="pass" id="pass" value="<?PHP echo $_POST['pass']?>" />
					<p>
						<div class="ColorOptions">
							<select name="ColorType">
								<option></option>
								<option>Κόκκινο</option>
								<option>Λευκό</option>
								<option>Ροζέ</option>
			
							</select>
						</div>
						<b>Επιλογή Οινοποιείου</b>
						<div class="WineryOptions">
							<select name="WineryType">
								<option></option>
								<option>ALEXAKIS WINERY</option>
								<option>Δουλουφάκης</option>
								<option>Αμπελώνες Καραβιτάκη</option>
								<option>ΜΙΝΩΣ Κρασιά Κρήτης ΑΕ</option>
								<option>Ρους Οινοποιία Ταμιωλακη</option>
								<option>Αφοί Σπ. Μαραγκάκη</option>
								<option>Ευφροσύνη</option>
								<option>Λυραράκης - ΓΕΑ ΑΕ</option>
								<option>Κτήμα Μιχαλάκη</option>
								<option>Κτήμα Ζαχαριουδάκη</option>
							</select>
						</div>
						<b>Επιλογή Χρονολογίας</b>
						<div class="YearOptions">
							<select name="YearType">
								<option></option>
								<option>2000</option>
								<option>2001</option>
								<option>2002</option>
								<option>2003</option>
								<option>2004</option>
								<option>2005</option>
								<option>2006</option>
								<option>2007</option>
								<option>2008</option>
								<option>2009</option>
								<option>2010</option>
								<option>2011</option>
								<option>2012</option>
								<option>2013</option>
								<option>2014</option>
								<option>2015</option>
								<option>2016</option>
								<option>2017</option>
							</select>
						</div>
					</p>
					
					<p>
						<input type="submit" id="searchbtn" value="Αναζήτηση">
					</p>
				</form>
			</div>

		</div>
		<!-- main content -->
		<div class = "col-md-8">

	        <div class = "row">
		    <h2 class = "text-center">Κρασιά</h2>
		    <?php while($product = mysqli_fetch_assoc($products)) : ?>
				<div class = "col-sm-3 text-center">
					<h4><?= $product['wine_name']; ?></h4>
					<img src="<?= $product['foto']; ?>" alt="<?= $product['wine_name']; ?>" class="img-thumb">
					<p class = "price">Τιμή Λιανικής: <?=$product['retail_price'];   ?>€</p>
					<p class = "price">Τιμή Χονδρικής: <?=$product['wholesale_price'];   ?>€</p>
					<button type ="button" class="btn btn-sm btn-success"  onclick="detailsmodal(<?= $product['wine_id']; ?>)">Περισσότερα</button>
				</div>
				<?php endwhile; ?> 
			</div>
		</div>
	</div>



<script >
	function detailsmodal(id){
		var data = {"id" : id};
		jQuery.ajax({
			url : '/project/detailsmodal.php',
			method : "post",
			data : data ,
			success: function(data){
				jQuery('body').prepend(data);
				jQuery('#details-modal').modal('toggle');
			},
			error: function(){
				alert("Something went wrong");
			}
		});

	}
	function add_to_cart(){
		jQuery('#modal_errors').html("");
		var quantity = jQuery('#quantity').val() ;
		var error = '';
		var data = jQuery('#add_product_form').serialize()  ;
		data +=  '&email=<?= $email; ?>';
		data +=  '&pass=<?= $pass; ?>';
		if(quantity == '' || quantity == 0){
			error += '<p class="text-danger text-center">Πρέπει να επιλέξετε ποσότητα.</p>';
			jQuery('#modal_errors').html(error);
			return;
		}else{
			jQuery.ajax({
				url : '/project/add_cart.php',
				method : 'post',
				data : data,
				success : function(){

					alert("Το προϊόν μπήκε στο καλάθι." );
					jQuery('#details-modal').modal('hide');
					setTimeout(function(){
						jQuery('#details-modal').remove();
						jQuery('.modal-backdrop').remove();
					},500);
				},
				error : function(){alert("Κάτι πήγε στραβά!");}
			})
		}
	}
</script>


</body>
</html>








