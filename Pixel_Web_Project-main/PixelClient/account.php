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
  require "dbconnect.php";
}
 require "navbar.php";
 $istenilen_tarih = $_SESSION['CDAT'];
$tarih_nesnesi = new DateTime($istenilen_tarih);
$aylar = array(
    "01" => "Ocak",
    "02" => "Şubat",
    "03" => "Mart",
    "04" => "Nisan",
    "05" => "Mayıs",
    "06" => "Haziran",
    "07" => "Temmuz",
    "08" => "Ağustos",
    "09" => "Eylül",
    "10" => "Ekim",
    "11" => "Kasım",
    "12" => "Aralık"
);
$turkce_ay = $aylar[$tarih_nesnesi->format('m')];
$formatli_tarih = $tarih_nesnesi->format('d') . ' ' . $turkce_ay . ' ' . $tarih_nesnesi->format('Y') . ' ' . $tarih_nesnesi->format('H:i');
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
    <?php 
    echo ' <div class="order-history">
    <h1>Order History</h1>
    <div class="order">
        <div class="order-item">
            <div class="order-details"> 
                <img src="image.jpg" alt="Product Image">
                <p> iPhone 12 Pro</p>
                <p> $999</p>
                <p> May 1, 2024</p>
                <p><span class="status preparing">Preparing</span></p>
            </div>
        </div>
    </div>
    <div class="order">
        <div class="order-item">
            <div class="order-details">
            <img src="image.jpg" alt="Product Image">
            
                <p> MacBook Pro</p>
                <p> $1499</p>
                <p> April 20, 2024</p>
                <p> <span class="status delivered">Delivered</span></p>
            </div>
        </div>
    </div>
    <div class="order">
        <div class="order-item">
            <div class="order-details"> 
                <img src="image.jpg" alt="Product Image">
                <p> Apple Watch Series 7</p>
                <p> $399</p>
                <p> March 15, 2024</p>
                <p><span class="status cancelled">Cancelled</span></p>
            </div>
        </div>
    </div>
    
</div>';
    
    ?>
    <div></div>
</body>

</html>
