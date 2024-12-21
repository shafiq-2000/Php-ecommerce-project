<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}
?>


<?php
include '../classes/Brand.php';

$brand = new Brand();
//pagination for code
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;

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
                        <div class="col-md-8 offset-md-2">

                            <div class="card text-center">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <strong>List</strong> Brand
                                        </div>
                                        <div class="col-auto">
                                            <a href="brand-add.php" class="btn btn-success btn-sm">
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
                                                    <th>Id</th>
                                                    <th>Brand name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if ($data->num_rows > 0) {
                                                    $sl = ($page - 1) * $limit + 1;
                                                    while ($row = $data->fetch_assoc()) { ?>
                                                        <tr>
                                                            <td><?php echo $sl++; ?></td>
                                                            <td><?php echo $row['brandId']; ?></td>
                                                            <td><?php echo $row['brandName']; ?></td>
                                                            <td>
                                                                <a href="brand-edit.php?id=<?php echo $row['brandId']; ?>"><i class="fa-solid fa-pen-to-square btn-lg"></i></a>
                                                                <a onclick="return confirm('Are you sure?')" href="brand-delete.php?id=<?php echo $row['brandId']; ?>"><i class="fa-solid fa-trash btn-lg"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Records Found</td>
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
    <?php
    include 'includes/footer.php';
    ?>