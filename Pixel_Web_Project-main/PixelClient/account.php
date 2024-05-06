<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="account.css"/>
    
    <title>Login</title>
</head>
<body>
 <?php
 session_start();
 if(!isset($_SESSION['ID'])){
  $_SESSION["warninglogin"] = '<text id="warn">Account sayfasına girmek için önce giriş yapmalısınız!</text>';
  header("location:login.php");
  require "../common/dbconnect.php";
}
require "navbar.php";
 require "../common/tarihformatla.php";

$istenilen_tarih = $_SESSION['CDAT'];
$formatli_tarih = tarihFormatla($istenilen_tarih);
if(isset ($_POST['logout'])){
  unset($_SESSION['ID']);
  header("location:main.php");
}
 ?>

    <div class="account">
        <div class="header">
            <h1>Welcome, <?php   echo $_SESSION['NAME']; ?>!</h1>
            <p style="font-size: 24px;">Your account information:</p>
            <p><strong>Name:</strong>  &nbsp <?php   echo $_SESSION['NAME']; ?></p>
            <p><strong>Email:</strong>  &nbsp <?php   echo $_SESSION['EMAIL']; ?></p>
            <p><strong>Account Create Date:</strong>  &nbsp <?php   echo $formatli_tarih; ?></p>
        </div>
        <div class="actions">
          <form method="POST">
            <button type="submit" name="logout" id="logout" class="Sbtn Sbtn-danger">Logout</button>
            </form>
        </div>
    </div>
    <?php  require "../common/dbconnect.php";
    $query = "select * from orders o join products p on o.productid=p.productid where o.userid=" . $_SESSION['ID'];
    $result = pg_query($dbconn, $query);
    echo '<div class="order-history">
    <h1>Order History</h1>';
    
    while ($row = pg_fetch_assoc($result)) {

        echo ' 
        <div class="order">
            <div class="order-item">
                <div class="order-details">
                    <img src="../images/product' . $row['productid'] .  '.jpg" alt="Product Image">
                    <p>' .$row['productname'] .  '</p>
                    <p> $' . $row['price'].  '</p>
                    <p>' . (int)$row['totalamount']. ' adet' .   '</p>
                    <p>' . tarihFormatla($row['orderdate']) .'</p>
                    <p><span class="status ' . strtolower($row['status']). '">' .$row['status'] .  '</span></p>
                </div>
            </div>
        </div>';
    }
    echo '</div>';
  
    
    ?>
    <div></div>
</body>

</html>
