<?php
	include('config.php');
 
	$username=$_POST['username'];
	$name=$_POST['name'];
    $address=$_POST['address'];
	$phoneno=$_POST['phoneno'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password = md5($password);//encrypt the password before saving in the database

	mysqli_query($conn,"insert into `customer` (username,name,address,phoneno,email,password) values ('$username','$name','$address','$phoneno','$email','$password')");
	header('location:costumerinfo.php');
 
?>