<?php include('include/header.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<style>
    /* Success Header Container */
    .success-header {
        margin: 50px auto;
        text-align: center;
        background: linear-gradient(to bottom, #4CAF50, #45a049); /* Green gradient background */
        color: #ffffff; /* White text */
        padding: 30px 40px;
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Soft shadow */
        max-width: 400px; /* Box width */
        width: 100%;
    }

    /* Success Icon Design */
    .success-header::before {
        content: '\2713'; /* Checkmark symbol */
        display: inline-block;
        font-size: 50px;
        color: #4CAF50; /* Green color for checkmark */
        background: #ffffff; /* White background */
        border-radius: 50%; /* Circular shape */
        width: 80px;
        height: 80px;
        line-height: 80px;
        margin: -60px auto 20px auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Slight shadow */
    }

    /* Title (h2) Styling */
    .success-header h2 {
        font-size: 28px;
        margin: 10px 0 5px 0;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    /* Paragraph (p) Styling */
    .success-header p {
        font-size: 18px;
        margin: 0 0 20px 0;
        color: #f0f8f0;
    }

    /* Redirect Link Styling */
    .redirect-link a {
        display: inline-block;
        font-size: 18px;
        color: #ffffff;
        text-decoration: none;
        background: #007bff;
        padding: 12px 25px;
        border-radius: 25px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .redirect-link a:hover {
        background: #0056b3;
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
    }
</style>

<div class="main">
    <div class="content">
        <div class="success-header">
            <h2>Success!</h2>
            <p>Payment succesfull</p>
            <div class="redirect-link">
                <a href="cart.php">Go to the Home Page</a>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('include/footer.php'); ?>
