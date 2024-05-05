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
    require "dbconnect.php";
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
        <form action="home.html" method="post">
            <label for="cart-no">Credit Card Number:</label>
            <input type="text" id="cart-no" name="cart-no" placeholder="1234 5678 9101 1121" required><br><br>
            <label for="username">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="addres">Address:</label>
            <textarea id="addres" name="addres" required></textarea><br><br>
            <input type="submit" value="Order">
        </form>
    </div>
</body>
</html>
