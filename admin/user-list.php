<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}





include '../classes/User.php';
$user = new User();
$data = $user->show_user();
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
                        <div class="col-md-10 offset-md-1">

                            <div class="card text-center">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <strong>List</strong> User
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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
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
                                                            <td><?php echo $row['name']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                            <td><?php echo $row['phone']; ?></td>
                                                            <td><?php echo $row['address']; ?></td>
                                                            <td>
                                                                <img src="../images/user-img/<?php echo $row['image'] ?>"
                                                                    style="height: 60px; width: 60px; border-radius: 50%; object-fit: cover;"
                                                                    alt="User Image">
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