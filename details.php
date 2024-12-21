<?php include('include/header.php'); ?>
<?php
include 'classes/Product.php';

$details = new Product();
$id = $_GET['id'];

//product details show page
if (isset($_GET['id'])) {
	$dt_product = $details->product_details($id);
	$row = mysqli_fetch_assoc($dt_product);
}
?>
<?php
include 'classes/Cart.php';
$cart = new Cart();
if (isset($_POST['submit'])) {
	$cart->addCard($_POST, $id);
}
?>
<?php
include 'classes/Category.php';
$ctg = new Category();
$ctg = $ctg->show_category();

?>




<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<div class="grid images_3_of_2">
					<img src="images/product-img/<?php echo $row['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $row['p_title'] ?> </h2>
					<p><?php echo $row['p_description'] ?> </p>
					<div class="price">
						<p>Price: <span><?php echo $row['prize'] ?> </span></p>
						<p>Category: <span><?php echo $row['category_name'] ?> </span></p>
						<p>Brand:<span><?php echo $row['brandName'] ?> </span></p>
					</div>
					<div class="add-cart">

						<?php
						if (isset($_SESSION['user'])) {
						?>
							<form method="POST">
								<input type="number" class="buyfield" name="quantity" value="1" />
								<input type="submit" class="buysubmit" name="submit" onclick="return confirm('Are you sure Add to cart?')" value="Buy Now" />
							</form>

						<?php
						} else {
						?>
							<form method="POST">
								<input type="number" class="buyfield" name="quantity" value="1" />
								<input type="submit" class="buysubmit" value="Buy Now" onclick="return logoutUser()" />
							</form>

							<script>
								function logoutUser() {
									if (confirm("You are not logged in. Please Login then buy the product.")) {
										// Redirect to the login page
										window.location.href = "admin/user-login.php"; // login page URL
										return false; // Prevent form submission
									}
									return true; // Allow form submission if user cancels
								}
							</script>
						<?php
						}
						?>



						<!-- <form method="POST">
							<input type="number" class="buyfield" name="quantity" value="1" />
							<input type="submit" class="buysubmit" name="submit" onclick="return confirm('Are you sure Add to cart?')" value="Buy Now" />
						</form> -->
					</div>
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo $row['p_description'] ?></p>
					<p><?php echo $row['p_description'] ?></p>
				</div>

			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>

				<?php
				if ($ctg) {
					while ($row = mysqli_fetch_assoc($ctg)) { ?>
						<ul>
							<li><a href="productbycat.php?catId=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
						</ul>

				<?php }
				}
				?>


			</div>
		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>