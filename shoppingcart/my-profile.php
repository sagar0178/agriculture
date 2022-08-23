<?php
include "connection.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM customer where username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$userpass = $row['password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <div class="p-5 text-center bg-dark text-light">
        <h1 class="mb-3 fw-bold">My Profile</h1>
    </div>


    <div class="container my-4">
        <button class="btn btn-primary" onclick="history.back()">
            < Go Back</button>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <h4 class="fw-bold">User Info</h4>
                        <form action="my-profile.php" method="post">
                            <div class="form-outline mb-4">
                                <input value="<?= $row['username'] ?>" type="text" class="form-control" disabled />
                                <label class="form-label">User ID</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" value="<?= $row['name'] ?>" id="userfullname" name="userfullname"
                                    class="form-control" />
                                <label class="form-label" for="userfullname">Full Name</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" value="<?= $row['email'] ?>" id="usermail" name="usermail"
                                    class="form-control" />
                                <label class="form-label" for="usermail">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" value="<?= $row['address'] ?>" id="useraddress" name="useraddress"
                                    class="form-control" />
                                <label class="form-label" for="useraddress">Address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="tel" value="<?= $row['phoneno'] ?>" id="usercontact" name="usercontact"
                                    class="form-control" />
                                <label class="form-label" for="usercontact">Phone No</label>
                            </div>

                            <input type="submit" value="Save" name="user_info_up" class="btn btn-warning">
                        </form>
                    </div>
                    <div class="col-md-5">
                        <h4 class="fw-bold">Change Password</h4>
                        <form action="" method="post">
                            <div class="form-outline mb-4">
                                <input type="password" id="useroldpass" name="useroldpass" class="form-control" />
                                <label class="form-label" for="useroldpass">Old Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="usernewpass" name="usernewpass" class="form-control" />
                                <label class="form-label" for="usernewpass">New Password</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="usernewpassr" name="usernewpassr" class="form-control" />
                                <label class="form-label" for="usernewpassr">Repeat New Password</label>
                            </div>
                            <input type="submit" value="Save" name="user_pass_up" class="btn btn-danger">
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['user_info_up'])) {
    $userfullname = $_POST['userfullname'];
    $usermail = $_POST['usermail'];
    $useraddress = $_POST['useraddress'];
    $usercontact = $_POST['usercontact'];
    $sql = "UPDATE customer SET name='$userfullname',address='$useraddress',phoneno='$usercontact',email='$usermail' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        // header('location:products.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if (isset($_POST['user_pass_up'])) {
    $useroldpass = $_POST['useroldpass'];
    $usernewpass = $_POST['usernewpass'];
    $usernewpassr = $_POST['usernewpassr'];
    if ($userpass === md5($useroldpass)) {
        if ($usernewpass === $usernewpassr) {
            $usernewpass = md5($_POST['usernewpass']);
            $sql = "UPDATE customer SET password='$usernewpass' WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Repeated Password do not match";
        }
    } else {
        echo "Wrong Old Password";
    }
}

?>