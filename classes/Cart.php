<?php
include_once __DIR__ . '/../config/config.php';

class Cart extends connection
{
    //========================================ADD USER========================================
    public function addCard($data, $id)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        try {

            $sql = "SELECT * FROM products WHERE id='$id'";
            $result = $this->con->query($sql);
            $row = mysqli_fetch_assoc($result);

            $s_id = session_id();
            $productId = $row['id'];
            $p_name = $row['p_name'];
            $qnty = $data['quantity'];;
            $prize = $row['prize'];
            $total_prize = $prize * $qnty;
            $image = $row['image'];
            $check_query = "SELECT * FROM tbl_cart WHERE s_id='$s_id' AND product_id='$productId'";
            $check_result = $this->con->query($check_query);

            if ($check_result && $check_result->num_rows > 0) {
                echo "<script>localStorage.setItem('check_result', 'true');</script>";
            } else {

                $query = "INSERT INTO `tbl_cart`(`s_id`, `product_id`, `p_name`, `quantity`, `prize`,`total_prize`,`image`) VALUES ('$s_id','$productId','$p_name','$qnty','$prize','$total_prize','$image')";
                $result2 = $this->con->query($query);

                if ($result2) {
                    echo "<script>localStorage.setItem('cat_insert', 'true'); window.location.href='cart.php';</script>";
                }
            }
        } catch (Throwable $th) {
            echo "Error Message: " . $th->getMessage() . "<br>";
            // echo "Error Trace: " . $th->getTraceAsString();
        }
    }

    public function update_cart($data)
    {
        $id = $data['cart_id'];
        $pqnty = $data['p_qnty'];
        $prize = $data['prize'];
        $total_prize = $prize * $pqnty;

        $sql = "UPDATE `tbl_cart` SET `quantity`='$pqnty', `total_prize`='$total_prize' WHERE cart_id='$id'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('cart_update', 'true');  window.location.href='cart.php';</script>";
        }
    }

    public function getCart()
    {
        $sId = session_id();
        $sql = "SELECT * FROM tbl_cart WHERE s_id='$sId'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function deleteCart($id)
    {
        $sql = "DELETE FROM `tbl_cart` WHERE cart_id='$id'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('cart_delete', 'true');  window.location.href='cart.php';</script>";
        }
    }

    //when the user log out the cart will be deleted//
    public function log_user_delete()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $s_id = session_id();
        $sql = "DELETE FROM `tbl_cart` WHERE s_id='$s_id'";
        $result = $this->con->query($sql);
        return $result;
    }

    public function orderproduct($cmrId)
    {
        $sId = session_id();
        $sql = "SELECT * FROM tbl_cart WHERE s_id='$sId'";
        $result = $this->con->query($sql);
        if ($result) {
            while ($data = $result->fetch_assoc()) {
                $productId = $data['product_id'];
                $productName = $data['p_name'];
                $productQnty = $data['quantity'];
                $productPrize = $data['prize'];
                $total_prize = $productPrize * $productQnty;
                $image = $data['image'];

                $query = "INSERT INTO `tbl_order`(`cmrId`, `productId`, `productName`, `quantity`, `prize`, `total_prize`, `image`) VALUES ('$cmrId','$productId','$productName','$productQnty','$productPrize','$total_prize','$image')";

                $result2 = $this->con->query($query);
                if ($result2) {
                    echo "<script>localStorage.setItem('cat_insert', 'true'); window.location.href='cart.php';</script>";
                }
            }
        }
    }
}
