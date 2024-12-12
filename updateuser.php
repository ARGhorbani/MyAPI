<?php
include "connect.php";
$email=$_POST["email"];
$name=$_POST["name"];
$family=$_POST["family"];
$birthday=$_POST["birthday"];
$code=$_POST["code"];
$mobile=$_POST["mobile"];
$manorwoman=$_POST["manorwoman"];

$sql = "UPDATE user SET name=:name, family=:family, birthday=:birthday ,
manorwoman=:manorwoman,code=:code,mobile=:mobile WHERE email=:email";
$res = $connect->prepare($sql);
$res->bindParam(":name", $name);
$res->bindParam(":family", $family);
$res->bindParam(":birthday", $birthday);
$res->bindParam(":manorwoman", $manorwoman);
$res->bindParam(":code", $code);
$res->bindParam(":mobile", $mobile);
$res->bindParam(":email", $email);
$res->execute();

if($res){
    echo "ok";
}else{
    echo "not ok";
}