<?php
include_once __DIR__ . '/../config/config.php';

class Product extends connection
{
    //========================================ADD USER========================================
    public function add_product($data)
    {
        $p_name = $data['p_name'];
        $p_title = $data['p_title'];
        $description = $data['description'];
        $prize = $data['prize'];

        $productImage = time() . '-' . basename($_FILES['image']['name']);
        $tempProductImage = $_FILES['image']['tmp_name'];

        $cat_select = $data['cat_select'];
        $brand_select = $data['brand_select'];

        $sql = "INSERT INTO `products`(`p_name`, `p_title`, `p_description`, `prize`, `image`, `cat_Id`, `brand_Id`) VALUES ('$p_name','$p_title','$description','$prize','$productImage','$cat_select','$brand_select')";

        $result = $this->con->query($sql); //OOp style
        if ($result) {
            $upload = move_uploaded_file($tempProductImage, "../images/product-img/" . $productImage);
            if ($upload) {
                echo "<script>localStorage.setItem('data_insert', 'true'); window.location.href='../admin/product-list.php';</script>";
            } else {
                echo "<script>alert('image upload failed') </script>";
            }
        } else {
            echo "<script>alert('image upload failed2') </script>";
        }
    }

    //=======================================FETCH USER=======================================
    // public function show_product()
    // {

    //     // $sql = "SELECT * FROM products";
    //     // $result = $this->con->query($sql);
    //     // return $result;

    // $sql = "SELECT 
    //         products.*,
    //         brands.brandName,
    //         categories.category_name
    //     FROM 
    //         products
    //     INNER JOIN brands ON products.brand_Id = brands.brandId
    //     INNER JOIN categories ON products.cat_Id = categories.category_id
    //     ORDER BY products.id DESC";

    //     $result = $this->con->query($sql);
    //     return $result;
    // }


    public function getBrandsWithPagination($page, $limit)
    {
        $offset = ($page - 1) * $limit;

        // ডেটা ফেচ কোয়েরি
        $query =  "SELECT 
        products.*,
        brands.brandName,
        categories.category_name
        FROM 
            products
        INNER JOIN brands ON products.brand_Id = brands.brandId
        INNER JOIN categories ON products.cat_Id = categories.category_id
        ORDER BY products.id DESC LIMIT $limit OFFSET $offset";
        $result = $this->con->query($query);

        // Pagination এর জন্য মোট ডেটা বের করা
        $total_query = "SELECT COUNT(*) as total FROM products";
        $total_result = $this->con->query($total_query);
        $total_row = $total_result->fetch_assoc();
        $total_data = $total_row['total'];
        $total_pages = ceil($total_data / $limit);

        return [
            'data' => $result,
            'total_pages' => $total_pages,
        ];
    }

    //========================================EDIT PRODUCT=======================================
    public function edit_product($id)
    {
        $sql = "SELECT * FROM products WHERE id = '$id'";
        $result = $this->con->query($sql);
        return $result;
    }

    //========================================UPDATE PRODUCT=======================================
    // এখানে পুরোনো ইমেজ তখনই ডিলিট হবে  যখন নতুন ইমেজ আপলোড করা হবে ।
    // যদি ইউজার নতুন ইমেজ আপলোড না করে, তবে পুরোনো ইমেজ সিস্টেমে ঠিক থাকবে এবং ডাটাবেসে সেটিই সেভ থাকবে।
    // আপডেট এর সময় ইমেজ না দিলেও সমস্যা হবে না। এবং সেম ইমেজ দিলেও সমস্যা নাই।

    public function update_product($data, $id)
    {

        $p_name = $data['p_name'];
        $p_title = $data['p_title'];
        $description = $data['description'];
        $prize = $data['prize'];

        $productImage = time() . '-' . basename($_FILES['image']['name']);
        $tempProductImage = $_FILES['image']['tmp_name'];

        $cat_select = $data['cat_select'];
        $brand_select = $data['brand_select'];

        //retrieve the old image name from the database
        $query = "SELECT image FROM products WHERE id = '$id'";
        $result = $this->con->query($query);
        $row = $result->fetch_assoc();
        $old_image = $row['image']; //get the old image name from the database


        //check if a image is uploaded
        if (!empty($_FILES['image']['name'])) {

            //upload the new image
            $upload = move_uploaded_file($tempProductImage, "../images/product-img/" . $productImage);
            if ($upload) {
                //delete the old image
                if (file_exists("../images/product-img/" . $old_image) && $old_image !== $productImage) {
                    unlink("../images/product-img/" . $old_image);
                }
                //use the new image for the database update
                $image = $productImage;
            } else {
                echo "<script>alert('Image upload failed');</script>";
                return;
            }
        } else {
            //no new image uploaded, use the old image
            $image = $old_image;
        }

        $update = "UPDATE `products` SET `p_name`='$p_name',`p_title`='$p_title',`p_description`='$description',`prize`='$prize',`image`='$image',`cat_Id`='$cat_select',`brand_Id`='$brand_select' WHERE id='$id'";
        $result = $this->con->query($update);


        if ($result) {
            echo "<script>localStorage.setItem('update_msg', 'true');  window.location.href='../admin/product-list.php';</script>";
        } else {
            echo "<script>alert('Update failed');</script>";
        }
    }

