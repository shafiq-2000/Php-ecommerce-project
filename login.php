<?php
include_once 'admin/includes/head.php';
?>

<?php

// if (isset($_POST['btn'])) {
//     try {
//         if (empty($_POST['email'])) {
//             throw new Exception("Email can not be empty");
//         }
//         if (empty($_POST['password'])) {
//             throw new Exception("Password can not be empty");
//         }

//         $query = $pdo->prepare("SELECT * FROM tbl_admin WHERE adminEmail=?");
//         $query->execute([$_POST['email']]);
//         $total = $query->rowcount();


//         if (!$total) {
//             throw new Exception("Email is not found");
//         } else {
//             $users = $query->fetchALL(PDO::FETCH_ASSOC);

//             foreach ($users as $data) {
//                 if (!($_POST['password'] == $data['adminPass'])) {
//                     throw new Exception("Password does not match!");
//                 };

//                 //hash does not work
//                 // if (!password_verify($_POST['password'], $data['adminPass'])) {
//                 //     throw new Exception("Password does not match!");
//                 // }
//             }
//         }

//         echo "<script>alert('Login Successfull') </script>";

//         $_SESSION['admin'] = $data;
//         header("Location: index.php");
//     } catch (Throwable $th) {
//         $error_message = $th->getMessage();
//     }
// }
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
                                <!-- <img src="assets/images/icon/logo.png" alt="CoolAdmin"> -->
                                <h3 class="lead">Admin Login</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">sign in</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once 'admin/includes/footer.php';
    ?>