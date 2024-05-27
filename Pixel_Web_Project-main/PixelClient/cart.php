<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cart.css">
    <title>Pixel Shop</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['ID'])) {
    $_SESSION["warninglogin"] = '<text id="warn">You must log in before you can enter the page!</text>';
    header("location:login.php");
    exit();
}

require "../common/dbconnect.php";
require "navbar.php";

if (!array_key_exists('ID', $_SESSION) || empty($_SESSION['ID'])) {
    header("location:login.php");
    exit();
}

$totalvalue = 0;
$redirect = false;
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'deletebutton') === 0) {
            $prodcutId = str_replace('deletebutton', '', $key);
            $querydelete = "DELETE FROM carts WHERE product_id = $prodcutId AND user_id = " . $_SESSION['ID'];
            $resultdelete = pg_query($dbconn, $querydelete);
            $redirect = true;
        }
        if (strpos($key, 'increasebutton') === 0) {
            $prodcutId = str_replace('increasebutton', '', $key);
            $query = "SELECT stock, COUNT(cart_id) AS quantity FROM products p JOIN carts c ON p.productid = c.product_id WHERE p.productid = $prodcutId AND c.user_id = " . $_SESSION['ID'] . " GROUP BY p.productid";
            $result = pg_query($dbconn, $query);
            $row = pg_fetch_assoc($result);
            if ($row['quantity'] < $row['stock']) {
                $queryincrease = "INSERT INTO carts (user_id, product_id) VALUES ('" . $_SESSION['ID'] . "', '$prodcutId')";
                $resultincrease = pg_query($dbconn, $queryincrease);
                $redirect = true;
            } else {
                $messages[] = "The number of products to be purchased cannot be more than those in stock.";
            }
        }
        if (strpos($key, 'decreasebutton') === 0) {
            $prodcutId = str_replace('decreasebutton', '', $key);
            $querydecrease = "DELETE FROM carts WHERE cart_id = (SELECT cart_id FROM carts WHERE product_id = $prodcutId AND user_id = " . $_SESSION['ID'] . " LIMIT 1)";
            $resultdecrease = pg_query($dbconn, $querydecrease);
            $redirect = true;
        }
    }
   
    if ($redirect) {
        header("location:cart.php");
        exit();
    }
}

$query = 'SELECT p.productid, p.productname, p.price, p.description, p.stock, COUNT(c.cart_id) AS quantity FROM products p JOIN carts c ON p.productid = c.product_id WHERE c.user_id = ' . $_SESSION['ID'] . ' GROUP BY p.productid, p.productname;';
$result = pg_query($dbconn, $query);

echo '<section>
<div class="shop"></div>
<div class="cart">
    <h2>Shopping &nbsp; Cart</h2>';

while ($row = pg_fetch_assoc($result)) {
    $productName = $row['productname'];
    $productPrice = $row['price'];
    $quantity = $row['quantity'];
    $prodcutId = $row['productid'];
    $stock = $row['stock'];
    $totalvalue += ($productPrice * $quantity);

    echo '
    <form method="POST">
        <div class="cart-items">
            <div class="cart-item">
                <span class="cart-item-name">' . $productName . '</span>
                <span class="cart-item-price">' . $productPrice . '</span>
                <div class="quantity">
                    <button name="decreasebutton' . $prodcutId . '" class="decrease-quantity">-</button>
                    <span id="qvalue" class="quantity-value">' . $quantity . '</span>
                    <button name="increasebutton' . $prodcutId . '" class="increase-quantity">+</button>
                </div>
                <button name="deletebutton' . $prodcutId . '" type="submit" class="delete-item">Delete</button>
            </div>
        </div>
    </form>';
    if (isset($_POST["order"])) {
      if ($totalvalue > 0) {
          header("location:purchase.php");
          exit();
      } else {
          $messages[] = "Sepetiniz boş!";
      }
  }
}

if ($messages) {
    foreach ($messages as $message) {
        echo "<text id='warn'>$message</text>";
    }
}

echo '<div class="total-price">
    <span class="total-label">Total:</span>
    <span class="total-value">' . $totalvalue . ' TL</span>
</div>
<form method="POST">
    <button name="order" id="order" ' . ($totalvalue == 0 ? "disabled" : "") . ' class="order-button">Place Order</button>
</form>
</div>
</section>';
?>
</body>
</html>
