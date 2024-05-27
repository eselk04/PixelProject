<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="order_managment.css">
    <title>Pixel Shop</title>
</head>
<div class="product-container">
        <?php
        require '../common/tarihformatla.php';
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
            $queryorder = 'SELECT o.userid , o.productid ,p.productname ,o.orderdate, COUNT(o.productid) AS quantity
            FROM orders o
            JOIN products p ON p.productid = o.productid
          
            GROUP by o.userid, o.productid ,p.productname, o.orderdate';
            
            $resultorder = pg_query($dbconn, $queryorder);
            while($rowb=pg_fetch_assoc($resultorder))
            {
                echo '
                <form action=""> <div class="siparis"><button><div id="order_button"><a>' . $rowb["productname"] .'</a><a>'. $rowb["quantity"] .' adet</a><a>Sipariş Tarihi: '.tarihFormatla($rowb["orderdate"]) .'</a></div> </button><div id="approve"> <button id="onay"><img src="../images/approve_button.png"/> </button> </div><div id="approve"> <button id="cancel"><img src="../images/cancel_button.png"/> </button> </div></div>
                ';

            }


          
         echo '  </div>
        </body>';
    }          
        ?>

    </div>