<?php
include 'includes/head.php';
include '../config/connect.php';

include_once '../classes/Login.php';


$statement = $pdo->prepare("SELECT * FROM user_tbl WHERE token=?");
$statement->execute([$_REQUEST['token']]);
$total = $statement->rowCount();

if (!$total) {
    header("location:../index.php");
    exit();
}

?>
<?php
$login = new Login();

if (isset($_POST['btn'])) {
    $error_message = $login->resetPassword($_POST);
}
?>



<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <!-- display message -->
                        <?php
                        if (isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <div class="login-logo">
                            <a href="user-login.php">
                                <!-- <img src="assets/images/icon/logo.png" alt="CoolAdmin"> -->
                                <h3 class="lead">Reset Password</h3>
                                <p class="text-muted">Enter your registered email ID to reset the password</p>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Enter new password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Enter new Confirm password">
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">sign in</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'includes/footer.php';
    ?>