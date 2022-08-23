<?php

	// Connect to database
	$conn=mysqli_connect("localhost","root","","agriculture");

	// Check if id is set or not if true toggle,
	// else simply go back to the page
	if (isset($_GET['id'])){

		// Store the value from get to a
		// local variable "course_id"
		$id=$_GET['id'];

		// SQL query that sets the status
		// to 1 to indicate activation.
		$sql="UPDATE `orders` SET
			`status`=1 WHERE id='$id'";

		// Execute the query
		mysqli_query($conn,$sql);
	}

	// Go back to course-page.php
	header('location:orderinfo.php');
?>