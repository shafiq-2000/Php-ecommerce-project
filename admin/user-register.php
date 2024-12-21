<?php
include 'includes/head.php';

include_once '../classes/Login.php';


if (isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
?>
<?php
$login = new Login();

if (isset($_POST['submit'])) {
    $error_message = $login->userRegister($_POST); // মেথড কল এবং মেসেজ গ্রহণ।
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
                            <a href="user-register.php">
                            <h3 class="lead">Customer Register</h3>
                            </a>
                        </div>
                        <div class="login-form">
                        <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="name" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="number" name="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="au-input au-input--full" type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Confirm Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">register</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="user-login.php">Sign In</a>
                                </p>
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