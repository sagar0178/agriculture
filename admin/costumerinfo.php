<?php
	include('config.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Table with database</title>
    <style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    h1 {
        text-align: center;
        color: #006600;
        font-size: xx-large;
        font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
    }

    td,
    th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>
    <table>
        <h1> Customer Information </h1>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Home</th>

        </tr>
        <?php
$conn = mysqli_connect("localhost", "root", "", "agriculture");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, username, name, address, phoneno, email FROM customer";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
$count=1;
$sel_query="Select * from customer;";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td text-align="center"><?php echo $row["id"]; ?></td>
            <td text-align="center"><?php echo $row["username"]; ?></td>
            <td text-align="center"><?php echo $row["name"]; ?></td>
            <td text-align="center"><?php echo $row["address"]; ?></td>
            <td text-align="center"><?php echo $row["phoneno"]; ?></td>
            <td text-align="center"><?php echo $row["email"]; ?></td>
            <td text-align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
            <td text-aling="center"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
            <td text-aling="center"><a href="welcome.php?id=<?php echo $row['id']; ?>">Back</a>
            </td>
        </tr>
        <?php $count++; }

echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
    </table>
</body>

</html>