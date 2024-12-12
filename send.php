<?php
$MerchantID = 'e1221ca2-6cd6-11e9-97ea-000c29344814';
$Amount = $_POST["Amount"];
$Description = $_POST["Description"];
$Email = 'UserEmail@Mail.Com';
$Mobile = '09123456789';
$CallbackURL = 'http://www.clicksource.ir/testpay/verify.php?Amount='.$Amount;


$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
    [
        'MerchantID' => $MerchantID,
        'Amount' => $Amount,
        'Description' => $Description,
        'Email' => $Email,
        'Mobile' => $Mobile,
        'CallbackURL' => $CallbackURL,
    ]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {
    Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
} else {
    echo'ERROR,'.$result->Status;
}

?>

