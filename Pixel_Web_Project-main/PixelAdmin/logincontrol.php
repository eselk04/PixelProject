<?php
session_start();
if(!isset($_SESSION['admin'])){
    $_SESSION["logininfo"] = '<text id="warn">You must log in first !</text>';
    header("location:login.php");
    require "../common/dbconnect.php";
  }
?>