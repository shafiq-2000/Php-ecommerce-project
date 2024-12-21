<?php
include 'includes/head.php';

if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}

include '../classes/Setting.php';
$st = new Setting();
if (isset($_POST['update'])) {
    $st->update_setting($_POST);
}

$data = $st->get_setting();


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
                            <div class="col-lg-6">
                                <form action="" method="post">

                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Company</strong>
                                            <small> Info</small>
                                        </div>
                                        <div class="card-body card-block">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Company</label>
                                                <input type="text" id="company" name="name" value="<?php echo $data['c_name']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="vat" class=" form-control-label">Address</label>
                                                <input type="text" id="vat" name="address" value="<?php echo $data['address']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Number</label>
                                                <input type="number" id="street" name="number" value="<?php echo $data['number']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Additionala Number</label>
                                                <input type="number" id="street" name="numberop" value="<?php echo $data['A_number']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Fax</label>
                                                <input type="text" id="street" name="fax" value="<?php echo $data['fax']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="street" class=" form-control-label">Email</label>
                                                <input type="email" id="street" name="email" value="<?php echo $data['email']; ?>" class="form-control">
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="city" class=" form-control-label">City</label>
                                                        <input type="text" id="city" name="city" value="<?php echo $data['city']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="postal-code" class=" form-control-label">Postal Code</label>
                                                        <input type="number" name="postalcode" id="postal-code" value="<?php echo $data['postal_code']; ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class=" form-control-label">Country</label>
                                                <input type="text" id="country" name="country" value="<?php echo $data['country']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class=" form-control-label">Facebook link</label>
                                                <input type="text" id="country" name="fb" value="<?php echo $data['facebook']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class=" form-control-label">Instragram link</label>
                                                <input type="text" id="country" name="instra" value="<?php echo $data['instragram']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class=" form-control-label">Google link</label>
                                                <input type="text" id="country" name="google" value="<?php echo $data['google']; ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class=" form-control-label">Tweter link</label>
                                                <input type="text" id="country" name="twitter" value="<?php echo $data['twitter']; ?>" class="form-control">
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-sm" name="update">
                                                <i class="fa fa-dot-circle-o"></i> Update
                                            </button>
                                        </div>
                                    </div>

                                </form>
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