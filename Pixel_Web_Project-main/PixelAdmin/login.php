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
 require "../common/loginwarning.php";
 if (isset($_POST["admin_login"])) {
    if ($_POST["password"] == "admin") {
        $_SESSION["admin"] = true;
        header("location:pixeladmin.php");
    }
    else {
        echo "<text id='warn'>incorrect password! </text>";
    }
 }

 ?>


    <section>
        <div class="form" >
            <h1>Admin Panel</h1>
            <form method = "POST">
                <div class="form-control">
                    
                </div>
                <div class="form-control">
                    <input type="password" id="password" name="password" required>
                    <label >Password</label>
                </div>

                <button id="admin_login" name="admin_login" class="formbtn">Login</button>
            </form>
        </div>
    </section>
    <?php 



 

    
    
    
    
    ?>

    <script src="login.js"></script>
</body>
</html>