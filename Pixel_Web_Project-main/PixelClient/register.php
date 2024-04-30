<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="register.css">
    <title>Pixel Shop</title>
</head>

<body>
    
  <?php 
  require "navbar.php";
  ?>
    <section>   
        <div class="register">
            <form action="register.php" id="form" method = "POST">
            <h1>Register</h1>
            <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <div class="error"></div>
            </div>
            <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" >
            <div class="error"></div>
            </div>
            <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <div class="error"></div>
            </div>
            <div class="input-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword">
            <div class="error"></div>
            </div>
            <button type="submit">Register</button>
            </form>
            </div>
    </section>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require 'dbconnect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $cpassword = $_POST['cpassword'];
        
        $query = 'INSERT INTO users (username,password,email) VALUES (' . '\''.  $username .'\',\''. $password .'\',\''. $email . '\')';
   


      
        
        $result = pg_query($dbconn, $query);
        
        if ($result) {
            
            echo "Kullanıcı başarıyla eklendi.";
        }
        
        
        else {
            echo "Kullanıcı eklenirken bir hata oluştu: " . pg_last_error();
        }
    }
   
    ?>
    <script src="register.js"></script>

    
</body>
</html>