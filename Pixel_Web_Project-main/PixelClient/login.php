<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css"/>
    
    <title>Login</title>
</head>
<body>
 <?php
 session_start();
 require "navbar.php";
 if(isset($_SESSION["warninglogin"]))
 {
  echo $_SESSION["warninglogin"];
  unset($_SESSION["warninglogin"]);
 }
 if($_SERVER["REQUEST_METHOD"] == "POST") {
 
 
    require "../common/dbconnect.php";
     $query = 'SELECT * FROM users where email = '.'\''. $_POST['email'] . '\' and password =' . '\'' . $_POST['password'] . '\'' ;
     $result = pg_query($dbconn, $query);
     while ($row = pg_fetch_assoc($result)) {
       $_SESSION['ID'] =  $row['userid'];
       $_SESSION['NAME'] =  $row['username'];
       $_SESSION['EMAIL'] = $row['email']; 
       $_SESSION['CDAT'] = $row['createdat'];
     
     header("location:main.php");
     }
 
 
 }
 

 
 ?>


    <section>
        <div class="form" >
            <h1>Please Login</h1>
            <form method = "POST">
                <div class="form-control">
                    <input type="text" id="email" name="email" required>
                    <label >Email</label>
                </div>
                <div class="form-control">
                    <input type="password" id="password" name="password" required>
                    <label >Password</label>
                </div>

                <button class="formbtn">Login</button>
                <p class="text">Don't have an account?<a href="register.php">Register</a></p>
            </form>
        </div>
    </section>
    <?php 



 

    
    
    
    
    ?>

    <script src="login.js"></script>
</body>
</html>