<?php 
include 'classes/Setting.php';
$st = new Setting();
$data = $st->get_setting();



?>
<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="index.php">Customer Service</a></li>
                    <li><a href="index.php"><span>Advanced Search</span></a></li>
                    <li><a href="index.php">Orders and Returns</a></li>
                    <li><a href="index.php"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="index.php">About Us</a></li>
                    <li><a href="index.php">Customer Service</a></li>
                    <li><a href="index.php">Privacy Policy</a></li>
                    <li><a href="index.php"><span>Site Map</span></a></li>
                    <li><a href="index.php"><span>Search Terms</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="index.php">Sign In</a></li>
                    <li><a href="index.php">View Cart</a></li>
                    <li><a href="index.php">My Wishlist</a></li>
                    <li><a href="index.php">Track My Order</a></li>
                    <li><a href="index.php">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span><?php echo $data['number']; ?></span></li>
                    <li><span><?php echo $data['A_number']; ?></span></li>                    
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li class="facebook"><a href="<?php echo $data['facebook']; ?>" target="_blank"> </a></li>
                        <li class="twitter"><a href="<?php echo $data['instragram']; ?>" target="_blank"> </a></li>
                        <li class="googleplus"><a href="<?php echo $data['google']; ?>" target="_blank"> </a></li>
                        <li class="contact"><a href="<?php echo $data['twitter']; ?>" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Training with live project &amp; All rights Reseverd </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        /*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css' />
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function() {
        SyntaxHighlighter.all();
    });
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        toastr.options = {
            closeButton: true,
            positionClass: "toast-top-center",
            showDuration: "300", // ফেইড ইন হওয়ার সময় (মিলিসেকেন্ডে)
            hideDuration: "1000", // ফেইড আউট হওয়ার সময় (মিলিসেকেন্ডে)
            timeOut: "4000", // টোস্ট প্রদর্শনের সময় (মিলিসেকেন্ডে)
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn", // ফেইড ইন ইফেক্ট
            hideMethod: "fadeOut" // ফেইড আউট ইফেক্ট
        };


        //====================Cart====================
        if (localStorage.getItem('check_result')) {
            toastr.success('Cart Already Added!');
            localStorage.removeItem('check_result');
        }
        
        if (localStorage.getItem('cat_insert')) {
            toastr.success('Cart Inserted successfully!');
            localStorage.removeItem('cat_insert');
        }
        if (localStorage.getItem('cart_update')) {
            toastr.success('Cart Update successfully!');
            localStorage.removeItem('cart_update');
        }
        if (localStorage.getItem('cart_delete')) {
            toastr.success('Cart Delete Successfully!');
            localStorage.removeItem('cart_delete');
        }
        if (localStorage.getItem('login')) {
            toastr.success('Login Successfully!');
            localStorage.removeItem('login');
        }
        if (localStorage.getItem('contact')) {
            toastr.success('Thanks for your communicate!');
            localStorage.removeItem('contact');
        }

 </script>
</body>

</html>