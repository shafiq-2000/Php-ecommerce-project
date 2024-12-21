<?php
include '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';
define('BASE_URL', 'http://localhost/E_commerce_site/');

class Login extends connection
{
    public function userRegister($data)
    {
        try {
            //========= Input Validation =========//
            if (empty($data['name']) || empty($data['email']) || empty($data['phone']) || empty($data['address'])) {
                throw new Exception("All fields are required.");
            }
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }
            if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
                throw new Exception("Image upload failed.");
            }
            if (empty($data['password']) || empty($data['cpassword']) || $data['password'] !== $data['cpassword']) {
                throw new Exception("Password does not match or is empty.");
            }

            //========= Image Validation =========//
            $img_name = time() . '-' . basename($_FILES['image']['name']);
            $tmp_name = $_FILES['image']['tmp_name'];
            //file extension check//
            $file_info = pathinfo($img_name);
            $file_ext = strtolower($file_info['extension']);
            $valid_ext = ['png', 'jpg', 'jpeg', 'jfif'];

            if (!in_array($file_ext, $valid_ext)) {
                throw new Exception("Invalid file type. Allowed: jpg, png, jpeg, jfif.");
            }
            //===//
            if ($_FILES['image']['size'] > 10485760) {
                throw new Exception("File size exceeds 10MB.");
            }

            //========= Prepare Data =========//
            $name = ucwords($data['name']);
            $email = $data['email'];
            $phone = $data['phone'];
            $address = ucwords($data['address']);
            // $password = password_hash($data['password'], PASSWORD_BCRYPT);
            $password = $data['password'];
            $token = time();
            $status = 0;

            //========= Insert Data Safely =========//
            $stmt = $this->con->prepare("INSERT INTO `user_tbl` (`name`, `email`, `password`, `phone`, `address`, `image`, `token`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssii", $name, $email, $password, $phone, $address, $img_name, $token, $status);

            if ($stmt->execute()) {
                if (move_uploaded_file($tmp_name, "../images/user-img/" . $img_name)) {
                    //echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='../admin/user-login.php';</script>";
                    echo "<script>alert('Check your email for verified!! ')</script>";
                } else {
                    throw new Exception("Image upload failed.");
                }
            } else {
                throw new Exception("Database insert failed.");
            }


            //email setup
            $mail = new PHPMailer(true);

            try {

                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.mailtrap.io'; //Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = '84193dfc990e5e'; //sent email
                $mail->Password = '3a8456715629c7'; //password this email(app password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 2525;

                //Recipients
                $mail->setFrom('abc@gmail.com', 'Shafiq'); //sent email
                $mail->addAddress($_POST['email']); // Receiver email

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Registration Verification email';
                $mail->Body = 'Please click on this link to verify your registration:<br> <a href="' . BASE_URL . 'registration-verify.php?token=' . $token . '">Click here</a>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }


    public function userLogin($data)
    {
        try {

            if ($data['email'] == '') {
                throw new Exception("Email can not be empty");
            }
            // if(empty($data['email'])){
            //     throw new Exception("Email can not be empty"); 
            // }
            if ($data['password'] == '') {
                throw new Exception("Password can not be empty");
            }
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email is invalid");
            }



            // $query = $this->con->prepare("SELECT * FROM user_tbl WHERE email=? AND status=?");
            // $query->execute([$data['email'], 1]);
            // $user = $query->fetch(PDO::FETCH_ASSOC);

            // if (!$user) {
            //     throw new Exception("Email is not found");
            // }

            $stmt = $this->con->prepare("SELECT * FROM user_tbl WHERE email = ? AND status = ?");
            $stmt->bind_param("si", $data['email'], $status);
            $status = 1;

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                throw new Exception("Email is not found");
            }

            // Fetch associative array
            $user = $result->fetch_assoc();
            $email = $user['email'];
            $status = $user['status'];


            // does not work
            // if (!password_verify($data['password'], $user['password'])) {
            //     throw new Exception("Password does not match");
            // }


            if ($data['password'] == $user['password']) {
                $_SESSION['user'] = $user;
                echo "<script>localStorage.setItem('login', 'true'); window.location.href='../index.php';</script>";
            } else {
                throw new Exception("Password does not match");
            }

            //echo "<script>alert('Login successfull')</script>";


        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function forgetPassword($data)
    {

        try {
            if (empty($data['femail'])) {
                throw new Exception("Input filled can not empty");
            }

            if (!filter_var($data['femail'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Email is invalid");
            }

            $stmt = $this->con->prepare("SELECT * FROM user_tbl WHERE email = ? AND status = ?");
            $stmt->bind_param("si", $data['femail'], $status);
            $status = 1;

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                throw new Exception("Email is not found");
            }

            $token = time();


            $stmt = $this->con->prepare("UPDATE user_tbl SET token=? WHERE email=?");
            $stmt->bind_param("is", $token, $_POST['femail']);
            $stmt->execute();


            //email setup

            $mail = new PHPMailer(true);

            try {

                $mail->isSMTP(); //Send using SMTP
                $mail->Host = 'smtp.mailtrap.io'; //Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = '84193dfc990e5e'; //sent email
                $mail->Password = '3a8456715629c7'; //password this email(app password)
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 2525;

                //Recipients
                $mail->setFrom('abc@gmail.com', 'Shafiq'); //sent email
                $mail->addAddress($data['femail']); // Receiver email

                //Content
                $mail->isHTML(true); //Set email format to HTML
                $mail->Subject = 'Reset Password Verify';
                $mail->Body = 'Please click on this link to Reset your Password:<br> <a href="' . BASE_URL . 'admin/resetPassword-verify.php?token=' . $token . '">Reset here</a>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

          //  echo "<script>alert('Please check your email and click reset button')</script>";
          echo "<script>localStorage.setItem('p_reset_mail', 'true'); window.location.href='../admin/user-login.php';</script>";
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function resetPassword($data)
    {
        try {
            if ($data['password'] == '' || $data['cpassword'] == '') {
                throw new Exception("Password can not be empty");
            }
            if ($data['password'] != $data['cpassword']) {
                throw new Exception("Password not match");
            }


            $stmt = $this->con->prepare("UPDATE user_tbl SET password=? WHERE token=?");
            $stmt->bind_param("si", $data['password'], $_REQUEST['token']);
            $stmt->execute();

            // if ($stmt->execute()) {
            //     echo "<script>alert('Registration successful')</script>";
            // } else {
            //     echo "<script>alert('Registration failed')</script>";
            // }
            // header("location:user-login.php");
            echo "<script>localStorage.setItem('reset_pass', 'true'); window.location.href='../admin/user-login.php';</script>";
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }
}
