<?php
$server = getenv('autorack.proxy.rlwy.net:42793'); // هاست دیتابیس (Host)
$user = getenv('root');   // نام کاربری دیتابیس (Username)
$pass = getenv('WDgBKrvdinmwHuZNxWgIDGQDBnhtEssd');   // رمز عبور دیتابیس (Password)
$dbname = getenv('railway'); // نام دیتابیس (Database Name)

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
