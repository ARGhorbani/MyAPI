<?php
$server = getenv('DB_HOST'); // هاست دیتابیس (Host)
$user = getenv('DB_USER');   // نام کاربری دیتابیس (Username)
$pass = getenv('DB_PASS');   // رمز عبور دیتابیس (Password)
$dbname = getenv('DB_NAME'); // نام دیتابیس (Database Name)

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
