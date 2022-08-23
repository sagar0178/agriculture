<?php

include 'connection.php';
$username = $_SESSION['username'];
if (isset($_POST['order_btn'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $city = $_POST['city'];
    $country = "Nepal";
    $orderdate = $_POST['orderdate'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` where username='$username'");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = ($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };

    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `orders`(name, number, email, method, city, country, orderdate, total_products, total_price, username) VALUES('$name','$number','$email','$method','$city','$country', '$orderdate','$total_product','$price_total','$username')") or die('query failed');

    if ($cart_query && $detail_query) {
        echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>" . $total_product . "</span>
            <span class='total'> total : RS " . $price_total . "/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>" . $name . "</span> </p>
            <p> your number : <span>" . $number . "</span> </p>
            <p> your email : <span>" . $email . "</span> </p>
            <p> your address : <span>" . $city . ", " . $country . "</span> </p>
            <p> your payment mode : <span>" . $method . "</span> </p>
            <p> Enter Date : <span>" . $orderdate . "</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
        $cartquery = "DELETE FROM `cart` WHERE username='$username'";
        $conn->query($cartquery);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container">

        <section class="checkout-form">

            <h1 class="heading">complete your order</h1>

            <form action="" method="post">

                <div class="display-order">
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` where username='$username'");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                    ?>
                    <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <span class="grand-total"> grand total : RS <?= $grand_total; ?>/- </span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>your name</span>
                        <input type="text" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>your phone number</span>
                        <input type="tel" placeholder="Enter your Phone number" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span>your email</span>
                        <input type="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>payment method</span>
                        <select name="method">
                            <option value="cash on delivery" selected>cash on devlivery</option>
                            <option value="credit cart">credit cart</option>
                            <option value="esewa">Esewa</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Delivery Address</span>
                        <input type="text" placeholder="e.g Kathmandu-11, Maitighar" name="city" required>
                    </div>

                    <div class="inputBox">
                        <span>country</span>
                        <input type="text" disabled value="Nepal" name="country" required>
                    </div>
                    <div class="inputBox">
                        <span>your order date</span>
                        <input type="date" name="orderdate" required>
                    </div>
                </div>
                <input type="submit" value="order now" name="order_btn" class="btn">
            </form>

        </section>

    </div>

    <!-- custom js file link  -->
    <script src="../js/script.js"></script>

</body>

</html>