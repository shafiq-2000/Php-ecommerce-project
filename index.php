<?php include('include/header.php'); ?>
<?php include('include/slider.php'); ?>

<?php
//include 'classes/Product.php';
 
$pd = new Product();
$get_feature_product = $pd->get_feature_product();
?>


<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">				
				<h3>Feature Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			if ($get_feature_product) {
				while ($result = $get_feature_product->fetch_assoc()) { ?>


					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?id=<?php echo $result['id']; ?>" class="d-block">
							<img src="images/product-img/<?php echo $result['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
						</a>
						<h2><?php echo $result['p_name']; ?> </h2>
						<h2><?php echo $result['p_title']; ?> </h2>
						<h2><?php echo $result['prize']; ?> </h2>
						<div class="button"><span><a href="details.php?id=<?php echo $result['id']; ?>" class="details">Details</a></span></div>
					</div>

			<?php }
			}
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>New Products</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">

			<?php
			$get_new_product = $pd->get_new_product();
			if ($get_new_product) {
				while ($result2 = $get_new_product->fetch_assoc()) { ?>


					<div class="grid_1_of_4 images_1_of_4">
						<a href="details.php?id=<?php echo $result2['id']; ?>" class="d-block">
							<img src="images/product-img/<?php echo $result2['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;">
						</a>
						<h2><?php echo $result2['p_title']; ?> </h2>
						<h2><?php echo $result2['prize']; ?> </h2>
						<div class="button"><span><a href="details.php?id=<?php echo $result2['id']; ?>" class="details">Details</a></span></div>
					</div>

			<?php }
			}
			?>



		</div>
	</div>
</div>
</div>

<?php include('include/footer.php'); ?>