<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="pixeladmin.css">
    <title>Pixel Shop</title>
</head>
<?php
session_start();
if(!isset($_SESSION['admin'])){
    $_SESSION["warninglogin"] = '<text id="warn">Account sayfasına girmek için önce giriş yapmalısınız!</text>';
    header("location:login.php");
    require "../common/dbconnect.php";
  }
  
?>
<body>
    <?php 
    require"navbar.php";
    ?>

<div class="content">
    <a class = "add" href='add_product.php'>Add Product</a>
    <h2>Product List</h2>
    <div class="product-container">
        <?php
        require "../common/dbconnect.php";
       
        $query =  "SELECT * FROM products p where p.productname ilike " . " '%" . "%'" ;
        $query = $query. " order by productid";
        $result = pg_query($dbconn, $query);

    if (!$result) {
        echo "Sorgu çalıştırma hatası: " . pg_last_error();
        exit;
    }



    echo "<div class='product'>";
        echo "<span>ID</span>";
        echo "<span>Name</span>";
        echo "<span>Price</span>";
        echo "<span>Options</span>";
        echo "</div>";
    while ($row = pg_fetch_assoc($result))
    {
        if (isset($_POST["delete{$row["productid"]}"])) {
            $querycart = "DELETE FROM carts WHERE product_id=". $row["productid"];
            pg_query($dbconn, $querycart);
       
                $querydelete = "DELETE FROM products WHERE productid=". $row["productid"];
                pg_query($dbconn, $querydelete);
                header("location:pixeladmin.php");
        } 
        echo "<div class='product'>";
        echo "<span>{$row["productid"]} </span>";
        echo "<span>{$row["productname"]} </span>";
        echo "<span>{$row["price"]} </span>";
        
        echo "<form method= \"post\">";
        echo "<a class='edit' href=\"edit_product.php?id={$row["productid"]}\">Edit</a> ";
        echo "<button id='delete{$row["productid"]}' name='delete{$row["productid"]}' type=\'submit'>Delete</button>";
        echo "</form>";
        echo "</div>";
    }          
        ?>

    </div>
    
</div>

</body>
</html>
