<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="product.css">
    <title>Pixel Shop</title>
</head>

<body>
    
  
     <?php
  session_start();
     require "navbar.php";
     
     require "dbconnect.php";
 

$url = $_SERVER['REQUEST_URI'];

$parts = parse_url($url);
$query = $parts['query']; 
parse_str($query, $parameters);

$query = 'SELECT * FROM products where productid='.''.  $parameters['id'] ;
$queryfull = 
$result = pg_query($dbconn, $query);





while ($row = pg_fetch_assoc($result)) {
    $productName = $row['productname'];
    $productDescription = $row['description'];
    $productPrice = $row['price'];
    $productStock  = $row['stock'];

    if (isset($_POST['execute'])) {
        if (isset($_SESSION['ID'])) {
            $querycart = 'INSERT INTO carts (user_id, product_id)
        VALUES (' . '\'' . $_SESSION['ID'] . '\','.'\''. $parameters['id'] . '\')' ;
        $resultcart = pg_query($dbconn, $querycart);
       
       
        
        $row = pg_fetch_assoc($resultcart);
        } else {
           echo '<text id="warn">SEPETİNİZE ÜRÜN EKLEMEK İÇİN LÜTFEN OTURUM AÇIN.</text>';
        }
        
      
        
    }



    echo" <div class=\"shp\">";
    echo "<h1 id=\"product-name\">" . $productName  . "</h1>";
    echo "<img id=\"product-image\" src=\"../images/product" . $parameters['id'] .  ".jpg\" alt=\"Ürün Fotoğrafı\">";
    echo " <p id=\"product-price\">Price:" . $productPrice .  "</p>";
    echo " <p id=\"product-description\">Kısa Açıklama:" . $productDescription .  "</p>";
   echo " <form method=\"post\">";
   echo "  <button type = \"submit\" name =\"execute\"  id=\"add-to-cart\" class=\"add-to-cart\">Add to cart</button>";
  echo "</form>";
   echo "</div>";
}



   

     ?>



   
        
        
       
       
      
    

    <script src="product.js"></script>

    
</body>
</html>