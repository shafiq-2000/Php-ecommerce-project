<?php
include 'includes/head.php';
//include '../config/connect.php';

include_once '../classes/Login.php';


if (isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

?>

<?php
$login = new Login();

if (isset($_POST['btn'])) {
    $error_message = $login->forgetPassword($_POST); 
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
                            <a href="#">
                            <h3 class="lead">Forget Password</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="femail" placeholder="Email">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="btn">submit</button>
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