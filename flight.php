<?php
include "connect.php";
$date=$_GET["date"];
$origin=$_GET["origin"];
$destination=$_GET["destination"];
$query="SELECT * FROM flight  WHERE origin=:origin AND destination=:destination AND
 data=:date"; 
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
    $record["origin"]=$row["origin"];
    $record["destination"]=$row["destination"];
    $record["origin_airport"]=$row["origin_airport"];
    $record["destination_airport"]=$row["destination_airport"];
    $record["date"]=$row["data"];
    $record["type"]=$row["type"];
    $record["kind"]=$row["kind"];
    $record["company"]=$row["company"];
    $record["flight_time"]=$row["flight_time"];
    $record["land_time"]=$row["land_time"];
    $record["capacity"]=$row["capacity"];
    $record["flight_id"]=$row["flight_id"];
    $record["price_young"]=number_format($row["price_young"]). " ریال";
    $record["price_child"]=number_format($row["price_child"]). " ریال";
    $record["price_baby"]=number_format($row["price_baby"]). " ریال";

    $tickets[]=$record;
}
echo JSON_encode($tickets);

?>