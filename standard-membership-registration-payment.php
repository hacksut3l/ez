<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
		if(!isset($_SESSION['client']))
		{
?>
<script type="text/javascript">

	window.location.href="signin.php";

</script>	
	
		
<?php		
}

?>
<?php
/**
 * Example eWAY Rapid 3.1 Transparent Redirect
 *
 * This page demonstrates how to use eWAY's Rapid 3.1 API
 * to complete a tranasaction using the Transparent Redirect.
 *
 * THIS SCRIPT IS INTENDED AS AN EXAMPLE ONLY
 *
 * @see https://eway.io/api-v3/#transparent-redirect
 */


// Include RapidAPI Library
require('lib/eWAY/RapidAPI.php');

$data=mysql_query("select * from directors where id='".$_SESSION['client']."'");
$row=mysql_fetch_array($data);

$in_page = 'before_submit';
if ( isset($_POST['btnSubmit']) ) {

    // we skip all validation but you should do it in real world

    // Create DirectPayment Request Object
    $request = new eWAY\CreateAccessCodeRequest();

    // Populate values for Customer Object
    // Note: TokenCustomerID is required when updating an exsiting TokenCustomer
    if(!empty($_POST['txtTokenCustomerID'])) {
        $request->Customer->TokenCustomerID = $_POST['txtTokenCustomerID'];
    }


   
      $request->Customer->FirstName = $_POST['txtFirstName'];
    $request->Customer->LastName = $_POST['txtLastName'];
    $request->Customer->Country = $_POST['txtCountry'];
	$request->Customer->Email = $_POST['txtEmail'];
   

    // Populate values for ShippingAddress Object.
    // This values can be taken from a Form POST as well. Now is just some dummy data.
   $request->ShippingAddress->FirstName =$_POST['txtFirstName'];
    $request->ShippingAddress->LastName = $_POST['txtLastName'];
    $request->ShippingAddress->Country =  $_POST['txtCountry'];
	$request->ShippingAddress->Email =  $_POST['txtEmail'];
  
    // ShippingMethod, e.g. "LowCost", "International", "Military". Check the spec for available values.
    $request->ShippingAddress->ShippingMethod = "LowCost";

    if ($_POST['ddlMethod'] == 'ProcessPayment' || $_POST['ddlMethod'] == 'Authorise' || $_POST['ddlMethod'] == 'TokenPayment') {
        // Populate values for LineItems
        $item1 = new eWAY\LineItem();
        $item1->SKU = "SKU1";
        $item1->Description = "Description1";
        $item2 = new eWAY\LineItem();
        $item2->SKU = "SKU2";
        $item2->Description = "Description2";
        $request->Items->LineItem[0] = $item1;
        $request->Items->LineItem[1] = $item2;

        // Populate values for Payment Object
        $request->Payment->TotalAmount = '7900';
       // $request->Payment->InvoiceNumber = $_POST['txtInvoiceNumber'];
        
        $request->Payment->InvoiceReference = $_POST['txtInvoiceReference'];
        $request->Payment->CurrencyCode = $_POST['txtCurrencyCode'];
    }

    // Populate values for Options (not needed since it's in one script)
   
    // Build redirect URL
    $self_url = 'http';
    if (!empty($_SERVER['HTTPS'])) {$self_url .= "s";}
    $self_url .= "://" . $_SERVER["SERVER_NAME"];
    if ($_SERVER["SERVER_PORT"] != "80") {
        $self_url .= ":".$_SERVER["SERVER_PORT"];
    }
    $self_url .= $_SERVER["REQUEST_URI"];

    $request->RedirectUrl = $self_url;
    $request->Method = $_POST['ddlMethod'];
    $request->TransactionType = $_POST['ddlTransactionType'];

    // Call RapidAPI
    $eway_params = array();
    if ($_POST['ddlSandbox']) $eway_params['sandbox'] = true;
    $service = new eWAY\RapidAPI($_POST['APIKey'], $_POST['APIPassword'], $eway_params);
    $result = $service->CreateAccessCode($request);

    // Check if any error returns
    if(isset($result->Errors)) {
        // Get Error Messages from Error Code.
        $ErrorArray = explode(",", $result->Errors);
        $lblError = "";
        foreach ( $ErrorArray as $error ) {
            $error = $service->getMessage($error);
            $lblError .= $error . "<br />\n";
        }
    } else {
        $_SESSION['eWAY_key'] = $_POST['APIKey'];
        $_SESSION['eWAY_password'] = $_POST['APIPassword'];
        $_SESSION['eWAY_sandbox'] = $_POST['ddlSandbox'];

        $in_page = 'payment_page';
    }
}

