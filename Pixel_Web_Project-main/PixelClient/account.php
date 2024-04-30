<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="account.css">
    <title>Pixel Shop</title>
</head>

<body>
    
  <?php 
require "navbar.php";

  ?>

 

    <section>       
        <div class="register">
            <form action="" id="form">
            <h1>Account Info</h1>
            <div class="input-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Dilber Şah" id="username" name="username">
        
            </div>
            <div class="input-group">
            <label for="email">Email</label>
            <input type="text" placeholder="dilber-sah@hotmail.com" id="email" name="email" >
        
            </div>
            <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" placeholder="deneme123" name="password">
            </div>
            <!--  
            <div class="input-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword">
            </div>   
            -->
            
            <button type="submit">Update</button>
            </form>
            </div>
    </section>

    <script src="account.js"></script>

    
</body>
</html>