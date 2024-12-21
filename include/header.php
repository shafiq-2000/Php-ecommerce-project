<?php session_start() ?>


<!DOCTYPE HTML>

<head>
    <title>Ecommerce Project</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
    <!-- =====toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo22.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form>
                        <input type="text" name="searchname" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" name="searchbtn" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="cart.php" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Total $</span>
                            <span class="no_product">
                                <?php
                                if (isset($_SESSION['total_sum']) && $_SESSION['total_sum'] > 0) {
                                    $sum =  $_SESSION['total_sum'];
                                    $qty =  $_SESSION['total_cart'];
                                    echo $sum . ' (' . $qty . ')';
                                } else {
                                    echo "empty";
                                }
                                ?>

                            </span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <div class="login"><a href="profile.php"><?php echo $_SESSION['user']['name']; ?></a></div>

                <?php } else { ?>
                    <div class="login"><a href="admin/user-login.php">Login</a></div>
                <?php } ?>

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a> </li>
                <li><a href="topbrands.php">Top Brands</a></li>

                <?php
                $con = new mysqli("localhost", "root", "", "e_commerce_site");

                $sId = session_id(); // $sId সঠিকভাবে সেট করুন
                $sql = "SELECT * FROM tbl_cart WHERE s_id='$sId'";
                $result = $con->query($sql);

                if ($result && $result->num_rows > 0) {
                ?>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="payment.php">Payment</a></li>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['user'])) { ?>

                    <li><a href="contact.php">Contact</a> </li>

                <?php }
                ?>


                <div class="clear"></div>
            </ul>
        </div>