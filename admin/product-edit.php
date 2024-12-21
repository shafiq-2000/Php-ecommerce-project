<?php
include 'includes/head.php';
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}


include '../classes/Product.php';
$p = new Product();
$id = $_GET['id'];


if(isset($_GET['id'])){
    $data = $p->edit_product($id);
    $row = mysqli_fetch_assoc($data);

}

if(isset($_POST['save1'])){
    $p->update_product($_POST, $id);
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
        <div class="card">
            <div class="card-header">
                <strong>Product</strong> Add
            </div>
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Static</label>
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Product Info</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Product Name</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="p_name" placeholder="Enter product" class="form-control" value="<?php echo $row['p_name'] ?>">
                    <small class="form-text text-muted">Please enter your product</small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email-input" class=" form-control-label">Product Title</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="email-input" name="p_title" placeholder="Enter Title" class="form-control" value="<?php echo $row['p_title'] ?>">
                    <small class="help-block form-text">Please enter your title</small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="description" id="textarea-input" rows="9" placeholder="Please enter a product Description..." class="form-control"><?php echo $row['p_description'] ?></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Prize</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="password-input" name="prize" value="<?php echo $row['prize'] ?>" class="form-control">
                    <small class="help-block form-text">Please enter a product Prize</small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Product Image</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" id="password-input" name="image" class="form-control">
                    <small class="help-block form-text">Please product image</small>
                </div>
            </div>


            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Category Select</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="cat_select" id="select" class="form-control">
                        <option>Please select category</option>
                        <?php
                        $categories = $p->get_categories();
                        foreach ($categories as $category) {
                            echo '<option value="' . $category['category_id'] . '">' . $category['category_name'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Brand Select</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="brand_select" id="select" class="form-control">
                        <option>Please select Brand</option>
                        <?php
                        $brands = $p->get_brands();
                        foreach ($brands as $brand) {
                            echo '<option value="' . $brand['brandId'] . '">' . $brand['brandName'] . '</option>';
                        }

                        ?>

                    </select>
                </div>
            </div>
            
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm" name="save1">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
        </div>
    </form>
        </div>
    </div>
</div>
        </div>
    </div>
    <?php
    include 'includes/footer.php';
    ?>

