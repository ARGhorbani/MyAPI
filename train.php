<?php
include "connect.php";
$date=$_GET["date"];
$origin=$_GET["origin"];;
$destination=$_GET["destination"];
$query="SELECT * FROM train  WHERE origin=:origin AND destination=:destination  AND
 date=:date";
$res=$connect->prepare($query);
$res->bindParam(":origin",$origin);
$res->bindParam(":destination",$destination);
$res->bindParam(":date",$date);
$res->execute();
$tickets=array();
$rules=array();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["id"]=$row["id"];
    $record["train_id"]=$row["train_id"];
    $record["origin"]=$row["origin"];
    $record["destination"]=$row["destination"];
    $record["start_time"]=$row["start_time"];
    $record["end_time"]=$row["end_time"];
    $record["date"]=$row["date"];
    $record["type"]=$row["type"];
    $record["capacity"]=$row["capacity"];
    $record["coupe_capacity"]=$row["coupe_capacity"];
    $record["price"]=number_format($row["price"]). " ریال";
    $tickets[]=$record;
}
echo JSON_encode($tickets);

?>