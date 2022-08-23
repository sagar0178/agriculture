<?php
	$id=$_GET['id'];
	include('config.php');
	mysqli_query($conn,"delete from `customer` where id='$id'");
	header('location:costumerinfo.php');
?>