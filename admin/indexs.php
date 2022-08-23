<?php

include('config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Basic MySQLi Commands</title>
    <style>
    body {
        font-family: poppins;
    }

    * {
        box-sizing: border-box;
    }

    .wrapper h2 {
        color: #000;

    }

    .wrapper {
        width: 37%;
        padding: 20px;
        border-radius: 100px;
        background-color: darkgray;
        position: absolute;
        top: 33%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #000;
    }

    .wrapper label {
        padding: 20px;
    }

    input[type=text] {
        width: 60%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type=email] {
        width: 60%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type=password] {
        width: 60%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .btn {
        background-color: #04AA6D;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 40%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Add CustomerDetails </h1>
        <form method="POST" action="add.php">
            <label>User Id:</label><input type="text" name="username"><br>
            <label>Name:</label><input type="text" name="name"><br>
            <label>Address:</label><input type="text" name="address"><br>
            <label>Phone:</label><input type="text" name="phoneno"><br>
            <label>Email:</label><input type="email" name="email"><br>
            <label>Password:</label><input type="password" name="password"><br>
            <input type="submit" class="btn" name="add">
            <a href="welcome.php">Back</a><br>
        </form>
    </div>
</body>

</html>