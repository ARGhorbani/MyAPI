<?php
$MerchantID = 'e1221ca2-6cd6-11e9-97ea-000c29344814';
$Amount = $_GET['Amount'];
$Authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {

    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]
    );

    if ($result->Status == 100) {
        echo 'REFID,'.$result->RefID;
    } else {
        echo 'FAILED,'.$result->Status;
    }
} else {
    echo 'CANCELE,0';
}