<?php
include "connect.php";
$city=$_GET["city"];
$query="SELECT * FROM  hotel WHERE  city=:city";
$res=$connect->prepare($query);
$res->bindParam(":city",$city);
$res->execute();
$tickets=array();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["name"]=$row["name"];
    $record["city"]=$row["city"];
    $record["star"]=$row["star"];
    $record["bed_count"]=$row["bed_count"];
    $record["image"]=$row["image"];
    $record["lat"]=$row["lat"];
    $record["lang"]=$row["lang"];
    $record["price"]=number_format($row["price"]). " ریال";
    $tickets[]=$record;
}
echo JSON_encode($tickets);

?>