
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
    <title>Pixel Shop</title>
</head>

<body>


    
   
    <?php
    session_start();
    require "navbar.php";
    require "../common/loginwarning.php";
    require "../common/dbconnect.php";
 
    $query =  "SELECT * FROM products p  ";
if (isset($_GET['search'])  ||isset($_GET['category']) ) {

    $query = $query . "join categories c on c.categoryid = p.categoryid ";
    if(isset($_GET['search'])){
    $query = $query . "where p.productname ilike " . " '%". $_GET['search'] . "%'";}
    if(isset($_GET['category']))
    {
        $query = $query . " and c.categoryname like " . " '%". $_GET['category'] . "%'";
    }
}





 



$result = pg_query($dbconn, $query);


if (!$result) {
    echo "Sorgu çalıştırma hatası: " . pg_last_error();
    exit;
}
echo "<main id=\"\">";
while ($row = pg_fetch_assoc($result)) {
    $productID = $row['productid'];
    $productName = $row['productname'];
    $productPrice = $row['price'];
    echo "<a href='product.php?id=$productID'><div class=\"product\">";
    echo "<img style=\"width: 100%; height: 50%;\" src=\"../images/product$productID.jpg\" alt=\"$productName\">";
  
    echo "    <h3>$productName</h3>";
    echo "    <span class=\"\${getClassByRate($productPrice}\">$productPrice</span>";
    echo "</div></a>";
}
echo "</main>";

   


   echo" <script src=\"main.js\"></script>";
?>

 

   

    
</body>
</html>

