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
 if(!isset($_SESSION['ID'])){
  $_SESSION["warninglogin"] = '<text id="warn">Cart sayfasına girmek için önce giriş yapmalısınız!</text>';
  header("location:login.php");
}
require "dbconnect.php";
 
  require "navbar.php";
  if (array_key_exists('ID', $_SESSION) && !empty($_SESSION['ID'])) {
} else {
    header("location:login.php");
}
  $query = 'SELECT p.productid, p.productname, p.price,p.description,p.stock , COUNT(c.cart_id) AS quantity
  FROM products p 
  JOIN carts c ON p.productid = c.product_id 
  WHERE c.user_id =' . $_SESSION['ID'] . ' GROUP BY p.productid, p.productname;';
   
  
 $result = pg_query($dbconn, $query);

 echo ' <section>
 <div class="shop">
 </div>
 <div class="cart">
     <h2>Shopping &nbsp; Cart</h2> ';
     $totalvalue = 0;
 while ($row = pg_fetch_assoc($result)) {
    $productName = $row['productname'];
    $productPrice = $row['price'];
    $productDescription = $row['description'];
    $quantity = $row['quantity'];
    $prodcutId = $row['productid'];
    $stock = $row['stock'];


echo ' 
<form method = "POST">
        <div class="cart-items">
            <div class="cart-item">
                <span class="cart-item-name">' . $productName .     '</span>
                <span class="cart-item-price">' . $productPrice .     '</span>
                <div class="quantity">
                <form method = "POST">
                    <button name = "decreasebutton' . $prodcutId . '" class="decrease-quantity">-</button>
                    <span id="qvalue" class="quantity-value">' . $quantity .     '</span>
                    <button name = "increasebutton' . $prodcutId . '" class="increase-quantity">+</button>
                    </form>
                </div>
                <button name="deletebutton' . $prodcutId . '"  type="submit"   class="delete-item">Delete</button>
               
            </div>
        </div>
        </form>
       ';
       $totalvalue += ($productPrice *  $quantity);
       if(isset($_POST['deletebutton'. $prodcutId])) {
        $querydelete = "DELETE FROM carts c where c.product_id =" . $prodcutId  .
         " and c.user_id=" . $_SESSION['ID'];
         $resultdelete = pg_query($dbconn, $querydelete);
         header("location:cart.php"); 
      }
   
      if(isset($_POST['increasebutton'. $prodcutId])) {
     
         if($quantity<$stock)
         {
            $queryincrease =   'INSERT INTO carts (user_id, product_id)
            VALUES (' . '\'' . $_SESSION['ID'] . '\','.'\''. $prodcutId . '\')' ;
             $resultincrease = pg_query($dbconn, $queryincrease);
             header("location:cart.php");
         }
         else {
            echo "Alınacak ürün sayısı stoktakinden daha fazla olamaz.";
         }


   
       
      }
      if(isset($_POST['decreasebutton'. $prodcutId])) {
        $querydecrease = "DELETE FROM carts
        WHERE cart_id = (
          SELECT cart_id
          FROM cartst
          WHERE product_id =". $prodcutId .   "
            AND user_id =" . $_SESSION['ID'] .  "
          LIMIT 1
        );";
         $resultdecrease = pg_query($dbconn, $querydecrease);
         header("location:cart.php");
      
      }
      if(isset($_POST["order"]))
{
  if(!$totalvalue>0)
  echo "Sepetiniz boş!";
  else 
{
  header("location:purchase.php");
}
}
     
    
    
    }
      

 


 echo ' <div class="total-price">
 <span class="total-label">Total:</span>
 <span class="total-value">' .  $totalvalue . ' TL</span>
</div>
<form method="POST">
<button name="order" id="order"  class="order-button">Place Order</button></form>
</div>
</section>';





  ?>
    
    

   

    
</body>
</html>