if ( isset($_GET['AccessCode']) ) {
    $AccessCode = $_GET['AccessCode'];

    // should be somewhere from config instead of SESSION
    if ($_SESSION['eWAY_key'] && $_SESSION['eWAY_password']) {
        // Call RapidAPI
        $eway_params = array();
        if ($_SESSION['eWAY_sandbox']) $eway_params['sandbox'] = true;
        $service = new eWAY\RapidAPI($_SESSION['eWAY_key'], $_SESSION['eWAY_password'], $eway_params);

        $request = new eWAY\GetAccessCodeResultRequest();
        $request->AccessCode = $AccessCode;
        $result = $service->GetAccessCodeResult($request);

        $in_page = 'view_result';
        if (isset($result->Errors)) {
            $ErrorArray = explode(",", $result->Errors);
            $lblError = "";
            foreach ( $ErrorArray as $error ) {
                $error = $service->getMessage($error);
                $lblError .= $error . "<br />\n";
            }
        }
    }
}

?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<link href="eway/assets/Styles/Site.css" rel="stylesheet" type="text/css" />
<link href="eway/assets/Styles/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css" />
<script src="eway/assets/Scripts/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="eway/assets/Scripts/jquery-ui-1.8.11.custom.min.js" type="text/javascript"></script>
<script src="eway/assets/Scripts/jquery.ui.datepicker-en-GB.js" type="text/javascript"></script>
<script type="text/javascript" src="eway/assets/Scripts/tooltip.js"></script>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral</title>
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/Old_Include_Js/respond.min.js"></script>
</head>
<body>
<script type='text/javascript'><!--
			$(document).ready(function() {
				enableSelectBoxes();
				
				$('#free_next_frm').submit(function()
				{
					
					if ($("#terms").is(':checked') == true) {
						return true;
					}
					else {
						alert("Please accept terms and conditions");
						return false;
					}
					
				});
				
				
				
			});
			
			
			
			
			function enableSelectBoxes(){
				$('div.selectBox1').each(function(){
					$(this).children('span.selected1').html($(this).children('div.selectOptions1').children('span.selectOption1:first1').html());
					$(this).attr('value',$(this).children('div.selectOptions1').children('span.selectOption1:first1').attr('value'));
					
					$(this).children('span.selected1,span.selectArrow1').click(function(){
						if($(this).parent().children('div.selectOptions1').css('display') == 'none'){
							$(this).parent().children('div.selectOptions1').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions1').css('display','none');
						}
					});
					
					$(this).find('span.selectOption1').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox1').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected1').html($(this).html());
					});
				});				
			}//-->
		</script>
<?php include "include/main_header.php"; ?>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<div class="punch_text_02 funral_director_heading">
  <div class="container">
    <div align="left"> <font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Funeral Director Standard Membership Plan</font> </div>
  </div>
