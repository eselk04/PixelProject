
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="navbar.css">
    <title>Pixel Shop</title>
</head>

<nav class="container">
            <div class="logo">
                <a href="main.php"><h1>Pixel Shop</h1></a>  
            </div>
             <div class="list">  
                <ul>
                    <li><a href="main.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="account.php"><i class="fa-solid fa-user"></i> Account</a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Shopping &nbsp; Cart</a></li>     
                </ul>
            </div> 
            <form method = "POST" id="sform" class="src active">
               <?php
               $currentUrl = $_SERVER['REQUEST_URI'];
                if(isset($_POST["searchbutton"])) {
                        $urlParts = parse_url($currentUrl);
                        parse_str($urlParts['query'] ?? '', $queryParams);
                        $queryParams['search'] = $_POST['search'];
                        $newQueryString = http_build_query($queryParams);
                        $newUrl = 'main.php' . '?' . $newQueryString;
                        header("Location: $newUrl");
                }
                if (isset($_SESSION['ID'])) {
                    echo $_SESSION['NAME'];  } 
                    else {
                    echo "<a href='login.php'>Giriş Yap</a>";  } 
               ?>                
                <input type="text" id="search" name="search" class="search" placeholder="Search...">
           
                <button type="submit" name="searchbutton" id="searchbutton" class="btn active"><i class="fas fa-search"></i> </button>
                
         </form>
        
                <?php 
               
                if(basename($_SERVER['SCRIPT_FILENAME']) == "main.php")
                {
                    require "../common/dbconnect.php";
                    echo ' <div class="categories-container">
                    <h2 class="category-header" onclick="toggleCategories()">Kategoriler <i class="fas fa-chevron-down"></i></h2>
                    <div id="category-list" class="category-list">';
                    $querycategory = "select * from categories";
                    $resultcategory = pg_query($dbconn, $querycategory);
                    while($row = pg_fetch_assoc($resultcategory))
                    {
                        echo '<div class="category" onclick="
                        var currentUrl = window.location.href;
                        var newUrl;
                        if (currentUrl.indexOf(\'?\') !== -1) {
                            if (currentUrl.indexOf(\'category=\') !== -1) {
                                newUrl = currentUrl.replace(/category=[^&]*/, \'category=' . $row['categoryname'] . '\');
                            } else {
                                newUrl = currentUrl + \'&category=' . $row['categoryname'] . '\';
                            }
                        } else {
                            newUrl = currentUrl + \'?category=' . $row['categoryname'] . '\';
                        }
                        window.location.href = newUrl;
                    ">
                        <h3 class="category-title">'. ucfirst($row['categoryname']) . '</h3>
                    </div>';
                  
                    }
                    echo '      </div>
                    </div>';
                }
                ?>
         <script src="navbar.js"> </script> 
    </nav>
