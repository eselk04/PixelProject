<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add_product.css">
</head>
<body>
    <?php
    require "../common/dbconnect.php";
    require "navbar.php";
    require "logincontrol.php";

    
 
    

    if (isset($_POST['submit'])) { 
        $Stock = (int) $_POST['stock'];
        $queryinsert = "insert into products  (productname,stock,price,description,categoryid) values ('{$_POST['productname']}','{$Stock}', '{$_POST['price']}', '{$_POST['description']}','{$_POST['category']}')";
        $resultinsert = pg_query($dbconn, $queryinsert);
        $querygetmax = "select max(productid) from products";
        $resultquerygetmax = pg_query($dbconn,$querygetmax);
        while($row = pg_fetch_assoc($resultquerygetmax))
        {
            $gecici_ad = $_FILES['fileToUpload']['tmp_name'];

            $hedef_dizin = "../images/";
            $dosya_adi = "product" . $row["max"]  . ".jpg"; 
            if(move_uploaded_file($gecici_ad, $hedef_dizin . $dosya_adi)) {
                echo "Dosya başarıyla yüklendi ve kaydedildi.";
            } else{
                echo "Dosya yüklenirken bir hata oluştu.";
            }
        }
       
      
    }

        echo '<section> <form class="product_edit"action="" enctype="multipart/form-data" method="post">
        <label>Product Name:</label><br>
        <input type="text" name="productname" value="' .  '" required><br>
        <label>Stock:</label><br>
        <input type="text" name="stock" value="' . '" required><br>
        <label>Description:</label><br>
        <input type="text" name="description" value="' . '" required><br>
        <label>Price:</label><br>
        <input name="price" value="'  . '" required><br><br>';
        $querycategory = "SELECT * FROM categories";
        $resultcategory = pg_query($dbconn, $querycategory);
        echo '<label>Category: </label>';
        echo ' ';
        echo '<select name="category" id="category">';
        while ($rowb = pg_fetch_assoc($resultcategory)) {
           echo ' <option value="'.$rowb["categoryid"].'">'. $rowb["categoryname"].'</option>';
            }
        echo '</select><br>';
        echo '<label> Select image to upload:</label>
        
    <input type="file" name="fileToUpload" id="fileToUpload">

        <input type="submit" id= "submit" name= "submit" value="Submit"> </select> </form> </section>
       ';
    
    ?> 
    
    
</body>
</html>