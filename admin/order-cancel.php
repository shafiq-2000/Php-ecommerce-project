<?php 
include '../config/connect.php';
?>
<?php
$id = $_GET['order_id'];

// ডেটা আপডেট করার জন্য প্রস্তুত কোয়েরি
$statement = $pdo->prepare("UPDATE tbl_order SET status = ? WHERE id = ?");
$statement->execute([0, $id]);

header('location:index.php');
?>
