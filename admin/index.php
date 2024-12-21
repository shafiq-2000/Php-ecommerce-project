<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}
?>
<?php
include '../classes/Order.php';
$user = new Order();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;
//$data = $user->orderConfirm();
$paginationData = $user->orderConfirm($page, $limit);
$data = $paginationData['data'];
$total_pages = $paginationData['total_pages'];
?>

<body class="animsition">
    <div class="page-wrapper">
        <?php
        include 'includes/headerMobile.php';
        include 'includes/sidebar.php';
        ?>
        <div class="page-container">
            <?php
            include 'includes/header.php';
            ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-10">
                            <div class="col-md-10 offset-md-1">

                                <div class="card text-center">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <strong>Order</strong> Confirm
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="btn btn-success btn-sm">
                                                    <i class="zmdi zmdi-plus"></i> Add Item
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body card-block">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Prize</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $num_rows = mysqli_num_rows($data);
                                                    if ($num_rows > 0) {


                                                        $sl =  $sl = ($page - 1) * $limit + 1;;
                                                        while ($row = mysqli_fetch_assoc($data)) { ?>

                                                            <tr>
                                                                <td><?php echo $sl++ ?></td>
                                                                <td><?php echo $row['productName']; ?></td>
                                                                <td><?php echo $row['quantity']; ?></td>
                                                                <td><?php echo $row['prize']; ?></td>
                                                                <td>
                                                                    <img src="../images/product-img/<?php echo $row['image'] ?>"
                                                                        style="height: 60px; width: 60px; border-radius: 50%; object-fit: cover;"
                                                                        alt="User Image">
                                                                </td>
                                                                <style>
                                                                    .status {
                                                                        display: inline-block;
                                                                        padding: 5px 10px;
                                                                        border-radius: 15px;
                                                                        color: #fff;
                                                                        text-decoration: none;
                                                                        font-weight: bold;
                                                                        font-size: 14px;
                                                                        text-align: center;
                                                                    }

                                                                    .status.pending {
                                                                        background-color: rgb(255, 0, 13);
                                                                        /* Orange for Pending */
                                                                    }

                                                                    .status.delivered {
                                                                        background-color: rgb(54, 184, 58);
                                                                        /* Green for Delivered */
                                                                    }

                                                                    .status:hover {
                                                                        opacity: 5.8;
                                                                    }
                                                                </style>
                                                                <td>
                                                                    <?php
                                                                    if ($row['status'] == 0) {
                                                                        echo '<a href="order-confirm.php?order_id=' . $row['id'] . '&status=1" 
                    onclick="return confirm(\'Are you sure you want to mark as Delivered?\')"
                    class="status pending">Pending</a>';
                                                                    } else {
                                                                        echo '<a href="order-cancel.php?order_id=' . $row['id'] . '&status=0" 
                    onclick="return confirm(\'Are you sure you want to mark as Pending?\')"
                    class="status delivered">Delivered</a>';
                                                                    }
                                                                    ?>
                                                                </td>


                                                                <td>
                                                                    <?php
                                                                    if ($row['status'] == 0) {
                                                                        echo '<span style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px;">No</span>';
                                                                    } else {
                                                                        echo '<span style="background-color: green; color: white; padding: 5px 10px; border-radius: 5px;">Yes</span>';
                                                                    }
                                                                    ?>
                                                                </td>


                                                            <?php
                                                        }
                                                        //others code finished
                                                    } else { ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">Record Not Found</td>
                                                            </tr>
                                                        <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=1" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <?php
                                                for ($i = 1; $i <= $total_pages; $i++) {
                                                    $active = ($i == $page) ? 'active' : '';
                                                    echo '<li class="page-item ' . $active . '">
            <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
            </li>';
                                                }
                                                ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $total_pages; ?>" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- END DATA TABLE-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'includes/footer.php';
    ?>