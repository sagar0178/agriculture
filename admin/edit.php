<?php
include('config.php');
$id = $_GET['id'];
$query = mysqli_query($conn, "select * from `customer` where id='$id'");
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Basic MySQLi Commands</title>
    <style>
    .wrapper h2 {
        color: #000;
        border: 5px solid white;

    }

    .wrapper {
        width: 37%;
        padding: 20px;
        border-radius: 100px;
        background-color: darkgray;
        position: absolute;
        top: 50%;
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
        <h2>Edit Customers Details</h2>
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <label>User Id:</label><input type="text" value="<?php echo $row['username']; ?>" name="username"><br>
            <label>Name:</label><input type="text" value="<?php echo $row['name']; ?>" name="name"><br>
            <label>Address:</label><input type="text" value="<?php echo $row['address']; ?>" name="address"><br>
            <label>Phone:</label><input type="text" value="<?php echo $row['phoneno']; ?>" name="phoneno"><br>
            <label>Email:</label><input type="email" value="<?php echo $row['email']; ?>" name="email"><br>
            <input type="submit" class="btn" name="submit"><br>
            <a href="costumerinfo.php"><button>Back</button></a><br>
        </form>
    </div>
</body>

</html>