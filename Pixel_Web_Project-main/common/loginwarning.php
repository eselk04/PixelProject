<?php 
if(isset($_SESSION['logininfo']))
{
echo $_SESSION['logininfo'];
unset($_SESSION['logininfo']);
}
?>