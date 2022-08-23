<!DOCTYPE html>
<html lang="en">
<?php
include "connection.php";
$username = $_SESSION['username'];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <div class="p-5 text-center bg-light">
        <h1 class="mb-3 fw-bold">Orders</h1>
        <h4 class="mb-3">All your Past and Current Orders</h4>
    </div>

    <button class="btn btn-primary" onclick="history.back()">Go Back</button>

    <div class="container-flex my-5">
        <div class="table-responsive">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Products</th>
                        <th>Delivery Address</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody><?php
                        $sql = "SELECT * FROM `orders` where username='$username'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                        ?>
                    <tr>
                        <td><?= $row['total_products'] ?></td>
                        <td><?= $row['city'] ?></td>
                        <td>
                            <p class="fw-normal mb-1"><?= $row['email'] ?></p>
                            <p class="text-muted mb-0"><?= $row['number'] ?></p>
                        </td>
                        <td><span
                                class="badge <?= $row['status'] == 0 ? 'badge-danger' : 'badge-success' ?> rounded-pill d-inline">
                                <?= $row['status'] == 0 ? 'Order Placed' : 'Order Accepted' ?>
                            </span>
                        </td>
                        <td><?= $row['method'] ?></td>
                        <td>Rs. <?= $row['total_price'] ?></td>
                        <td><?= $row['orderdate'] ?></td>
                        <td>
                            <button onclick="editorder(<?= $id ?>)" <?= $row['status'] == 0 ? '' : 'disabled' ?> type="
                                button" class="btn btn-link btn-sm btn-rounded">
                                Edit</button>
                            <button onclick="cancelOrder(<?= $id ?>)" <?= $row['status'] == 0 ? '' : 'disabled' ?>
                                type="button" class="btn btn-link btn-sm btn-rounded" data-mdb-toggle="modal"
                                data-mdb-target="#cancelPopup">
                                Cancel
                            </button>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo "No orders made";
                        } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js">
    </script>
    <script>
    function editorder(id) {
        window.location = `order_edit.php?id=${id}`;
    }

    function cancelOrder(id) {
        if (confirm(`Do you want to Cancel your Order?`) == true) {
            window.location = `cancel_order.php?id=${id}`;
        }
    }
    </script>
</body>

</html>