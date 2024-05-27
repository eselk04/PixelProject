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
       
        $query =  "SELECT * FROM users where userid in (select userid from orders)";
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
            $queryorder = 'SELECT * from orders o join products p on p.productid = o.productid where userid=' . $row["userid"];
            
            
            $resultorder = pg_query($dbconn, $queryorder);
            while($rowb=pg_fetch_assoc($resultorder))
            {  if(isset($_POST["cancel". $rowb["orderid"]])){
                $querycancel = "update orders set status='Cancelled' where orderid=" .$rowb["orderid"] . ";" ;
                $resultcancel = pg_query($dbconn , $querycancel);
                header("location:order_management.php");
            }
            if(isset($_POST["approve". $rowb["orderid"]])){
                $queryapprove = "update orders set status='Preparing' where orderid=" .$rowb["orderid"] . ";" ;
                $resultapprove = pg_query($dbconn , $queryapprove);
                header("location:order_management.php");
            }
                echo '
                <form method="post" > <div class="siparis"><button><div id="order_button"><a>' . $rowb["productname"] .'</a><a>'. (int)$rowb["totalamount"] .' adet</a><a>Sipariş Tarihi: '.tarihFormatla($rowb["orderdate"]) .'</a><a>Status: '.$rowb["status"] .'</a>
                </div> </button><div id="approve"> <button id=="approve' . $rowb['orderid'] . ' name="approve' . $rowb['orderid'] . '"><img src="../images/approve_button.png"/> </button> </div><div id="approve"> <button id="cancel' . $rowb['orderid'] . '" name="cancel' . $rowb['orderid'] . '"><img src="../images/cancel_button.png"/> </button> </div></div>
                ';
              

            }


          
         echo '  </div>
        </body>';
    }          
        ?>

    </div>