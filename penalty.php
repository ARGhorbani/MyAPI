<?php
$id=$_GET["id"];
include "connect.php";
$query="SELECT * FROM penalty WHERE ticket_id=:id";
$res=$connect->prepare($query);
$res->bindParam(":id",$id);
$res->execute();
$penalties=array();
while($row=$res->fetch(PDO::FETCH_ASSOC)){
    $record=array();
    $record["rule_title"]=$row["rule_title"];
    $record["penalty_percentage"]=$row["penalty_percentage"];

    $penalties[]=$record;
}
echo JSON_encode($penalties);

?>