<?php

	$SECURE_SECRET = "DF1DC9A9BC4819A267F20C8E2383E7BB";
		
		$vpcURL = $_POST["virtualPaymentClientURL"] . "?";
		
		unset($_POST["virtualPaymentClientURL"]); 
		unset($_POST["SubButL"]);
		
		//$_POST['AgainLink']=urlencode($HTTP_REFERER);
		
		$md5HashData = $SECURE_SECRET;
		ksort ($_POST);
		
		$appendAmp = 0;

		foreach($_POST as $key => $value) {
		
			// create the md5 input and URL leaving out any fields that have no value
			if (strlen($value) > 0) {
				
				// this ensures the first paramter of the URL is preceded by the '?' char
				if ($appendAmp == 0) {
					$vpcURL .= urlencode($key) . '=' . urlencode($value);
					$appendAmp = 1;
				} else {
					$vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
				}
				$md5HashData .= $value;
			}
		}
		
		if (strlen($SECURE_SECRET) > 0) {
			$vpcURL .= "&vpc_SecureHash=" . strtoupper(md5($md5HashData));
		}
		
		header("Location: ".$vpcURL);

?>