</div>
<div class="gridContainer clearfix"><br />
  <br />
  <div id="LayoutDiv1">
    <div id="wrapper">
      <div id="container">
        <div class="container">
          <div class="login_wrapper" style="border:2px solid #c2c2c2;margin-bottom:45px;">
            <?php
    if ($in_page === 'view_result') {
?>
            <?php
        if (isset($lblError)) {
    ?>
            <div id="error">
              <label style="color:red"><?php echo $lblError ?></label>
            </div>
            <?php } else { ?>
            <?php

		$sel="select * from directors where id='".$_SESSION['client']."'";
		$rel=mysql_query($sel);
		$row=mysql_fetch_array($rel);
	
		$query = "SELECT * FROM directors WHERE email ='".$row['email']."'";

 
		$queryex = mysql_query($query);
		
		$result1 = mysql_fetch_assoc($queryex);
		
		$date = date("Y-m-d H:i:s",time());

                    if (isset($result->TotalAmount)) {
                      $amount = $result->TotalAmount;
                 	  $reg_amount=number_format($amount/100, 2);
                    }
					
					if (isset($result->TransactionStatus) && $result->TransactionStatus && (is_bool($result->TransactionStatus) || $result->TransactionStatus != "false")) {
                     $message='Approved';
                    } else {
                      $message='Declined';
                    }
					
					$receipt=isset($result->AuthorisationCode) ? $result->AuthorisationCode:"";
					
					if (isset($result->TransactionID)) {
                            
							$txn=$result->TransactionID;
                    }
					
					$response_code=$result->ResponseCode;
					
					  if (isset($result->TokenCustomerID)) {
                     
					     $token_no=$result->TokenCustomerID;
                    }
					$card='MC';
					
					
                
   if($message == 'Approved')
	{
	
		 $ordersql = "INSERT
					INTO
						director_member_info
						(
							director_id,
							order_id,
							order_info,
							order_amount,
							reg_amount,
							response_code,
							transcation_no,
							receipt_no,
							token_no,
							card_type,
							d_date
						)
					VALUES
						(
							'".$result1['id']."',
							'".$receipt."',
							'".$message."',
							'".$amount."',
							'".$reg_amount."',
							'".$response_code."',
							'".$txn."',
							'".$receipt."',
							'".$token_no."',
							'".$card."',
							'".$date."'
						)
						
					";
		
                
	mysql_query($ordersql);
	
	
		
		
		
		//fetch plan for send mail................
		
		@$sel_paln="select * from directors where id='".$_SESSION['client']."'";
		
		@$rel_plan=mysql_query($sel_paln);
		
		@$row_of_plan=mysql_fetch_array($rel_plan);
		
		$email=$row_of_plan['email'];
		include "./MailConfig.php";
		include 'invoice.php';
	
	$payment_status=mysql_query("UPDATE `directors` SET `payment_status`='active' where id='".$_SESSION['client']."'");
	
							
											
						?>
        			 <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;"><b>Payment Successful!</b></span>
					<span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;"><a href="director_dashboard.php">Click here</a> to Go to your Dashbord and Complete your Profile</span>
            <?php
							
											
	}
	else
	{
		 $ordersql = "INSERT
					INTO
						director_member_info
						(
							director_id,
							order_id,
							order_info,
							order_amount,
							reg_amount,
							response_code,
							transcation_no,
							receipt_no,
							token_no,
							card_type,
							d_date
						)
					VALUES
						(
							'".$result1['id']."',
							'".$receipt."',
							'".$message."',
							'".$amount."',
							'".$reg_amount."',
							'".$response_code."',
							'".$txn."',
							'".$receipt."',
							'".$token_no."',
							'".$card."',
							'".$date."'
						)
						
					";
		
                
		mysql_query($ordersql);
		
?>
            <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;">Your Payment was Unsuccessful.</span>
		<span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;">Please Try Again....!</span>
           <span class="verify_subtitle"  style="font-family: Arial, Helvetica, sans-serif !important;"><a href="standard-membership-registration-payment.php" style="font-size:24px !important;">Back</a></span>
            <?php
		
		
	}
	
	
	
	
?>
            <?php } ?>
            <div id="raw">
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;"> <?php echo $service->getLastUrl(); ?><br>
                <pre id="request_dump"></pre>
              </div>
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;">
                <pre id="response_dump"></pre>
              </div>
            </div>
            <script>
            jQuery('#raw').hide();
            // no body for GetAccessCodeResult
            var response_dump = JSON.stringify(JSON.parse('<?php echo $service->getLastResponse(); ?>'), null, 4); 
            jQuery('#response_dump').html(response_dump);
            
            jQuery( "#showraw" ).click(function() {     
                if(jQuery('#raw:visible').length)
                    jQuery('#raw').hide();
                else
                    jQuery('#raw').show();        
            });
         </script>
            <div id="maincontentbottom"> </div>
            <?php
    } else if ($in_page == 'payment_page') { // else if ($in_page === 'view_result') {
?>
            <div id="eWAYBlock">
              <div style="text-align:center;"> <a href="https://www.eway.com.au/secure-site-seal?i=12&s=15&pid=56a57d19-fe71-491c-ad1f-c164a7666460&theme=1" title="eWAY Payment Gateway" target="_blank" rel="nofollow"> <img alt="eWAY Payment Gateway" src="https://www.eway.com.au/developer/payment-code/verified-seal.ashx?img=12&size=15&pid=56a57d19-fe71-491c-ad1f-c164a7666460&theme=1" /> </a> </div>
            </div>
            <div id="maincontent">
              <form method="POST" action="<?php echo $result->FormActionURL ?>" id="form1">
                <input type='hidden' name='EWAY_ACCESSCODE' value="<?php echo $result->AccessCode ?>" />
                <style>
    .options li { display: inline-block; padding:10px 0; clear: both; }
    .options img { margin-left:10px; top:10px; }
    </style>
                <div id="paymentoption">
                  <div class="transactioncustomer">
                    <div class="header"> Customer Card Details </div>
                    <div class="fields">
                      <label for="EWAY_CARDNAME"> Card Holder</label>
                      <input type='text' name='EWAY_CARDNAME' id='EWAY_CARDNAME' value="" />
                    </div>
                    <div class="fields">
                      <label for="EWAY_CARDNUMBER"> Card Number</label>
                      <input type='text' name='EWAY_CARDNUMBER' id='EWAY_CARDNUMBER' value="" />
                    </div>
                    <div class="fields">
                      <label for="EWAY_CARDEXPIRYMONTH"> Expiry Date</label>
                      <select ID="EWAY_CARDEXPIRYMONTH" name="EWAY_CARDEXPIRYMONTH">
                        <?php
                        $expiry_month = date('m');
                        for($i = 1; $i <= 12; $i++) {
                            $s = sprintf('%02d', $i);
                            echo "<option value='$s'";
                            if ( $expiry_month == $i ) {
                                echo " selected='selected'";
                            }
                            echo ">$s</option>\n";
                        }
                    ?>
                      </select>
                      /
                      <select ID="EWAY_CARDEXPIRYYEAR" name="EWAY_CARDEXPIRYYEAR">
                        <?php
                        $i = date("y");
                        $j = $i+11;
                        for ($i; $i <= $j; $i++) {
                            echo "<option value='$i'>$i</option>\n";
                        }
                    ?>
                      </select>
                    </div>
                    <!-- <div class="fields">
                      <label for="EWAY_CARDSTARTMONTH"> Valid From Date</label>
                      <select ID="EWAY_CARDSTARTMONTH" name="EWAY_CARDSTARTMONTH">
                        <?php
                        $expiry_month = "";//date('m');
                        echo  "<option></option>";

                        for($i = 1; $i <= 12; $i++) {
                            $s = sprintf('%02d', $i);
                            echo "<option value='$s'";
                            if ( $expiry_month == $i ) {
                                echo " selected='selected'";
                            }
                            echo ">$s</option>\n";
                        }
                    ?>
                      </select>
                      /
                      <select ID="EWAY_CARDSTARTYEAR" name="EWAY_CARDSTARTYEAR">
                        <?php
                        $i = date("y");
                        $j = $i-11;
                        echo  "<option></option>";
                        for ($i; $i >= $j; $i--) {
                            $year = sprintf('%02d', $i);
                            echo "<option value='$year'>$year</option>\n";
                        }
                    ?>
                      </select>
                    </div>-->
                    <div class="fields" style="display:none">
                      <label for="EWAY_CARDISSUENUMBER"> Issue Number</label>
                      <input type='text' name='EWAY_CARDISSUENUMBER' id='EWAY_CARDISSUENUMBER' value="" maxlength="2" style="width:40px;"/>
                      <!-- This field is optional but highly recommended -->
                    </div>
                    <div class="fields">
                      <label for="EWAY_CARDCVN"> CVN</label>
                      <input type='text' name='EWAY_CARDCVN' id='EWAY_CARDCVN' value="" maxlength="4" style="width:40px;"/>
                      <!-- This field is optional but highly recommended -->
                    </div>
                    <br/>
                    <br/>
                    <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="login_button" />
                  </div>
                </div>
              </form>
            </div>
            <div id="raw">
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;"> <?php echo $service->getLastUrl(); ?><br>
                <pre id="request_dump"></pre>
              </div>
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;">
                <pre id="response_dump"></pre>
              </div>
            </div>
            <script>
        jQuery('#raw').hide();
        var request_dump = JSON.stringify(JSON.parse('<?php echo $service->getLastRequest(); ?>'), null, 4); 
        jQuery('#request_dump').html(request_dump);
        var response_dump = JSON.stringify(JSON.parse('<?php echo $service->getLastResponse(); ?>'), null, 4); 
        jQuery('#response_dump').html(response_dump);

        jQuery( "#showraw" ).click(function() {     
            if(jQuery('#raw:visible').length)
                jQuery('#raw').hide();
            else
                jQuery('#raw').show();        
        });
     </script>
            <div id="maincontentbottom"> </div>
            <?php
    } else { // for if ($in_page === 'view_result') {
		
		if($row['payment_status']=='pending')	
			{
	
	
?>
            <?php
    if (isset($lblError)) {
?>
            <div id="error">
              <label style="color:red"><?php echo $lblError ?></label>
            </div>
            <?php } ?>
            <form method="POST" id="free_next_frm">
              <div class="fields"  style="display:none;">
                <label for="APIKey">API Key</label>
                   <input id="APIKey" name="APIKey" type="text" value="44DD7ALLytTzdO6LHTDDzzA4QWaCcksRC4BFN4LtR7qjCJ7+DPAfFbXVtF6sbq4aroZvLS" />  <!--live api-->
			<!-- <input id="APIKey" name="APIKey" type="text" value="60CF3CjeMWGd1PhhE/Swr1/tFyW4svGO7FA3GKUPQ+eTzqWrdt8gWkY8ZCfQpwVoxqQqPL" />-->   <!-- sendbox api-->
              </div>
              <div class="fields"  style="display:none;">
                <label for="APIPassword">API Password</label>
                  <input id="APIPassword" name="APIPassword" type="password" value="QKXfazhg" />  <!--live api password -->
				 <!--<input id="APIPassword" name="APIPassword" type="password" value="Green123/*-" />--> <!--send api password -->
              </div>
              <div class="fields"  style="display:none;">
                <label for="ddlSandbox">API Sandbox</label>
                <select id="ddlSandbox" name="ddlSandbox">
                  <option value="1" >Yes</option>
                  <option value="" selected="selected">No</option>
                </select>
              </div>
              <div class="fields"  style="display:none;">
                <label for="ddlMethod">Payment Method</label>
                <select id="ddlMethod" name="ddlMethod" style="width: 140px" onChange="onMethodChange(this.options[this.options.selectedIndex].value)">
                  <option value="TokenPayment" selected="selected">TokenPayment</option>
                </select>
              </div>
              <script>
                function onMethodChange(v) {
                    if (v == 'ProcessPayment' || v == 'Authorise' || v == 'TokenPayment') {
                        jQuery('#payment_details').show();
                    } else {
                        jQuery('#payment_details').hide();
                    }
                }
            </script>
              <div id='payment_details'>
                <div class="fields"  style="display:none;">
                  <label for="txtCurrencyCode">Currency Code </label>
                  <input id="txtCurrencyCode" name="txtCurrencyCode" type="text" value="AUD" />
                </div>
                <!--<div class="fields">
                  <label for="txtInvoiceNumber">Invoice Number</label>
                  <input id="txtInvoiceNumber" name="txtInvoiceNumber" type="text" value="Inv 21540" />
                </div>-->
                <div class="fields"  style="display:none;">
                  <label for="txtInvoiceReference">Invoice Reference</label>
                  <input id="txtInvoiceReference" name="txtInvoiceReference" type="text" value="513456" />
                </div>
                <!-- end for <div id='payment_details'> -->
                <!-- <div class="fields">
                  <label for="txtTokenCustomerID">Token Customer ID &nbsp;</label>
                  <input id="txtTokenCustomerID" name="txtTokenCustomerID" type="text" />
                </div>-->
                <div class="fields"  style="display:none;">
                  <label for="txtFirstName">First Name</label>
                  <input id="txtFirstName" name="txtFirstName" type="text" value="<?php echo $row['full_name'];?>" />
                </div>
                <div class="fields"  style="display:none;">
                  <label for="txtLastName">Last Name</label>
                  <input id="txtLastName" name="txtLastName" type="text" value="<?php echo $row['business_name'];?>" />
                </div>
                <div class="fields"  style="display:none;">
                  <label for="txtCountry">Country</label>
                  <input id="txtCountry" name="txtCountry" type="text" value="au" maxlength="2" />
                </div>
                <div class="fields"  style="display:none;">
                  <label for="txtEmail">Email</label>
                  <input id="txtEmail" name="txtEmail" type="text" value="<?php echo $_SESSION['free_email']; ?>" />
                </div>
                <div class="fields"  style="display:none;">
                  <label for="ddlTransactionType">Transaction Type</label>
                  <select id="ddlTransactionType" name="ddlTransactionType" style="width:140px;">
                    <option value="Recurring">Recurring</option>
                  </select>
                </div>
              </div>
              <span class="login_head director_heading" style="font-size:32px;">Standard Membership Application <span class="step">Step 2 of 2</span></span>
              <!--<p>Complete this form in order to register your funeral business on <a href="#">EziFunerals.com.au</a>. 
                
                After receiving your information, we'll contact you to confirm details and finish the sign-up process. 
                
                If you have any questions, please email us at <a href="mailto:peter@ezifunerals.com.au">peter@ezifunerals.com.au</a> </p>-->
              <div class="left_reg_form_next"> <span class="fields_wrapp marginTop"> <span class="reg_name ename">Below fee will immediately be charged to your credit card, and will be charged each and subsequent month that you continue your membership as a Standard Member. When eziFunerals provides you with a pre-qualified lead (which includes the individual’s full name, email address, phone number, and funeral details) an additional $49 per lead is what you agree to be charged per lead provided, tallied at the end of each calendar month for all leads provided.</span> </span>
                <?php
											//echo $dir = dirname(__FILE__);exit;
											require_once('atneed/swift/swift_required.php');
											
											
											
										
										
											/*if(isset($_POST['submit']))
											{
												
												$random_number = rand().time();
												
												$link = base_url.'confirm.php?id='.$random_number;
												
												$email = $_COOKIE["free_email"];
												
												$sql = "UPDATE 
															directors 
														SET 
															email_confirm = '".$random_number."' 
														WHERE 
															email = '".$email."'
														";
														
												mysql_query($sql);
												
												$name = 'Peter';
												
												$mailer = new Swift_Mailer(new Swift_MailTransport()); // Create new instance of SwiftMailer
												
												$html_message = $link;
						
												$message = Swift_Message::newInstance()
															   ->setSubject('Standard Membership Registration Confirmation link') // Message subject
															   ->setTo(array($email => $name)) // Array of people to send to
															   ->setFrom(array('peter@ezifunerals.com.au' => 'EziFuneral')) // From:
															   ->setBody($html_message, 'text/html');// Attach that HTML message from earlier
															   
												
												// Send the email, and show user message
												if ($mailer->send($message))
													header('Location:account-verification.php');
												else
													$error = true;
											}*/
											
											//$merchtxnref = substr(number_format(time() * rand(),0,'',''),0,10);
											
										?>
                <span class="fields_wrapp marginTop tablr_bor">
                <table width="100%" border="0">
                  <tr>
                    <td width="50%" class="reg_table_title">Description</td>
                    <td class="reg_table_title">Amount</td>
                  </tr>
                  <tr>
                    <td class="reg_table_text">Per Month Fee</td>
                    <td class="reg_table_text">$79.00</td>
                  </tr>
                  <tr>
                    <td class="reg_table_text"><strong>Total Due Today</strong></td>
                    <td class="reg_table_text"><strong>$79.00</strong></td>
                  </tr>
                </table>
                </span> <span class="fields_wrapp marginTop">
                <label class="login_checkbox">
                <input class="check" id="terms" type="checkbox">
                I accept the <a href="<?php echo base_url;?>page/terms-of-use" target="_blank">Terms and Conditions</a> </label>
                </span> </div>
              <span style="width:100%; float:left; margin-top:10px;">
              <input type="submit" id="btnSubmit" name="btnSubmit" value="Place My Order"  class="login_button" style="width:135px;"/>
              </span>
			  
<?php }else
			{
	?>		
				 <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important;">You have already paid.</span>

			
	<?php	
			}

	 ?>			  
			  
            </form>
            <?php
    } // for if ($in_page === 'view_result') {
