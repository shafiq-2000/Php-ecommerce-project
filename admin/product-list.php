<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}




include '../classes/Product.php';


$brand = new Product();


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;

$paginationData = $brand->getBrandsWithPagination($page, $limit);
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
                    <div class="row m-t-10">
                        <div class="col-md-12">

                            <div class="card text-center">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                
                                        <div class="col">
                                            <strong>List</strong> Product
                                        </div>
                                        <div class="col-auto">
                                            <a href="product-add.php" class="btn btn-success btn-sm">
                                                <i class="zmdi zmdi-plus"></i> Add Item
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body card-block">
                                    <!-- DATA TABLE-->

                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Prize</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $num_rows = mysqli_num_rows($data);
                                            if ($num_rows > 0) {


                                                $sl = ($page - 1) * $limit + 1;
                                                while ($row = $data->fetch_assoc()) { ?>

                                                    <tr>
                                                        <td><?php echo $sl++ ?></td>
                                                        <td><?php echo $row['p_name']; ?></td>
                                                        <td><?php echo $row['p_title']; ?></td>
                                                        <td><?php echo substr($row['p_description'], 0, 20) . '......'; ?></td>
                                                        <td><?php echo $row['prize']; ?></td>
                                                        <td><?php echo $row['category_name']; ?></td>
                                                        <td><?php echo $row['brandName']; ?></td>
                                                        <td> <img src="../images/product-img/<?php echo $row['image'] ?>" height="60px" width="60px" alt=""></td>
                                                        <td>
                                                            <button
                                                                class="toggle-type btn <?php echo ($row['type'] == 1) ? 'btn-info btn-sm' : 'btn-danger btn-sm'; ?>"
                                                                data-id="<?php echo $row['id']; ?>"
                                                                data-type="<?php echo $row['type']; ?>">
                                                                <?php echo ($row['type'] == 1) ? 'Active' : 'Inactive'; ?>
                                                            </button>
                                                        </td>


                                                        <td>
                                                            <a href="product-edit.php?id=<?php echo $row['id']; ?>"><i class="fa-solid fa-pen-to-square btn-lg"></i></a>
                                                            <a onclick="return confirm('Are you sure?')" href="product-delete.php?id=<?php echo $row['id']; ?>"> <i class="fa-solid fa-trash btn-lg"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                //others code finished
                                            } else { ?>
                                                <tr>
                                                    <td colspan="12" class="text-center">Record Not Found</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="m-3">

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

                                </div>
                                <!-- END DATA TABLE-->
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

    <script>
        $(document).ready(function() {
            $('.toggle-type').click(function() {
                var id = $(this).data('id'); // প্রোডাক্ট আইডি
                var currentType = $(this).data('type'); // বর্তমান টাইপ
                var newType = (currentType == 1) ? 0 : 1; // নতুন টাইপ নির্ধারণ

                $.ajax({
                    url: 'type-update.php', // AJAX রিকোয়েস্ট যাবে এখানে
                    type: 'POST',
                    data: {
                        id: id,
                        type: newType
                    }, // ডেটা পাঠাচ্ছি
                    success: function(response) {
                        if (response == 'success') {
                            //alert('Status updated successfully!');
                            location.reload(); // পেজ রিফ্রেশ
                        } else {
                            alert('Failed to update status.');
                        }
                    }
                });
            });
        });
    </script>