<?php
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard </title>
    <link rel="stylesheet" href="design.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name"> Adminpannel</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin_page.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Add Product</span>
                </a>
            </li>

            <li>
                <a href="costumerinfo.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Customers Info</span>
                </a>
            </li>

            <li>
                <a href="orderinfo.php">
                    <i class='bx bx-basket'></i>
                    <span class="links_name">Order Info</span>
                </a>
            </li>

            <li>
                <a href="indexs.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Insert New Customer</span>
                </a>
            </li>
            <li>
                <a href="registration.php">
                    <i class='bx bx-add-to-queue'></i>
                    <span class="links_name">Add Admin</span>
                </a>
            </li>
            <li class="log_out">
                <a href="adminlogout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">

        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <img src="../images/admin" alt="">
                <span class="admin_name">Admin</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>
        <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        </script>

</body>

</html>