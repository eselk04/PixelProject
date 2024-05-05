
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
             
                if(isset($_POST["searchbutton"])) {
                    header("location:main.php?search=" . $_POST['search']);
                }
               
                if (isset($_SESSION['ID'])) {
                    
                    echo "Merhaba " . $_SESSION['NAME'];  } 
                    else {
                    echo "<a href='login.php'>Giriş Yap</a>";  } 
                   
                
               ?>                
                <input type="text" id="search" name="search" class="search" placeholder="Search...">
           
                <button type="submit" name="searchbutton" id="searchbutton" class="btn active"><i class="fas fa-search"></i> </button>
         </form>


         <script src="navbar.js"> </script>
         
         
         
        
    </nav>
