<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}



include '../classes/Category.php';
$cat = new Category();
$data = $cat->show_category();
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
                                            <strong>List</strong> Category
                                        </div>
                                        <div class="col-auto">
                                            <a href="category-add.php" class="btn btn-success btn-sm">
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
                                                    <th>Category name</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php

                                                $num_rows = mysqli_num_rows($data);
                                                if ($num_rows > 0) {


                                                    $sl = 1;
                                                    while ($row = mysqli_fetch_assoc($data)) { ?>

                                                        <tr>
                                                            <td><?php echo $sl++ ?></td>
                                                            <td><?php echo $row['category_name']; ?></td>
                                                            <td><?php echo $row['date']; ?></td>

                                                            <td>
                                                                <a href="category-edit.php?id=<?php echo $row['category_id']; ?>"><i class="fa-solid fa-pen-to-square btn-lg"></i></a>
                                                                <a onclick="return confirm('Are you sure?')" href="category-delete.php?id=<?php echo $row['category_id']; ?>"> <i class="fa-solid fa-trash btn-lg"></i></a>
                                                            </td>
                                                        </tr>
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