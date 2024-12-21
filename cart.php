<?php
 ob_start(); //ata na dile 84 line kaj korena

 include('include/header.php'); ?>

<?php
include_once  'classes/Cart.php';
$cart = new Cart();
$getcart = $cart->getCart();
?>

<?php
$sum = 0;
if (isset($_POST['cartupdate'])) {
	$cart->update_cart($_POST);

	//update er man (0 or -1,-2..) hole seta delete hoye jabe
	$qn = $_POST['p_qnty'];
	$cid = $_POST['cart_id'];
	if ($qn <= 0) {
		$cart->deleteCart($cid);
	}
}
?>
<?php 
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0; url=?id=live'/>";
}
?>
<div class="main">
	<div class="content">
		<div class="cartoption">
			<div class="cartpage">
				<h2>Your Cart</h2>
				<table class="tblone">
					<tr>
						<th width="20%">#SL</th>
						<th width="20%">Product Name</th>
						<th width="10%">Image</th>
						<th width="15%">Price</th>
						<th width="25%">Quantity</th>
						<th width="20%">Total Price</th>
						<th width="10%">Action</th>
					</tr>
					<?php
					$num_rows = mysqli_num_rows($getcart);
					if ($num_rows > 0) {
						$sum = 0; //for total prize 
						$qty = 0; //for total cart 
						$sl = 1;
						while ($row = mysqli_fetch_assoc($getcart)) { ?>

							<tr>
								<td><?php echo $sl++; ?></td>
								<td><?php echo $row['p_name']; ?></td>
								<td><img src="images/product-img/<?php echo $row['image'] ?>" height="100px" width="90px" alt=""></td>
								<td><?php echo $row['prize']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>" />
										<input type="hidden" name="prize" value="<?php echo $row['prize']; ?>" />
										<input type="number" name="p_qnty" value="<?php echo $row['quantity']; ?>" />
										<input type="submit" name="cartupdate" value="Update" />
									</form>
								</td>
								<td>
									<?php
									$total = $row['prize'] * $row['quantity'];
									echo $total ?>
								</td>
								<td><a onclick="return confirm('Do you want to Delete the <?php echo $row['p_name']; ?>')" href="cart_delete.php?id=<?php echo $row['cart_id']; ?>">X</a></td>
							</tr>
							<?php
							$sum = $total + $sum;
							$_SESSION['total_sum'] = $sum; //total amount store in session 

							$qty = $qty + $row['quantity'];
							$_SESSION['total_cart'] = $qty; //total cart store in session 
							?>
						<?php
						}
					} else { ?>
						<tr>
							<!-- <td colspan="12" class="text-center">Record Not Found</td> -->
							<?php header('location:index.php');
							 $_SESSION['total_sum'] = 0; 
							 $_SESSION['total_cart'] = 0; ?>

						</tr>
					<?php } ?>

				</table>
				<!-- tbl_cart a data na thakle ai table shw korbe na -->
				<?php if ($sum > 0) { ?>
					<table style="float:right;text-align:left;" width="40%">
						<tr>
							<th>Sub Total : </th>
							<td><?php echo $sum; ?></td>
						</tr>
						<tr>
							<th>VAT : </th>
							<td>10%</td>
						</tr>
						<tr>
							<th>Grand Total :</th>
							<td><?php echo $sum + ($sum * 10 / 100); ?></td>
						</tr>
					</table>
				<?php } ?>
			</div>
			<div class="shopping">
				<div class="shopleft">
					<a href="index.php"> <img src="images/shop.png" alt="" /></a>
				</div>
				<div class="shopright">
					<a href="payment.php"> <img src="images/check.png" alt="" /></a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
<?php include('include/footer.php'); ?>