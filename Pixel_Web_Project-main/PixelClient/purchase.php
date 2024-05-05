<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="purchase.css"/>
    
    <title>Login</title>
</head>
<body>
  <?php

  session_start();
  if(!isset($_SESSION['ID'])){
    $_SESSION["warninglogin"] = '<text id="warn">Purchase sayfasına girmek için önce giriş yapmalısınız!</text>';
    header("location:login.php");
  }
  require "../common/dbconnect.php";
  if(isset($_POST['buy']))
  {
    $description = "";
    $address = $_POST["address"];
    $name = $_POST["name"];
    $query = 'SELECT p.productid, p.productname, p.price,p.description,p.stock , COUNT(c.cart_id) AS quantity
    FROM products p 
    JOIN carts c ON p.productid = c.product_id 
    WHERE c.user_id =' . $_SESSION['ID'] . ' GROUP BY p.productid, p.productname;';
    $result = pg_query($dbconn,$query);
    while ($row = pg_fetch_assoc($result)) {

        $queryorder = "insert into orders (description,adress,userid,name,productid,totalamount,status) values" . "('" .$description . "','" . $address . "','" 
        . $_SESSION['ID'] . "','" . $name . "','" . $row['productid'] . "','" .  $row['quantity'] . "', 'Preparing')";
        pg_query($dbconn , $queryorder);
        $querydelete = "delete from carts where user_id=" . $_SESSION["ID"];
        pg_query($dbconn , $querydelete);
      }
      header("location:account.php");
  }
 
  ?>



    <nav class="container">
        <div class="logo">
            <a href="main.php"><h1>Pixel Shop</h1></a>  
        </div>
         <div class="list">  
            <ul>
                <li><a href="main.php"><i class="fa-solid fa-house"></i> Home</a></li>
                <li><a href="login.php"><i class="fa-solid fa-user"></i> Account</a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Shopping &nbsp; Cart</a></li>     
            </ul>
        </div> 
    </nav>

    <div class="account">
        <h2>Payment Information</h2>
        <form method="post">
            <label for="cart-no">Credit Card Number:</label>
            <input type="text" id="cart-no" name="cart-no" placeholder="1234 5678 9101 1121" required><br><br>
            <label for="username">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="addres">Address:</label>
            <input type="text" id="address" name="address" required></input><br><br>
            <input type="submit" id="buy" name="buy" value="Order">
        </form>
    </div>
</body>
</html>
