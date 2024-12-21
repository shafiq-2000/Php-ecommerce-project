<?php
// ডাটাবেস কানেকশন
$conn = mysqli_connect("localhost", "root", "", "e_commerce_site");

// POST থেকে ডেটা সংগ্রহ
$id = $_POST['id'];
$type = $_POST['type'];

// SQL কুয়েরি
$sql = "UPDATE products SET type = $type WHERE id = $id";
$result = mysqli_query($conn, $sql);

// রেসপন্স পাঠানো
if ($result) {
    echo 'success';
} else {
    echo 'error';
}
?>
