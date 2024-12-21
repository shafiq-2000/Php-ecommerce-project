<?php
include 'includes/head.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}

include '../classes/Brand.php';
$cat = new Brand();
if (isset($_POST['btn1'])) {
    $cat->add_brand($_POST);
}



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
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Brands</strong> Add
                                </div>
                                <div class="card-body card-block">
                                    <form action="" method="post" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-6">
                                                <label for="hf-email" class=" form-control-label">Brands Add</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="hf-email" name="brand" placeholder="Enter Brand..." class="form-control">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-sm" name="btn1">Add</button>
                                    </form>
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