<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kvitering for ditt kjøp</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }

        .total-price {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .buy-more-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
            width: 10%;
            text-align: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
<?php
session_start();

if (isset($_POST['totalPrice']) && $_POST['totalPrice'] > 0) {
    $totalPrice = $_POST['totalPrice'];

    /* if (!empty($_SESSION['cart'])) {
        $server = "localhost";
        $user = "root";
        $pw = "Admin";
        $db = "bare_vifter";

        $conn = new mysqli($server, $user, $pw, $db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $customerID = $_SESSION['user_id'];
        $totalAmount = $totalPrice;
        $insertOrderQuery = "INSERT INTO orders (CustomerID, TotalAmount) VALUES (?, ?)";
        $stmt = $conn->prepare($insertOrderQuery);
        $stmt->bind_param("ii", $customerID, $totalAmount);
        $stmt->execute();

        $orderID = $conn->insert_id;

        foreach ($_SESSION['cart'] as $productName => $quantity) {
            $productName = $conn->real_escape_string($productName);
            $productIDQuery = "SELECT ProductID FROM products WHERE Name = ?";
            $stmt = $conn->prepare($productIDQuery);
            $stmt->bind_param("s", $productName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $productID = $row['ProductID'];
            } else {
                continue;
            }

            $subtotal = $products[$productName]['price'] * $quantity;

            $insertOrderItemQuery = "INSERT INTO orderitems (OrderID, ProductID, Quantity, Subtotal) 
                                     VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($insertOrderItemQuery);
            $stmt->bind_param("iiid", $orderID, $productID, $quantity, $subtotal);
            $stmt->execute();
        }

        $stmt->close();
        $conn->close();
    }
    */
    echo '<h1>Kvittering for ditt kjøp</h1>';
    echo '<h2>Takk for at du handlet hos oss!</h2>';
    echo '<table>
        <tr>
            <th>Produkt</th>
            <th>Antall</th>
        </tr>';

    foreach ($_SESSION['cart'] as $productName => $quantity) {
        echo '<tr>';
        echo '<td>' . $productName . '</td>';
        echo '<td>' . $quantity . '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '<p class="total-price">Totalt pris: ' . $totalPrice . 'kr</p>';

    unset($_SESSION['cart']);

    echo '<a href="produkter.php" class="buy-more-btn">Kjøp mer vifter</a>';
} else {
    header("Location: index.php");
    exit;
}
?>
</body>

</html>