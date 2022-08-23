<?php
include "connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM orders where id=$id and status=0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <div class="p-5 text-center bg-dark text-light">
        <h1 class="mb-3 fw-bold">Order Edit</h1>
    </div>


    <div class="container my-4">
        <button class="btn btn-primary" onclick="history.back()">
            < Go Back</button>

                <div class="row mt-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="form-outline mb-4">
                                <input value="<?= $row['total_products'] ?>" type="text" class="form-control"
                                    disabled />
                                <label class="form-label">Products</label>
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
                                <input type="text" value="<?= $row['city'] ?>" id="useraddress" name="useraddress"
                                    class="form-control" />
                                <label class="form-label" for="useraddress">Address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="tel" value="<?= $row['number'] ?>" id="usercontact" name="usercontact"
                                    class="form-control" />
                                <label class="form-label" for="usercontact">Phone No</label>
                            </div>

                            <div class="mb-4">
                                <select class="form-select" name="method">
                                    <option <?php if ($row['method'] == "cash on delivery") {
                                                echo "selected";
                                            } ?> value="cash on delivery" selected>cash on devlivery</option>
                                    <option <?php if ($row['method'] == "credit cart") {
                                                echo "selected";
                                            } ?> value="credit cart">credit cart</option>
                                    <option <?php if ($row['method'] == "esewa") {
                                                echo "selected";
                                            } ?> value="esewa">Esewa</option>
                                </select>
                            </div>

                            <input type="submit" value="Edit" name="order_edit" class="btn btn-warning">
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['order_edit'])) {
    $userfullname = $_POST['userfullname'];
    $usermail = $_POST['usermail'];
    $useraddress = $_POST['useraddress'];
    $usercontact = $_POST['usercontact'];
    $paymethod = $_POST['method'];
    $sql = "UPDATE orders SET name='$userfullname',city='$useraddress',number='$usercontact',email='$usermail',method='$paymethod' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("location:order_edit.php?id=$id");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>