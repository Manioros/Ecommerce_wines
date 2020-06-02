<?php
include 'init.php';
if(isset($_POST["id"])){ $id = $_POST["id"]; }else{ $id = NULL; }
$id = (int)$id; 
$sql = " SELECT * FROM wine WHERE wine_id = '$id' ";
$result = $conn->query($sql);
$product = mysqli_fetch_assoc($result);
?>
<!--Koumpi plhroforiwn-->
<?php ob_start(); ?>

<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" onclick="closeModal()" aria-label="Close">
					<span aria-hidden="true">&times; </span>
				</button>
				<h4 class="modal-title text-center"><?= $product['wine_name']; ?> </h4>
			</div>
			<div class="modal-body">
				<div class"container-fluid">
					<div class="row">
						<span id="modal_errors" class="bg-danger"></span>
						<div class="col-sm-6">
							<div class="center-block">
								<img src="<?= $product['foto']; ?>" alt="<?= $product['wine_name']; ?>" class="details img-responsive">
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Πληροφορίες</h4>
							<p><?= $product['info']; ?></p>
							<hr>
							<p>Οινοποιείο: <?= $product['winery']; ?> </p>
							<p>Χρονολογία: <?= $product['year']; ?>  </p>
							<p>Χρώμα: <?=  $product[ 'color']; ?>  </p>
							<!-- <p>Ποικιλία: <?= $product['']; ?>  </p> -->
							<hr>
							<p>Τιμή Λιανικής: <?= $product['retail_price']; ?>€ </p>
							<p>Τιμή Χονδρικής: <?=$product['wholesale_price']; ?>€ </p>
							<form action="add_cart.php" method="post" id="add_product_form">
								<input type="hidden" name="wine_id" value="<?=$id;?>">
								
								<div class="form-group">
									<div class="col-xs-3">
										<label for="quantity">Ποσότητα:</label>
										<input type="number" class="form-control" id="quantity" name="quantity" min="0">
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" onclick="closeModal()" >Κλείσιμο</button>
				<button class="btn btn-warning" onclick="add_to_cart();return false "><span class="glyphicon glyphicon-shopping-cart"></span>Προσθήκη στο Καλάθι</button>
			</div>
		</div>	
	</div>
</div>
<script>
	function closeModal() {
		jQuery('#details-modal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}



</script>

<?php echo ob_get_clean(); ?>