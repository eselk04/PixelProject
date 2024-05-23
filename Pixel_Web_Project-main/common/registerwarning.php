<?php 
if(isset($_SESSION['registerinfo']))
{
echo $_SESSION['registerinfo'];
unset($_SESSION['registerinfo']);
}
?>