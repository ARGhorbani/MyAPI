<?php
$server = getenv('MYSQLHOST'); // Automatically set by Railway
$user = getenv('MYSQLUSER'); // Automatically set by Railway
$pass = getenv('MYSQL_ROOT_PASSWORD'); // Automatically set by Railway
$dbname = getenv('MYSQLDATABASE'); // Automatically set by Railway

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
