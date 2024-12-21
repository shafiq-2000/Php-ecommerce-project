<?php 
include '../classes/Category.php';
$cat = new Category();
$id = $_GET['id'];
if(isset($_GET['id'])){
    $cat->deleteCategory($id);
}


?>