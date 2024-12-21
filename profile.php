<?php
include('include/header.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<?php
include('classes/Order.php');
$userId = $_SESSION['user']['id'];
$order = new Order();
$orders = $order->order_details($userId);

?>



<style>
    h1 {
        font-size: 30px;
        text-align: center;
        color: DodgerBlue;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-bottom: 30px;
    }

    .profile-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background: linear-gradient(135deg, #ffffff, #dff1ff);
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        margin: 0 auto 30px;
    }

    .profile-image {
        flex: 0 0 120px;
        margin-right: 20px;
    }

    .profile-image img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .profile-details {
        flex: 1;
    }

    .profile-details p {
        margin: 10px 0;
        line-height: 1.6;
        font-size: 16px;
        background: rgba(0, 123, 255, 0.1);
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-details p span {
        font-weight: bold;
        color: #007bff;
    }

    .profile-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .profile-actions a,
    .profile-actions button {
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        color: #fff;
        text-decoration: none;
    }

    .profile-actions .edit-button {
        background-color: #4caf50;
    }

    .profile-actions .logout-button {
        background-color: #f44336;
    }

    .profile-actions .edit-button:hover {
        background-color: #45a049;
    }

    .profile-actions .logout-button:hover {
        background-color: #d32f2f;
    }

    /* Data Table */
    .data-table {
        width: 70%;
        margin: 0 auto 50px;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
        font-size: 14px;
    }

    .data-table th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        font-weight: bold;
    }

    .data-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .data-table tr:hover {
        background-color: #f1f1f1;
    }

    .data-table img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 5px;
    }
</style>

<script>
    function handleLogout() {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = 'admin/user-logout.php';
        }
    }
</script>

<div class="main">
    <div class="content">
        <h1>Customer Profile</h1>
        <div class="profile-container">
            <div class="profile-image">
                <img src="images/user-img/<?php echo $_SESSION['user']['image']; ?>">
            </div>
            <div class="profile-details">
                <p><span>Name: </span><?php echo $_SESSION['user']['name']; ?></p>
                <p><span>Email: </span> <?php echo $_SESSION['user']['email']; ?></p>
                <p><span>Address: </span> <?php echo $_SESSION['user']['address']; ?></p>
                <p><span>Phone: </span> <?php echo $_SESSION['user']['phone']; ?></p>
                <div class="profile-actions">
                    <a href="#" class="edit-button">Edit</a>
                    <button class="logout-button" onclick="handleLogout()">Logout</button>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <h1>Purchase History</h1>
        <table class="data-table">
            <thead>
                <tr>
                    <th>#SL</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total P</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $num_rows = mysqli_num_rows($orders);
                if ($num_rows > 0) {


                    $sl = 1;
                    while ($row = mysqli_fetch_assoc($orders)) { ?>

                        <tr>
                            <td><?php echo $sl++ ?></td>
                            <td><?php echo $row['productName']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['prize']; ?></td>
                            <td><?php echo $row['total_prize']; ?></td>
                            <td> <img src="images/product-img/<?php echo $row['image'] ?>" alt=""></td>
                            <td><?php echo $row['date']; ?></td>

                            <td>
                                <?php
                                if ($row['status'] == 0) {
                                    echo '<span style="background-color: red; color: white; padding: 5px 10px; border-radius: 5px;">Pending</span>';
                                } else {
                                    echo '<span style="background-color: green; color: white; padding: 5px 10px; border-radius: 5px;">Delivered</span>';
                                }
                                ?>
                            </td>

                        </tr>
                    <?php
                    }
                    //others code finished
                } else { ?>
                    <tr>
                        <td colspan="12" class="text-center">No Purchase History Found</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('include/footer.php'); ?>