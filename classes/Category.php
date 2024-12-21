<?php
include_once __DIR__ . '/../config/config.php';

class Category extends connection
{
    //========================================ADD USER========================================
    public function add_category($data)
    {
        $category = ucwords($data['category']);
        $sql = "INSERT INTO `categories`(`category_name`) VALUES ('$category')";
        $result = $this->con->query($sql);


        if ($result) {
            echo "<script>localStorage.setItem('cat_insert', 'true'); window.location.href='../admin/category-list.php';</script>";
        }
    }

    //=======================================FETCH USER=======================================
    public function show_category()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->con->query($sql);
        return $result;
    }

    //========================================EDIT PRODUCT=======================================
    public function edit_category($id)
    {
        $sql = "SELECT * FROM categories WHERE category_id = '$id'";
        $result = $this->con->query($sql);
        return $result;
    }

    //========================================UPDATE PRODUCT=======================================
    public function update_category($data, $id) {
        $category = ucwords($data['category']);
        $sql = "UPDATE `categories` SET `category_name`='$category' WHERE category_id=$id";
        $result = $this->con->query($sql);
        
        if ($result) {
            echo "<script>localStorage.setItem('update_msg', 'true');  window.location.href='../admin/category-list.php';</script>";
        }

    }

    //=======================================DELETE USER=======================================
    public function deleteCategory($id)
    {
        $sql = "DELETE FROM `categories` WHERE category_id='$id'";
        $result = $this->con->query($sql);

        if ($result) {
            echo "<script>localStorage.setItem('delete_msg', 'true');  window.location.href='../admin/category-list.php';</script>";
        }
    }
}
