<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="order_managment.css">
    <title>Pixel Shop</title>
</head>
<div class="product-container">
        <?php
        require "navbar.php";
        require "../common/dbconnect.php";
       
        $query =  "SELECT * FROM users";
        $result = pg_query($dbconn, $query);

    if (!$result) {
        echo "Sorgu çalıştırma hatası: " . pg_last_error();
        exit;
    }

    echo "<div class='product'>";
        echo '<h1 id:"header">Siparişler</h1>';
        echo "</div>";
    while ($row = pg_fetch_assoc($result))
    {
            echo '
            <body>
        
            <div class="musteri">
                <div class="musteri-baslik">'.$row["username"].'</div>';
            $queryorder = "select * from orders o join products p on p.productid=o.productid  where o.userid='" . $row["userid"] . "' ";  
            $resultorder = pg_query($dbconn, $queryorder);
            while($rowb=pg_fetch_assoc($resultorder))
            {
                echo '
                <form action=""> <div class="siparis"><button>' . $rowb["productname"] .'</button></div>
                ';

            }


          
         echo '  </div>
        </body>';
    }          
        ?>

    </div>