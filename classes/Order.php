<?php
include_once __DIR__ . '/../config/config.php';

class Order extends connection
{

        //=======================================FETCH order product=======================================
        public function order_details($uid)
        {
            $sql = "SELECT * FROM tbl_order WHERE cmrId = '$uid'";
            $result = $this->con->query($sql);
            return $result;
        }
        public function orderConfirm($page, $limit)
        {
            // $sql = "SELECT * FROM tbl_order";
            // $result = $this->con->query($sql);
            // return $result;

            $offset = ($page - 1) * $limit;

            // ডেটা ফেচ কোয়েরি
            $query = "SELECT * FROM tbl_order ORDER BY id DESC LIMIT $limit OFFSET $offset";
            $result = $this->con->query($query);
    
            // Pagination এর জন্য মোট ডেটা বের করা
            $total_query = "SELECT COUNT(*) as total FROM tbl_order";
            $total_result = $this->con->query($total_query);
            $total_row = $total_result->fetch_assoc();
            $total_data = $total_row['total'];
            $total_pages = ceil($total_data / $limit);
    
            return [
                'data' => $result,
                'total_pages' => $total_pages,
            ];
        }
}
