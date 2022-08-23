<?php include('loginserver.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>
    <div class="header">
        <h2>Register Admin</h2>
    </div>

    <form method="post" action="registration.php">
        <?php include('error.php'); ?>

        <div class="input-group">
            <label>User Id</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
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
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            <a href="welcome.php">Go Back</a>
        </p>
    </form>
</body>

</html>