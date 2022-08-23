<?php include('server.php')
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <div class="header">
        <h2>Customer Registeration</h2>
    </div>

    <form method="post" action="register.php">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label>User Id</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="input-group">
            <label>Full Name</label>
            <input type="text" name="name">
        </div>

        <div class="input-group">
            <label>Address</label>
            <input type="text" name="address">
        </div>

        <div class="input-group">
            <label>Phone Number</label>
            <input type="text" name="phoneno">
        </div>

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="cpassword">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>

</html>