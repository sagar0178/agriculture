<?php
session_start();
if (!isset($_SESSION['adminusername'])) {
  header("location:adminlogin.php");
}

$conn = mysqli_connect("localhost", "root", "", "agriculture");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}