<?php include('include/header.php');
error_reporting(2);
?>
<?php
if (!isset($_SESSION['user'])) {
	header('location:index.php');
}
?>
<?php
include 'classes/Setting.php';
$ste = new Setting();
$data = $ste->get_setting();
?>
<?php
if (isset($_POST['submit'])) {
	$data = $ste->contact($_POST);
}
?>
<div class="main">
	<div class="content">
		<div class="support">
			<div class="support_desc">
				<h3>Live Support</h3>
				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
			</div>
			<img src="web/images/contact.png" alt="" />
			<div class="clear"></div>
		</div>
		<div class="section group">
			<div class="col span_2_of_3">
				<div class="contact-form">
					<h2>Contact Us</h2>
					<form method="POST">
						<div>
							<span><label for="name">NAME</label></span>
							<span><input type="text" name="name" id="name" value="" required></span>
						</div>
						<div>
							<span><label for="email">E-MAIL</label></span>
							<span><input type="email" name="email" id="email" value="" required></span>
						</div>
						<div>
							<span><label for="phone">MOBILE.NO</label></span>
							<span><input type="number" name="phone" id="phone" value="" required></span>
						</div>
						<div>
							<span><label for="subject">SUBJECT</label></span>
							<span><textarea name="subject" id="subject" required></textarea></span>
						</div>
						<div>
							<span><input type="submit" name="submit" value="SUBMIT"></span>
						</div>
					</form>

				</div>
			</div>
			<div class="col span_1_of_3">
				<div class="company_address">
					<h2>Company Information :</h2>
					<p><?php echo $data['c_name']; ?></p>
					<p><?php echo $data['address']; ?></p>
					<p><?php echo $data['country']; ?></p>
					<p>Phone:<?php echo $data['number']; ?></p>
					<p>Fax: <?php echo $data['fax']; ?></p>
					<p>Email: <span><?php echo $data['email']; ?></span></p>
					<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('include/footer.php'); ?>