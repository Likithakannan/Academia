<?php
require('config.php');
require('Razorpay.php');
require_once 'common.php';
//session_start();
$student_id = $_SESSION['student_id'];
use Razorpay\Api\Api;
$onlinePay = new STUDENT();
$sql9 = $DB_con->prepare( "select max(pID) as pID from onlinepayment" );
$sql9->execute();
$result9 = $sql9->fetch( PDO::FETCH_ASSOC ) ;
$pID = $result9['pID'];
$mOrderID= "0000".$pID ;
$api = new Api($keyId, $keySecret);


//$name =$_GET['name'];
//$n=strtoupper($name);
$email = $_POST['emailA'];
$phone = $_POST['phoneA'];
$fee_type = $_POST['types'];

//$service =$_GET['uid'];
//$typeProduct = $_GET['typeProduct'];
$toValue = $_POST['totalA'];
$message = "Paid";
$razorpayPaymentId ="";
$paymentStatus ="SUCCESS";
$makerstamp=date('Y-m-d h:i:s');
$updatestamp=date('Y-m-d h:i:s');
$student_id=$_SESSION['student_id'];


//$_SESSION['name'] = $name;
$_SESSION['fee_type'] = $fee_type;
$_SESSION['emailA'] = $email;
$_SESSION['phoneA'] = $phone;
//$_SESSION['service'] = $service;
//$_SESSION['typeProduct'] = $typeProduct;
$_SESSION['toValue'] = $toValue;
$_SESSION['message'] = $message;

$orderData = [
    'receipt'         => 3456,
    'amount'          => ($toValue * 100), // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    //"name"              => "$n",
    "description"       => "Buying the prodcut of Learning Mobile app development",
    "image"             => "https://icon-library.com/images/rupees-icon/rupees-icon-3.jpg",
    "prefill"           => [
    //"name"              => $name,
    "email"             => $email,
    "contact"           => $phone,
    ],
    "notes"             => [
    "address"           => "Online Payments",
    "merchant_order_id" => $mOrderID,
    ],
    "theme"             => [
    "color"             => "#72ff0d"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

		if($onlinePay->razorPayOnline($student_id,$email,$phone, $toValue, $message,$razorpayOrderId,$razorpayPaymentId,$paymentStatus,$makerstamp,$updatestamp,$fee_type))
			
		{			
			//$successMSG = "Your payment has been done successfully.";
			$json = json_encode($data);
		}
		else
		{
			$errMSG = "sorry , Query could no execute...";
		}		
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Razorpay | Payment Gateway Integration</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<style>div {

justify-content: center;
}</style>
<!--===============================================================================================-->
</head>
<body >
   
<div class="container-contact100">
  <div class="wrap-contact100">

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:18px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-hrow{background-color:#4caf4f;border-color:inherit;color:#ffffff;font-weight:bold;justify-content: center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-hrow">You are Paying Rs.<?php echo $toValue?></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0pky">
        Hi,<?php /*echo $name;*/?>
        Phone number <?php echo $phone;?>
        You are Paying Rs.<?php echo $toValue?>.<br>
       ✅ You Can make the Payment using Google Pay, PhonePe, Paytm for UPI.<br>
       ✅ Wallets, Debit Card and Credit Card is also accepted.<br>
       
    </td>
  </tr>
  
</tbody>
</table>
<div>
<img src="https://cdn.dnaindia.com/sites/default/files/styles/full/public/2021/09/07/994953-947635-upi-transactions-india.jpg" height="160" width="300" class="rounded border border-dark shadow mt-2"></div>

<div class="payment">
   <form action="verify.php" method="POST" name="member_signu">
	<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="3456"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
	     <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="3456">
<input type="hidden" name="callback_url" value="verify.php">
<input type="hidden" name="cancel_url" value="verify.php">

</form>
	</div>	  

  </div>
</div>
<!--===============================================================================================--> 
<script src="js/main.js"></script> 

</body>
</html>
