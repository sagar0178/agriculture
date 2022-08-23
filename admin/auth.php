<?php
include 'config.php';
if(!isset($_SESSION["adminusername"])){
header("Location:adminlogin.php");
exit(); }