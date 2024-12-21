<?php include('include/header.php'); ?>

<?php
if (isset($_GET['catId'])) {
	$id = $_GET['catId'];
	include_once 'classes/Product.php';
	$pd = new Product();
	$products = $pd->get_cat_product($id);
} else {
	header('location:404page.php');
}
?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Latest from Category</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			if ($products && mysqli_num_rows($products) > 0) {
				while ($row = mysqli_fetch_assoc($products)) { ?>
					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?id=<?php echo $row['id']; ?>" class="d-block">
							<img src="images/product-img/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
						</a>
						<h2><?php echo $row['p_name']; ?></h2>
						<p><?php echo $row['p_title']; ?></p>
						<p><span class="price">$<?php echo $row['prize']; ?></span></p>
						<div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
					</div>
				<?php }
			} else { ?>
				<p>No products found in this category.</p>
			<?php } ?>

		</div>
	</div>
</div>
<?php include('include/footer.php'); ?>