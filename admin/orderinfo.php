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

    .btn {
        background-color: red;
        border: none;
        color: white;
        padding: 5px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
    }

    .green {
        background-color: #199319;
    }

    .red {
        background-color: red;
    }
    </style>
</head>

<body>
    <table>
        <h1> Customer Order Information </h1>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>User Id</th>
            <th>Payment Method</th>
            <th>City</th>
            <th>Country</th>
            <th>Order Date</th>
            <th>Total Products[kg] </th>
            <th>Total price[Rs]</th>
            <th>Status</th>
            <th>Home</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "agriculture");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT id, name, number, email, username, method, city, country, orderdate, total_products, total_price,status FROM orders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $count = 1;
            $sel_query = "Select * from orders;";
            $result = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td text-align="center"><?php echo $row["id"]; ?></td>
            <td text-align="center"><?php echo $row["name"]; ?></td>
            <td text-align="center"><?php echo $row["number"]; ?></td>
            <td text-align="center"><?php echo $row["email"]; ?></td>
            <td text-align="center"><?php echo $row["username"]; ?></td>
            <td text-align="center"><?php echo $row["method"]; ?></td>
            <td text-align="center"><?php echo $row["city"]; ?></td>
            <td text-align="center"><?php echo $row["country"]; ?></td>
            <td text-align="center"><?php echo $row["orderdate"]; ?></td>
            <td text-align="center"><?php echo $row["total_products"]; ?></td>
            <td text-align="center"><?php echo $row["total_price"]; ?></td>


            <td text-align="center">
                <?php
                        if ($row['status'] == 1) {
                            echo '<p><a
                href="deactive.php?id=' . $row['id'] . '&status=0" class="btn green">orderaccepted</a></p>';
                        } else {
                            echo '<p><a
                href="active.php?id=' . $row['id'] . '&status=1" class="btn red">orderplaced</a></p>';
                        }
                        ?>
            </td>
            <td text-aling="center"><a href=" welcome.php?id=<?php echo $row['id']; ?>">
                    <div class="btn green">
                        Back
                </a>
            </td>
            </div>


        </tr>


        <?php $count++;
            }

            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>