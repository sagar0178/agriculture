<?php include('loginserver.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>
    <div class="header">
        <h2> Admin Login</h2>
    </div>

    <form method="post" action="adminlogin.php">
        <?php include('error.php'); ?>

        <div class="input-group">
            <label>User Id</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
        </div>
    </form>
</body>

</html>