    //=======================================DELETE USER=======================================
    public function deleteProduct($id)
    {
        try {
            $query = "SELECT * FROM `products` WHERE id=$id ";
            $data = $this->con->query($query);
            $row = mysqli_fetch_assoc($data);

            $image = $row['image'];

            if (file_exists("../images/product-img/" . $image)) {
                unlink("../images/product-img/" . $image);
            }


            $sql = "DELETE FROM `products` WHERE id='$id'";
            $result = $this->con->query($sql);

            if ($result) {
                echo "<script>localStorage.setItem('delete_msg', 'true');  window.location.href='../admin/product-list.php';</script>";
            }
        } catch (Throwable $th) {
            echo "<script>alert('Delete failed');</script>";
        }
    }

    //===================foreign key get=======its use product add page=====================
    public function get_categories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->con->query($sql);
        return $result;
    }
    public function get_brands()
    {
        $sql = "SELECT * FROM brands";
        $result = $this->con->query($sql);
        return $result;
    }

    //===============================front-end view===============

    public function get_feature_product()
    {

        $sql = "SELECT * FROM products WHERE type='0' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result;
    }

    public function get_new_product()
    {

        $sql = "SELECT * FROM products WHERE type='1' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result;
    }

    //===========================slider imgae method
    public function slider_image()
    {

        $sql = "SELECT * FROM products WHERE type='1' ORDER BY id DESC LIMIT 3";
        $result = $this->con->query($sql);
        return $result;
    }

    //===============================product details page====================


    public function product_details($id)
    {


        $id = mysqli_real_escape_string($this->con, $id);

        $query = "SELECT 
                products.*,
                brands.brandName,
                categories.category_name
            FROM 
                products
            INNER JOIN brands ON products.brand_Id = brands.brandId
            INNER JOIN categories ON products.cat_Id = categories.category_id
            WHERE products.id = '$id'
            ORDER BY products.id DESC";

        $result = $this->con->query($query);

        return $result;
    }


    // ====================== latest brand show in page===================
    public function getiphone() {
        $sql = "SELECT * FROM products WHERE brand_Id='1' ORDER BY id DESC LIMIT 1";
        $result = $this->con->query($sql);
        return $result;    
    }
    public function getsamsung() {
        $sql = "SELECT * FROM products WHERE brand_Id='2' ORDER BY id DESC LIMIT 1";
        $result = $this->con->query($sql);
        return $result;    
    }
    public function getwalton() {
        $sql = "SELECT * FROM products WHERE brand_Id='3' ORDER BY id DESC LIMIT 1";
        $result = $this->con->query($sql);
        return $result;    
    }
    public function getsinger() {
        $sql = "SELECT * FROM products WHERE brand_Id='4' ORDER BY id DESC LIMIT 1";
        $result = $this->con->query($sql);
        return $result;    
    }
     // ====================== Top brands section===================

     public function top_brand_iphone(){
        $sql = "SELECT * FROM products WHERE brand_Id='1' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result; 
     }
     public function top_brand_samsung(){
        $sql = "SELECT * FROM products WHERE brand_Id='2' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result; 
     }
     public function top_brand_walton(){
        $sql = "SELECT * FROM products WHERE brand_Id='3' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result; 
     }
     public function top_brand_singer(){
        $sql = "SELECT * FROM products WHERE brand_Id='4' ORDER BY id DESC LIMIT 4";
        $result = $this->con->query($sql);
        return $result; 
     }

     // ====================== Top brands section===================

     public function get_cat_product($id){

        $idp = mysqli_real_escape_string($this->con, $id);

        $sql = "SELECT * FROM products WHERE cat_Id='$idp' ORDER BY id DESC";
        $result = $this->con->query($sql);
        return $result;
     }
}
