<?php
include "connect.php";
$email = $_POST["email"];
$pass = $_POST["pass"];
$query = "SELECT * FROM user WHERE email=:email AND pass=:pass";
$res = $connect->prepare($query);
$res->bindParam(":email", $email);
$res->bindParam(":pass", $pass);
$res->execute();
$row = $res->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    echo "not found";
    //echo $row["email"];
} else {
    echo $row["email"];

}


