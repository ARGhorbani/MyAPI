<?php
include "connect.php";
$query = "SELECT * FROM city";
$res = $connect->prepare($query);
$res->execute();
$products = array();
while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
    $record = array();
    $record["id"] = $row["id"];
    $record["title"] = $row["city"];

    $products[] = $record;
}
echo JSON_encode($products);

?>