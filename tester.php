<!doctype html>
<head>
	<title>WorldPay Tester</title>
</head>
<body>
	<h1>WorldPay Callback Tester</h1>
	<p>
		Generates a form with all the data form your post in to post back to your callback URL.
		More info on parameters here: <a href="http://www.worldpay.com/support/kb/bg/paymentresponse/pr5201.html">
		http://www.worldpay.com/support/kb/bg/paymentresponse/pr5201.html</a> This is not endorsed by WorldPay in
		any way and has no affiliation with them what so ever. All use at your own risk.
	</p>
	<form action="<?= $_POST['MC_callback'] ?>" method="post">
<?php

/**
 * WorldPay Post Tester
 * Quick and dirty tester for WorldPay Business Gateway
 */

// Give me a transaction ID
$id = '';
for( $i = 0; $i < 10; $i++ ){

	$id .= mt_rand(1,10);

}

$ip = $_SERVER['REMOTE_ADDR'];
$amountString = $_POST['currency'].$_POST['amount'];
if( !isset($_POST['authMode']) ){

	$_POST['authMode'] = 'A';

}

// Spit out all the post as a form

?>
<label for="instId">instId</label>
<input name="transId" value="<?= $id ?>" />
<label for="cartId">cartId</label>
<input name="cartId" value="<?= $_POST['cartId'] ?>" />
<label for="desc">desc</label>
<input name="desc" value="<?= $_POST['desc'] ?>" />
<label for="amount">amount</label>
<input name="amount" value="<?= $_POST['amount'] ?>" />
<label for="amountString">amountString</label>
<input name="amountString" value="<?= $amountString ?>" />
<label for="currency">currency</label>
<input name="currency" value="<?= $_POST['currency'] ?>" />
<label for="authMode">authMode</label>
<input name="authMode" value="<?= $_POST['authMode'] ?>" />
<label for="testMode">testMode</label>
<input name="testMode" value="<?= $_POST['testMode'] ?>" />
<label for="name">name - required</label>
<input name="name" value="<?= $_POST['name'] ?>" />
<label for="address1">address1 - required</label>
<input name="address1" value="<?= $_POST['address1'] ?>" />
<label for="address2">address2</label>
<input name="address2" value="<?= $_POST['address2'] ?>" />
<label for="address3">address3</label>
<input name="address3" value="<?= $_POST['address3'] ?>" />
<label for="town">town</label>
<input name="town" value="<?= $_POST['town'] ?>" />
<label for="region">region</label>
<input name="region" value="<?= $_POST['region'] ?>" />
<label for="postcode">postcode</label>
<input name="postcode" value="<?= $_POST['postcode'] ?>" />
<label for="country">country</label>
<input name="country" value="<?= $_POST['country'] ?>" />
<label for="countryString">countryString</label>
<input name="countryString" value="<?= $_POST['country'] ?>" />
<label for="tel">tel</label>
<input name="tel" value="<?= $_POST['tel'] ?>" />
<label for="fax">fax</label>
<input name="fax" value="<?= $_POST['fax'] ?>" />
<label for="email">email</label>
<input name="email" value="<?= $_POST['email'] ?>" />

<?php

// Show delivery fields if we recieve the correct array key
if( array_key_exists('withDelivery', $_POST) ){

?>
<label for="delvName">delvName</label>
<input name="delvName" value="<?= $_POST['delvName'] ?>" />
<label for="delvAddress1">delvAddress1</label>
<input name="delvAddress1" value="<?= $_POST['delvAddress1'] ?>" />
<label for="delvAddress2">address2</label>
<input name="delvAddress2" value="<?= $_POST['delvAddress2'] ?>" />
<label for="delvAddress3">delvAddress3</label>
<input name="delvAddress3" value="<?= $_POST['delvAddress3'] ?>" />
<label for="delvTown">delvTown</label>
<input name="delvTown" value="<?= $_POST['delvTown'] ?>" />
<label for="delvRegion">delvRegion</label>
<input name="delvRegion" value="<?= $_POST['delvRegion'] ?>" />
<label for="delvPostcode">delvPostcode</label>
<input name="delvPostcode" value="<?= $_POST['delvPostcode'] ?>" />
<label for="delvCountry">delvCountry</label>
<input name="delvCountry" value="<?= $_POST['delvCountry'] ?>" />
<label for="delvCountryString">delvCountryString</label>
<input name="delvCountryString" value="<?= $_POST['delvCountry'] ?>" />
<?php

}

?>

<label for="compName">compName</label>
<input name="compName" value="<?= $_POST['compName'] ?>" />

<h2>Transaction Results</h2>

<label for="transId">transId - Generated by WorldPay Tester</label>
<input name="transId" value="<?= $id ?>" />
<label for="transStatus">transStatus</label>
<select name="transStatus">
	<option value="Y">Y - Successful Payment</option>
	<option value="C">C - Cancelled Payment</option>
</select>
<label for="transTime">transTime</label>
<input name="transTime" value="<?= time() ?>" />
<label for="authAmount">authAmount</label>
<input name="authAmount" value="<?= $_POST['amount'] ?>" />
<label for="authCurrency">authCurrency</label>
<input name="authCurrency" value="<?= $_POST['currency'] ?>" />
<label for="authAmountString">authAmountString</label>
<input name="authAmountString" value="<?= $amountString ?>" />
<label for="rawAuthMessage">rawAuthMessage</label>
<select name="rawAuthMessage">
	<option value="cardbe.msg.authorised">Make Payment</option>
	<option value="trans.cancelled">Cancel Purchase</option>
</select>
<label for="AVS">AVS</label>
<input name="AVS" value="<?= $_POST['AVS'] ?>" />
<label for="ip">ip</label>
<input name="ip" value="<?= $ip ?>" />
</body>