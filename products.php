<?php include('include/header.php'); ?>
<?php
include_once 'classes/Product.php';

$pd = new Product();
$product1 = $pd->top_brand_iphone();
$product2 = $pd->top_brand_samsung();
$product3 = $pd->top_brand_walton();
$product4 = $pd->top_brand_singer();
?>
<div class="main">
	<div class="content">
		<div class="content_top">
			<div class="heading">
				<h3>Latest from Iphone</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			<?php
			while ($row = mysqli_fetch_assoc($product1)) { ?>

				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;"></a>
					<h2><?php echo $row['p_name']; ?></h2>
					<p><?php echo $row['p_title']; ?></p>
					<p><?php echo $row['prize']; ?></p>
					<div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
				</div>

			<?php }
			?>
		</div>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Walton</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
			 <?php
				while ($row = mysqli_fetch_assoc($product2)) { ?>

				<div class="grid_1_of_4 images_1_of_4">
				<a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;"></a>
				<h2><?php echo $row['p_name']; ?></h2>
				<p><?php echo $row['p_title']; ?></p>
				<p><?php echo $row['prize']; ?></p>
				<div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
		</div>

	<?php }
	?>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Samsung</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
		<?php
			while ($row = mysqli_fetch_assoc($product3)) { ?>

				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;"></a>
					<h2><?php echo $row['p_name']; ?></h2>
					<p><?php echo $row['p_title']; ?></p>
					<p><?php echo $row['prize']; ?></p>
					<div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
				</div>

			<?php }
			?>
		<div class="content_bottom">
			<div class="heading">
				<h3>Latest from Samsung</h3>
			</div>
			<div class="clear"></div>
		</div>
		<div class="section group">
		<?php
			while ($row = mysqli_fetch_assoc($product4)) { ?>

				<div class="grid_1_of_4 images_1_of_4">
					<a href="details.php?id=<?php echo $row['id']; ?>"> <img src="images/product-img/<?php echo $row['image']; ?>" alt="" class="img-thumbnail" style="width: 200px; height: 200px; object-fit: cover;"></a>
					<h2><?php echo $row['p_name']; ?></h2>
					<p><?php echo $row['p_title']; ?></p>
					<p><?php echo $row['prize']; ?></p>
					<div class="button"><span><a href="details.php?id=<?php echo $row['id']; ?>" class="details">Details</a></span></div>
				</div>

			<?php }
			?>
	</div>
</div>

<?php include('include/footer.php'); ?>