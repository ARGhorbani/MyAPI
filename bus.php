<?php
include "connect.php";
$date=$_GET["date"];
$origin=$_GET["origin"];;
$destination=$_GET["destination"];
$query="SELECT * FROM bus  WHERE origin=:origin AND destination=:destination  AND
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
    $record["ticket_id"]=$row["ticket_id"];
    $record["origin"]=$row["origin"];
    $record["destination"]=$row["destination"];
    $record["origin_terminal"]=$row["origin_terminal"];
    $record["destination_terminal"]=$row["destination_terminal"];
    $record["date"]=$row["date"];
    $record["time"]=$row["time"];
    $record["type"]=$row["type"];
    $record["distance"]=$row["distance"];
    $record["capacity"]=$row["capacity"];
    $record["chairs"]=$row["chairs"];
    $record["price"]=number_format($row["price"]). " ریال";
    $tickets[]=$record;
}
echo JSON_encode($tickets);

?>