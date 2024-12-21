<?php include('include/header.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>
<style>
    .payment-box {
        width: auto;
        background: linear-gradient(145deg, #f8f9fa, #e0e0e0);
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }

    .payment-title {
        font-size: 22px;
        font-weight: bold;
        color: #4a4a4a;
        margin-bottom: 30px;
        letter-spacing: 1px;
        text-transform: uppercase;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .payment-table {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 15px;
    }

    .payment-method {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
        border: 1px solid #ddd;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .payment-method:hover {
        transform: scale(1.1);
        background-color: #c1e7fe;
        color: #007bff;
        box-shadow: 0 8px 25px rgba(0, 123, 255, 0.2);
    }

    .payment-method:nth-child(1) {
        background: linear-gradient(145deg, #ff9a8b, #ff6a88);
        color: white;
        box-shadow: 0 5px 10px rgba(255, 105, 135, 0.3);
    }

    .payment-method:nth-child(2) {
        background: linear-gradient(145deg, #6e7bff, #6a94ff);
        color: white;
        box-shadow: 0 5px 10px rgba(110, 123, 255, 0.3);
    }

    .payment-method:nth-child(3) {
        background: linear-gradient(145deg, #ffeb3b, #ffdd00);
        color: white;
        box-shadow: 0 5px 10px rgba(255, 225, 0, 0.3);
    }

    .payment-method a {
        text-decoration: none;
        color: white;
        font-weight: bold;
        display: inline-block;
        padding: 10px 20px;
        background: transparent;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        border: 2px solid white;
    }

    .payment-method a:hover {
        background-color: #ffffff;
        color: #333;
        border-color: #007bff;
    }

    .payment-method p {
        margin: 0;
    }
</style>

<div class="main">
    <div class="content">
        <div class="payment-box">
            <h2 class="payment-title">Payment Option</h2>
            <div class="payment-table">
                <div class="payment-method">
                    <a href="offline-payment.php">Offline Payment</a>
                </div>
                <div class="payment-method">
                    <a href="#">Online Payment</a>
                </div>
                <div class="payment-method">
                    <a href="#">PayPal</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php include('include/footer.php'); ?>