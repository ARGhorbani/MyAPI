<?php
$server = getenv('DB_HOST');
$user = getenv('DB_USER');   
$pass = getenv('DB_PASS');  
$dbname = getenv('DB_NAME'); 

$dsn="mysql:host=$server;dbname=$dbname";

try{
$connect=new PDO($dsn,$user,$pass);
$connect->exec("SET character_set_connection = 'utf8'");
$connect->exec("SET NAMES 'UTF8'");
}
catch(PDOException $error){

echo "unable to connect".$error->getMessage();

}
?>
