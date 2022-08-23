<header class="header">

    <div class="flex">

        <a href="#" class="logo">Farmer's Mart</a>

        <nav class="navbar">
            <a href="my-profile.php">Hello, <?= $_SESSION['username'] ?></a>
            <a href="products.php">View products</a>
            <a href="all-orders.php">View Orders</a>
            <a href="logout.php">logout</a>

        </nav>


        <?php
        $username = $_SESSION['username'];

        $select_rows = mysqli_query($conn, "SELECT * FROM `cart` where username='$username'") or die('query failed');
        $row_count = mysqli_num_rows($select_rows);

        ?>

        <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

        <div id="menu-btn" class="fas fa-bars"></div>



    </div>



</header>