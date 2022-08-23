<?php
	include('config.php');
	$id=$_GET['id'];
	
	$username=$_POST['username'];
	$name=$_POST['name'];
    $address=$_POST['address'];
	$phoneno=$_POST['phoneno'];
	$email=$_POST['email'];

	mysqli_query($conn,"update `customer` set username='$username', name='$name', address='$address', phoneno='$phoneno', email='$email' where id='$id'");
	header('location:costumerinfo.php');