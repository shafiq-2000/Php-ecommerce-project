<?php
require_once '../config/config.php';

class Brand extends connection
{




    // private $con;

    // public function __construct() {
    //     $this->con = new mysqli("localhost", "root", "", "e_commerce_site");
    //     if ($this->con->connect_error) {
    //         die("Connection failed: " . $this->con->connect_error);
    //     }
    // }
 
    public function getBrandsWithPagination($page, $limit)
    {
        $offset = ($page - 1) * $limit;

        // ডেটা ফেচ কোয়েরি
        $query = "SELECT * FROM brands ORDER BY brandId DESC LIMIT $limit OFFSET $offset";
        $result = $this->con->query($query);

        // Pagination এর জন্য মোট ডেটা বের করা
        $total_query = "SELECT COUNT(*) as total FROM brands";
        $total_result = $this->con->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_data = $total_row['total'];
        $total_pages = ceil($total_data / $limit);

        return [
            'data' => $result,
            'total_pages' => $total_pages,
        ];
    }



    //========================================ADD USER========================================
    public function add_brand($data)
    {
        $brand = ucwords($data['brand']);
        $sql = "INSERT INTO `brands`(`brandName`) VALUES ('$brand')";
        $result = $this->con->query($sql);


        if ($result) {
            echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='../admin/brand-list.php';</script>";
        }
    }

    //=======================================FETCH USER=======================================
    public function show_brand()
    {
        $sql = "SELECT * FROM brands";
        $result = $this->con->query($sql);
        return $result;
    }

    //========================================EDIT BRANDS======================================
    public function edit_brand($id)
    {
        $sql = "SELECT * FROM brands WHERE brandId = '$id'";
        $result = $this->con->query($sql);
        return $result;
    }

    //========================================UPDATE BRANDS======================================
    public function update_brand($data, $id)
    {
        $brand = ucwords($data['brand']);
        $sql = "UPDATE `brands` SET `brandName`='$brand' WHERE brandId=$id";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('update_msg', 'true');  window.location.href='../admin/brand-list.php';</script>";
        }
    }

    //=======================================DELETE BRANDS=======================================
    public function deleteBrand($id)
    {
        $sql = "DELETE FROM `brands` WHERE brandId='$id'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('delete_msg', 'true');  window.location.href='../admin/brand-list.php';</script>";
        }
    }
}
