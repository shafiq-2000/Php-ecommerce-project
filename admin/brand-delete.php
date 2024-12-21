<?php 
include '../classes/Brand.php';
$cat = new Brand();
$id = $_GET['id'];
if(isset($_GET['id'])){
    $cat->deleteBrand($id);
}


?>