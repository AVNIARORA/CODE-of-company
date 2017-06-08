<?php
require_once ("../html/header.html");

require_once ("../inc/dbConnect.php");


//Store transaction information from PayPal
$item_number = $_GET['item_number']; 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];

$date = date("Y-m-d") ;
	
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';
 
$tx_token = $_GET['tx'];
$auth_token = "Qzo2XHXNHUXI95BFZDXsLmfdGoUVbei0FymiGdjQw29TYpcPRhxShgS6wn0";
$req .= "&tx=$tx_token&at=$auth_token";
 
 $ch = curl_init('https://www.sandbox.paypal.com/pe/cgi-bin/webscr');
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

    if( !($res = curl_exec($ch)) ) {
		echo 'Curl error: ' . curl_error($ch);
         error_log("Got " . curl_error($ch) . " when processing PDT data");
        curl_close($ch);
        exit;
    }
    curl_close($ch);

	
	if(!$res){
	}else{
     // parse the data
	 $lines = explode("\n", trim($res));
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
    	$success= true;
        for ($i=1; $i<count($lines);$i++){
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
		}
    
		$firstname = $keyarray['first_name'];
		$lastname = $keyarray['last_name'];
		$itemname = $keyarray['item_name'];
		$buyerName = $firstname." ".$lastname;
		$amount = $keyarray['payment_gross'];
		$buyerPaypalMail= $keyarray["payer_email"];
		$paymentStatus = $keyarray["payment_status"];
		$paypalTxId = $keyarray["txn_id"];
		$currency = $keyarray["mc_currency"];
		$purchaseDate= $keyarray["payment_date"];
		$price = $amount.$currency;
		$buyerPaypalId = $keyarray["payer_id"];
		$buyerStreetAddress = $keyarray["address_street"];
		$buyerCity = $keyarray["address_city"];
		$buyerState = $keyarray["address_state"];
		$buyerCountry = $keyarray["address_country"];
		$buyerZipCode = $keyarray["address_zip"];
		
		$buyerAddress = $buyerStreetAddress . "," . $buyerCity . "," . $buyerState . "," . $buyerCountry . "," . $buyerZipCode;
		
		echo '<div class="container"><h1>Your payment has been successful</h1><br>';

		$conn = @new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
		
		if (mysqli_connect_errno()) 
		{
			printf("Something went wrong: %s", mysqli_connect_error());
			exit();
		}
		
		
		
		$sql = "INSERT INTO `paid_users_info` (`Name`, `PaypalTxnId`, `PaypalId`, `PaypalEmail`, `EaPurchased`, `StartDate`, `IsExpired`, `Address`) VALUES ('$buyerName', '$txn_id', '$buyerPaypalId ', '$buyerPaypalMail', '$itemname ', '$date', '1' , '$buyerAddress')";
		if (mysqli_query($conn, $sql)) 
		{
			//echo "<script type='text/javascript'> alert('Payment Successful!');</script>";  
		} 
		else 
		{
			echo "<script type='text/javascript'> alert('Something went wrong!');</script>". mysqli_error($conn);
		}
		require_once ("../html/success.html");
	}
		else if (strcmp ($lines[0], "FAIL") == 0) {
			$success = false;
		echo '<h1>Your payment has failed.</h1>';
	}
}

require_once ("../html/footer.html");
?>
<script>
$(document).ready(function(){

var success = <?php echo $success; ?>;

	if(success){
	    var r=$('<input/>').attr({
	    type: "submit",
	    id: "field",
	    value: 'Indicator',
	    class: 'btn btn-primary btn-lg',
	    style: 'margin:15px'
	    });
		$("#indiForm").append(r);                 
	}
});

</script>