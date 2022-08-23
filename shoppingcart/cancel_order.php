<?php
include "connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM orders WHERE id=$id and status=0";

if ($conn->query($sql) === TRUE) {
    header('location:all-orders.php');
} else {
    echo '<div class="alert alert-warning" role="alert">
  A simple warning alert—check it out!
</div>';
}