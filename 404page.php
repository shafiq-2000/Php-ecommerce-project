<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    body,
    html {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to bottom right, #007bff, #6c757d);
        color: #fff;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .main {
        text-align: center;
        background: rgba(255, 255, 255, 0.1);
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        max-width: 500px;
        width: 90%;
    }

    .error-template h1 {
        font-size: 120px;
        color: #f8d7da;
        margin: 0;
        animation: pulse 1s infinite alternate;
    }

    .error-template h2 {
        font-size: 28px;
        color: #fff;
        margin: 15px 0 20px;
    }

    .error-details {
        font-size: 18px;
        color: #ddd;
        margin-bottom: 30px;
    }

    .error-actions a {
        display: inline-block;
        margin: 10px;
        padding: 12px 25px;
        font-size: 16px;
        text-decoration: none;
        border-radius: 30px;
        transition: all 0.3s ease;
        border: 2px solid #fff;
    }

    .btn-primary {
        background: #007bff;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .btn-default {
        background: #6c757d;
        color: #fff;
        border: none;
    }

    .btn-default:hover {
        background: #5a6268;
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        100% {
            transform: scale(1.1);
            opacity: 0.8;
        }
    }

    .error-actions a .glyphicon {
        margin-right: 8px;
        font-size: 18px;
        vertical-align: middle;
    }
</style>

<div class="main">
    <div class="error-template">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <div class="error-details">
            The page you are looking for might have been removed or is temporarily unavailable.
        </div>
        <div class="error-actions">
            <a href="index.php" class="btn btn-primary">
                <span class="glyphicon glyphicon-home"></span> Take Me Home
            </a>
            <a href="contact.php" class="btn btn-default">
                <span class="glyphicon glyphicon-envelope"></span> Contact Support
            </a>
        </div>
    </div>
</div>