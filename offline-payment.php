<?php
ob_start(); //ata na dile 84 line kaj korena

include('include/header.php'); ?>

<?php
include_once  'classes/Cart.php';
$cart = new Cart();
$getcart = $cart->getCart();
// $data = mysqli_num_rows($getcart);
// if($data < 0){
//     header('location:index.php');
// }

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
// if (!isset($_GET['id'])) {
//     echo "<meta http-equiv='refresh' content='0; url=?id=live'/>";
// }
if (isset($_GET['orderId']) && $_GET['orderId'] == 'order') {

    $orderId = $_SESSION['user']['id'];
    $order = $cart->orderproduct($orderId);
    $cart->log_user_delete();
    header("location:successpage.php");
}
?>
<div class="main">
    <div class="content">
        <style>
            h1 {
                font-size: 30px;
                text-align: center;
                color: DodgerBlue;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
                margin-bottom: 10px;
            }

            .profile-container {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                background: linear-gradient(135deg, #ffffff, #dff1ff);
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                max-width: 600px;
                margin: 0 auto;
            }

            .profile-image {
                flex: 0 0 120px;
                margin-right: 20px;
            }

            .profile-image img {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                object-fit: cover;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .profile-details {
                flex: 1;
            }

            .profile-details p {
                margin: 10px 0;
                line-height: 1.6;
                font-size: 16px;
            }

            .profile-details p span {
                font-weight: bold;
                color: #007bff;
            }

            .profile-details p {
                background: rgba(0, 123, 255, 0.1);
                padding: 10px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            /* order section   */
            /* Parent Div স্টাইল */
            .profile-actions {
                display: flex;
                /* Flexbox ব্যবহার করা হচ্ছে */
                justify-content: center;
                /* অনুভূমিকভাবে মাঝখানে আনা */
                align-items: center;
                /* উল্লম্বভাবে মাঝখানে আনা */
                height: 10vh;
                /* পুরো পেজের উচ্চতা */
                background-color: #f4f4f4;
                /* হালকা ব্যাকগ্রাউন্ড রং */
                margin: 0;
                /* কোনো মার্জিন নেই */
            }

            /* Button Design */
            .profile-actions a {
                text-decoration: none;
                /* আন্ডারলাইন বাদ */
                font-size: 20px;
                /* ফন্ট সাইজ বড় করা */
                font-weight: bold;
                /* ফন্টকে মোটা করা */
                color: white;
                /* টেক্সটের রং */
                background-color: #4CAF50;
                /* সবুজ ব্যাকগ্রাউন্ড রং */
                padding: 15px 30px;
                /* বাটনের ভিতরে স্পেস */
                border-radius: 25px;
                /* বাটনকে গোলাকার করা */
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                /* বাটনের ছায়া */
                transition: all 0.3s ease;
                /* অ্যানিমেশন ইফেক্ট */
            }

            /* Hover Effect */
            .profile-actions a:hover {
                background-color: rgb(44, 12, 224);
                /* হোভার করার সময় ব্যাকগ্রাউন্ড রং পরিবর্তন */
                transform: translateY(-3px);
                /* হালকা উপরে উঠানো */
                box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
                /* ছায়া গভীর করা */
            }
        </style>
        <script>
            function handleLogout() {
                if (confirm('Are you sure you want to logout?')) {
                    window.location.href = 'admin/user-logout.php';
                }
            }
        </script>
        <div class="main">
            <div class="content">
                <h1>Your Profile details</h1>
                <div class="profile-container">
                    <div class="profile-image">
                        <img src="images/user-img/<?php echo $_SESSION['user']['image']; ?>">

                    </div>
                    <div class="profile-details">
                        <p><span>Name: </span><?php echo $_SESSION['user']['name']; ?></p>
                        <p><span>Email: </span> <?php echo $_SESSION['user']['email']; ?></p>
                        <p><span>Address: </span> <?php echo $_SESSION['user']['address']; ?></p>
                        <p><span>Phone: </span> <?php echo $_SESSION['user']['phone']; ?></p>
                    </div>
                </div>
            </div>
        </div>
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

        </div>
        <div class="clear"></div>
    </div>
    <div class="profile-actions">
        <a href="?orderId=order">Order Now</a>
    </div>
</div>
</div>
<?php include('include/footer.php'); ?>