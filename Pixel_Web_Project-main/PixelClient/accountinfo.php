<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="accountinfo.css"/>
    
    <title>Login</title>
</head>

<body>
<?php 
session_start();
    require "navbar.php";
    require "../common/dbconnect.php";
    
    $query = "select * from users where userid=" . $_SESSION['ID'];
    $result = pg_query($dbconn, $query);
    $username = "";
    $password = "";
    while ($row = pg_fetch_assoc($result)) { 
   $username = $row["username"];
   }
   if(isset($_POST['save']))
   {
      if($_POST['password'] == $_POST['rpassword'])
      {
        $queryupdate = "update users set username =" 
        . "'"  . $_POST['name'] . "'"  . " , password =" . "'" . $_POST['password'] .  "'".
          " where userid =" . $_SESSION['ID'] . ";";
          pg_query($dbconn, $queryupdate);
          $_SESSION['NAME'] =  $_POST['name'];
         header("location:account.php");
      }
      else{
        echo "Şifreler aynı değil!";
      }}
echo '
<section>
        <div class="form" >
            <h1>Change Your Account Information : </h1>
            <form method = "POST">
                <div class="form-control">
                    <input type="text" id="name" value="' . $username . '" name="name" required>
                    <label >Name</label>
                </div>
                <div class="form-control">
                    <input type="password" id="password" name="password" required>
                    <label >Password</label>
                </div>
                <div class="form-control">
                    <input type="password" id="rpassword" name="rpassword" required>
                    <label >Password Again</label>
                </div>
                 
                <button name="save" id="save" class="formbtn">Save Changes</button>
                
            </form>
        </div>
        
    </section>

';


    

    ?>



<script src="accountinfo.js"></script>
</body>