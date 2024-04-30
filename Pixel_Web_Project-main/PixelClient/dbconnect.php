<?php 



$host = "localhost";
$port = "5432"; 
$dbname = "postgres";
$user = "postgres";
$password = "eselk0101";



$dbconn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


if (!$dbconn) {
echo "Veritabanı bağlantı hatası: " . pg_last_error();
}


?>