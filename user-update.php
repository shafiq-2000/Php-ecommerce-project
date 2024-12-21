<?php include('include/header.php'); ?>
<?php 
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
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
            margin: 0 auto;
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
        }

        .profile-details p span {
            font-weight: bold;
            color: #007bff;
        }

        .profile-details p {
            background: rgba(0, 123, 255, 0.1);
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .profile-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .profile-actions .edit-button,
        .profile-actions .logout-button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .profile-actions .edit-button {
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
        }

        .profile-actions .logout-button {
            background-color: #f44336;
            color: #fff;
            text-decoration: none;
        }

        .profile-actions .edit-button:hover {
            background-color: #45a049;
        }

        .profile-actions .logout-button:hover {
            background-color: #d32f2f;
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
            <img src="images/user-img/<?php echo $_SESSION['user']['image']; ?>" >
          
        </div>
        <div class="profile-details">
            <p><span>Name:  </span><?php echo $_SESSION['user']['name']; ?></p>
            <p><span>Email:  </span> <?php echo $_SESSION['user']['email']; ?></p>
            <p><span>Address:  </span> <?php echo $_SESSION['user']['address']; ?></p>
            <p><span>Phone:  </span> <?php echo $_SESSION['user']['phone']; ?></p>
            <div class="profile-actions">
                <a href="#" class="edit-button">Edit</a>
                <button class="logout-button" onclick="handleLogout()">Logout</button>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<?php include('include/footer.php'); ?>