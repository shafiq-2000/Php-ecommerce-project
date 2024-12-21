<?php
include '../config/config.php';

class User extends connection
{
    // //========================================ADD USER========================================
    // public function add_category($data)
    // {
    //     $category = ucwords($data['category']);
    //     $sql = "INSERT INTO `categories`(`category_name`) VALUES ('$category')";
    //     $result = $this->con->query($sql);


    //     if ($result) {
    //         echo "<script>localStorage.setItem('cat_insert', 'true'); window.location.href='../admin/category-list.php';</script>";
    //     }
    // }

    //=======================================FETCH USER=======================================
    public function show_user()
    {
        $sql = "SELECT * FROM user_tbl";
        $result = $this->con->query($sql);
        return $result;
    }


}
