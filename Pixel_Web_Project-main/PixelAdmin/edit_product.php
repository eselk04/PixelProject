<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="edit_product.css">
</head>
<body>
    <?php
    require "../common/dbconnect.php";
    require "navbar.php";
    $url = $_SERVER['REQUEST_URI'];

    $parts = parse_url($url);
    $query = $parts['query']; 
    parse_str($query, $parameters);
    
    $query = 'SELECT * FROM products where productid ='. $parameters['id'];
    $result = pg_query($dbconn, $query);
    if (isset($_POST['submit'])) {
        $Stock = (int) $_POST['stock'];
        $queryupdate = "UPDATE PRODUCTS SET productname ='{$_POST['productname']}', stock = '{$Stock}', price = '{$_POST['price']}', categoryid = '{$_POST['category']}' WHERE productid = '{$parameters['id']}'";
        $resultupdate = pg_query($dbconn, $queryupdate);
 
       $gecici_ad = $_FILES['fileToUpload']['tmp_name'];

        $hedef_dizin = "../images/";
        $dosya_adi = "product" . $parameters['id'] . ".jpg"; 
        if(move_uploaded_file($gecici_ad, $hedef_dizin . $dosya_adi)) {
            echo "Dosya başarıyla yüklendi ve kaydedildi.";
        } else{
            echo "Dosya yüklenirken bir hata oluştu.";
        }
        header('location:edit_product.php?id='.$parameters['id']);
    }
    while ($row = pg_fetch_assoc($result)) {
        echo '<section> <form class="product_edit"action="" enctype="multipart/form-data" method="post">
        <label>Product Name:</label><br>
        <input type="text" name="productname" value="' . $row["productname"] . '" required><br>
        <label>Stock:</label><br>
        <input type="text" name="stock" value="' . (int) $row["stock"] . '" required><br>
        <label>Price:</label><br>
        <input name="price" value="' . $row["price"] . '" required><br><br>';
        $querycategory = "SELECT * FROM categories";
        $resultcategory = pg_query($dbconn, $querycategory);
        echo '<label>Category: </label>';
        echo ' ';
        echo '<select name="category" id="category">';
        while ($rowb = pg_fetch_assoc($resultcategory)) {
            if ($row['categoryid'] == $rowb['categoryid']) {
                echo '
            <option selected value="'.$rowb["categoryid"].'">'. $rowb["categoryname"].'</option>';            
            }
            else {
                echo '
                <option value="'.$rowb["categoryid"].'">'. $rowb["categoryname"].'</option>';        
            }
            }
        echo '<br>';
        echo ' 
        Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

        <input type="submit" id= "submit" name= "submit" value="Submit"> </select> </form> </section>';
    }
    ?> 
    
    
</body>
</html>