?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Custom File Type-->
<script type="text/javascript">
;(function( $ ) {

  // Browser supports HTML5 multiple file?
  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
      isIE = /msie/i.test( navigator.userAgent );

  $.fn.customFile = function() {

    return this.each(function() {

      var $file = $(this).addClass('customfile'), // the original file input
          $wrap = $('<div class="customfile-wrap">'),
          $input = $('<input type="text" class="customfile-filename" />'),
          // Button that will be used in non-IE browsers
          $button = $('<button type="button" class="customfile-upload">BROWSE</button>'),
          // Hack for IE
          $label = $('<label class="customfile-upload" for="'+ $file[0].id +'">Open</label>');

      // Hide by shifting to the left so we
      // can still trigger events
      $file.css({
        position: 'absolute',
        left: '-9999px'
      });

      $wrap.insertAfter( $file )
        .append( $file, $input, ( isIE ? $label : $button ) );

      // Prevent focus
      $file.attr('tabIndex', -1);
      $button.attr('tabIndex', -1);

      $button.click(function () {
        $file.focus().click(); // Open dialog
      });

      $file.change(function() {

        var files = [], fileArr, filename;

        // If multiple is supported then extract
        // all filenames from the file array
        if ( multipleSupport ) {
          fileArr = $file[0].files;
          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
            files.push( fileArr[i].name );
          }
          filename = files.join(', ');

        // If not supported then just take the value
        // and remove the path to just show the filename
        } else {
          filename = $file.val().split('\\').pop();
        }

        $input.val( filename ) // Set the value
          .attr('title', filename) // Show filename in title tootlip
          .focus(); // Regain focus

      });

      $input.on({
        blur: function() { $file.trigger('blur'); },
        keydown: function( e ) {
          if ( e.which === 13 ) { // Enter
            if ( !isIE ) { $file.trigger('click'); }
          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
            // On some browsers the value is read-only
            // with this trick we remove the old input and add
            // a clean clone with all the original events attached
            $file.replaceWith( $file = $file.clone( true ) );
            $file.trigger('change');
            $input.val('');
          } else if ( e.which === 9 ){ // TAB
            return;
          } else { // All other keys
            return false;
          }
        }
      });

    });

  };

  // Old browser fallback
  if ( !multipleSupport ) {
    $( document ).on('change', 'input.customfile', function() {

      var $this = $(this),
          // Create a unique ID so we
          // can attach the label to the input
          uniqId = 'customfile_'+ (new Date()).getTime(),
          $wrap = $this.parent(),

          // Filter empty input
          $inputs = $wrap.siblings().find('.customfile-filename')
            .filter(function(){ return !this.value }),

          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

      // 1ms timeout so it runs after all other events
      // that modify the value have triggered
      setTimeout(function() {
        // Add a new input
        if ( $this.val() ) {
          // Check for empty fields to prevent
          // creating new inputs when changing files
          if ( !$inputs.length ) {
            $wrap.after( $file );
            $file.customFile();
          }
        // Remove and reorganize inputs
        } else {
          $inputs.parent().remove();
          // Move the input so it's always last on the list
          $wrap.appendTo( $wrap.parent() );
          $wrap.find('input').focus();
        }
      }, 1);

    });
  }

}( jQuery ));

$('input[type=file]').customFile();
</script>
<!--Custom File Type-->
<?php include "include/main_footer.php"; ?>
</body>
</html>
