<?php
	@session_start();
	include_once('../include/config.php');

if(!isset($_SESSION['client']))
		{
?>
<script type="text/javascript">

	window.location.href="../signin.php";

</script>	
	
		
<?php		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
<script src="<?php echo base_url;?>Old_Include_Js/person-makingvali.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function() {

	$('#othermethoddiv').hide();
	$('#other_relation_details_div').hide();
	
    $("input[name$='payment_methods']").click(function() {
        var test = $(this).val();
		
		if(test == 'other_payments')
		{
			$('#othermethoddiv').show();
		}
		else
		{
			$('#othermethoddiv').hide();
		}
        
    });
	
	
	$("input[name$='realtions']").click(function() {
        var test = $(this).val();
		
		if(test == 'other_relation')
		{
			$('#other_relation_details_div').show();
		}
		else
		{
			$('#other_relation_details_div').hide();
		}
        
    });
	
	
	
	
	
});
</script>

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
require('../lib/eWAY/RapidAPI.php');

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
        $request->Payment->TotalAmount ='5900';
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
    if ($_POST['ddlSandbox']) $eway_params['sandbox'] = false;
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
        if ($_SESSION['eWAY_sandbox']) $eway_params['sandbox'] = false;
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
<link href="../eway/assets/Styles/Site.css" rel="stylesheet" type="text/css" />
<link href="../eway/assets/Styles/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css" />
<script src="../eway/assets/Scripts/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="../eway/assets/Scripts/jquery-ui-1.8.11.custom.min.js" type="text/javascript"></script>
<script src="../eway/assets/Scripts/jquery.ui.datepicker-en-GB.js" type="text/javascript"></script>
<script type="text/javascript" src="../eway/assets/Scripts/tooltip.js"></script>

</head>


<body>

<?php include "../include/header.php"; ?>		
<title>eziFunerals</title><body>
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
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">EZIFUNERALS DIRECT PLAN</font>	
    </div>
	</div>
</div>
<div class="gridContainer clearfix"><br /><br /><br />
	<div id="LayoutDiv1">
		<div id="wrapper">
				<div id="container" style="height:auto !important"><br /><br /><br /><br />
					<div class="container">
						<div class="login_wrapper" style="border:2px solid #c2c2c2; margin-bottom:80px;  padding: 0px 11px; height:auto;width:100%; background:none repeat scroll 0 0 #f7f7f7;border-radius: 10px;padding: 20px;">
						
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


$dir = dirname(__FILE__);
	
	$sql = mysql_query("SELECT * FROM  person_making_arangements WHERE client_id = '".$_SESSION['client']."' ");	
	$rows = @mysql_num_rows($sql);	
	$person = @mysql_fetch_assoc($sql);	
	
	$decsql = mysql_query("SELECT * FROM deceased WHERE person_making_id = '".$_SESSION['client']."' ");	
	$decrows = @mysql_num_rows($decsql);	
	$deceased = @mysql_fetch_assoc($decsql);
	
	$commsql = mysql_query("SELECT * FROM committal WHERE person_making_id = '".$_SESSION['client']."' ");	
	$commrows = @mysql_num_rows($commsql);	
	$committal = @mysql_fetch_assoc($commsql);
	
	$servsql = mysql_query("SELECT * FROM funeral_service_details WHERE person_making_id = '".$_SESSION['client']."' ");	
	$servrows = @mysql_num_rows($servsql);	
	$service = @mysql_fetch_assoc($servsql);
	
	
	$bearersql = mysql_query("SELECT * FROM desicision_funeral_bearer WHERE person_making_id = '".$_SESSION['client']."' ");
	$bearerows = @mysql_num_rows($bearersql);
	
	
	$funnsql = mysql_query("SELECT * FROM after_funeral WHERE person_making_id = '".$_SESSION['client']."' ");	
	$funrows = @mysql_num_rows($funnsql);	
	$funeral = @mysql_fetch_assoc($funnsql);	
	
	
	
	
	$clientsql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."' ";
	$clientex = mysql_query($clientsql);
	
	$clientsresult = mysql_fetch_assoc($clientex);
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
	
		require_once('tcpdf_include.php');
	
		
		class MYPDF extends TCPDF {

		public function Header() {
			if($this->page != 1){

			// Logo
			$image_file = base_url.'images/header-new.jpg';
			$this->Image($image_file, 15, '', '180', '20', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, true);
			    // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
			// Set font
			$this->SetFont('helvetica', 'B', 20);
			// Title
			//$this->Cell(0, 15, 'At Need Plan', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			}
		}
	
		// Page footer
		public function Footer() {
			if($this->page != 1){

			// Position at 15 mm from bottom
			$this->SetY(-20);
			// Set font
			//$this->SetFont('helvetica', 'I', 8);
			$image_file = base_url.'images/footer-new.jpg';
			$this->Image($image_file, 15, '', '180', '20', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
			// Page number
			$this->SetFont('helvetica', 'B', 20);
			//$this->Cell(0, 10, 'All Rights Reserved', 0, false, 'C', 0, '', 0, false, 'T', 'M');
			}
		}
	}
	
	// create new PDF document
	$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	
	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('EziFuneral');
	$pdf->SetTitle('TCPDF Example 003');
	$pdf->SetSubject('At Need Plan');
	$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
	
	// set default header data
	$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
	//$pdf->SetFooterData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
	
	// set header and footer fonts
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	
	// set default monospaced font
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	
	// set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	
	//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	
	$pdf->SetHeaderMargin(0);
	$pdf->SetFooterMargin(0);
	
	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	
	// set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
	
	// set some language-dependent strings (optional)
	if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
		require_once(dirname(__FILE__).'/lang/eng.php');
		$pdf->setLanguageArray($l);
	}
	
	// ---------------------------------------------------------
        
	
	// set font
	$pdf->SetFont('times', 'BI', 12);
	
	// add a page
	$pdf->AddPage();
		
		//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);
		
		$pdf->SetFont('helvetica', '', 11);
		
		$htmlcode = '<table  cellpadding="6" >
						<tr>
						<td style="text-align:center;width:635px; height:344px;"><img src="'.base_url.'images/firstpage.jpg"></td>
						</tr>
						<tr><td></td></tr>
						<tr>
						<td colspan="3" style="color:#06ADB6; font-weight:bold;font-size:34px;text-align:center;width:635px;"><center>MY FUNERAL PLAN<center/></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6b6e70;font-size:32px; text-align:center;width:635px;"><center>'.$deceased['f_name'].' '.$deceased['m_name'].' '.$deceased['l_name'].'<center/></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6c6d70;font-size:22px;text-align:center;"><center>'.$deceased['dod'].'<center/></td>
						</tr>
						<tr>
						<td style="height:100px;"></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:15px; text-align:center;width:635px;"><div style="width:735px;; background-color:#06bbce; padding:20px!important; opacity:2;"></div></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:15px; text-align:center; padding:0;"></td>
						</tr>
						<tr><td></td></tr><tr><td></td></tr>		
						<tr><td></td></tr>	
                        <tr><td></td></tr>                      
                        <tr><td style="float:left!important; color: #06ADB6; font-size:30px!important; width:100%!important;"><b>PERSON MAKING ARRANGEMENTS</b></td></tr>
                                             
                        <tr>
						<td colspan="3" style="text-align:left!important; color: #06ADB6; float:left!important; font-size:15px!important; width:100%!important; opacity:2;"><div style="width:100%; padding:13px!important; opacity:2;"><b>My Personal Details</b></div></td>
						</tr>
						<tr>
						<td width="25%">Name</td>
						<td width="3%">:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$person['f_name'].' '.$person['m_name'].' '.$person['l_name'].'</td>
						</tr>
						<tr>
						<td>Address</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$person['address1'].' '.$person['address2'].'</td>
						</tr>
						<tr>
						<td>Suburb</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['suburb']).'</td>
						</tr>
						<tr>
						<td>Country / State / Province 	</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['state']).'</td>
						</tr>
						<tr>
						<td>Postcode / Zip</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['postcode']).'</td>
						</tr>
						<tr>
						<td>Phone</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['telephone']).'</td>
						</tr>
						<tr>
						<td>Mobile</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['mobile']).'</td>
						</tr>
						<tr>
						<td>Email</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$person['email'].'</td>
						</tr>
						<tr>
						<td>Relationship to the deceased</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['realtions']).'</td>
						</tr>
						<tr>
						<td>Funeral Budget</td>
						<td>:</td>
						<td  width="70%" style="border-bottom:1px solid #000;">'.$person['budget'].'</td>
						</tr>
						<tr>	
						<td>Method Of Funeral Payment</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($person['payment_methods']).'</td>
					    </tr>
						<tr>
						<td colspan="3" style="height:50px;"></td>
						</tr>
						<tr>
						<td colspan="3" >I certify that I have the authority to organise the funeral arrangements listed in this plan
						  </td>
						</tr>
						<tr>
						<td>Date</td>
						<td>:</td>
						<td width="70%">'.$person['date'].'</td>
						</tr>	 
						<tr><td colspan="3" style="height:30px;"></td></tr>
						
						
						<tr>
						<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
						</tr>
                                                 
                                               <tr><td></td></tr>
											     <tr><td></td></tr>
						<tr><td></td></tr>
                                                <tr><td></td></tr>
						<tr><td></td></tr>
                                                <tr><td></td></tr>
						<tr><td></td></tr>
                                                <tr><td></td></tr>
                                                
                                                <tr><td style="height: 50px; text-align:left!important; color: #06ADB6; float:left!important; font-size:30px!important; width:100%!important; opacity:2;"><div style="width:100%; padding:20px!important; opacity:2;"><b>DETAILS OF DECEASED</b></div></td></tr>
                                               
                                                
		
						<tr>
						<td width="25%">Name</td>
						<td width="3%">:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['f_name'].' '.$deceased['m_name'].' '.$deceased['l_name'].'</td>
						</tr>
						<tr>
						<td>Address</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['address1'].' '.$deceased['address2'].'</td>
						</tr>
						<tr>
						<td>Suburb</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['suburb']).'</td>
						</tr>
						<tr>
						<td>Country / State / Province 	</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['state']).'</td>
						</tr>
						<tr>
						<td>Postcode / Zip</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['postcode']).'</td>
						</tr>
						<tr>
						<td>Gender</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['gender']).'</td>
						</tr>
						<tr>
						<td>Age</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['age'].'</td>
						</tr>
						<tr>
						<td>Height</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['height'].'</td>
						</tr>
						<tr>
						<td>Weight</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['weight'].'</td>
						</tr>
						<tr>
						<td>Date Of Birth</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['dob'].'</td>
						</tr>
						<tr>
						<td>Place Of Birth</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['pob'].'</td>
						</tr>
						<tr>
						<td>Country Of Birth</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['cob'].'</td>
						</tr>
						<tr>
						<td>Date Of Death</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['dod'].'</td>
						</tr>
						<tr>
						<td>Time Of Death</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['tod'].'</td>
						</tr>
						<tr>
						<td>Place Of Death</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['place_of_death'].'</td>
						</tr>
						<tr>
						<td>Place where deceased is currently resting: </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['deceased_resting']).'</td>
						</tr>
						<tr>
						<td>Medical Certificate of Cause of Death issued: </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['medical_certificate']).'</td>
						</tr>';
						if($deceased['medical_certificate'] == 'yes')
						{
							$doctorhtml = '<tr>
									<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Doctors Details</td>
									</tr>
									<tr>
									<td>Name</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_f_name'].' '.$deceased['doc_m_name'].' '.$deceased['doc_l_name'].'</td>
									</tr>
									<tr>
									<td>Address</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_address1'].' '.$deceased['doc_address2'].'</td>
									</tr>
									<tr>
									<td>Suburb</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['doc_suburb']).'</td>
									</tr>
									<tr>
									<td>Country / State / Province</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['doc_state']).'</td>
									</tr>
									<tr>
									<td>Postcode / Zip 	</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_postcode'].'</td>
									</tr>
									<tr>
									<td>Phone</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_telephone'].'</td>
									</tr>
									<tr>
									<td>Mobile</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_mobile'].'</td>
									</tr>
									<tr>
									<td>Email</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['doc_email'].'</td>
									</tr>';
						}
						
						$htmlcode .= $doctorhtml.'<tr>
						<td>Is the deceased person registered as an organ donor? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['organ_donar']).'</td>
						</tr>';
						if($deceased['organ_donar'] == 'yes')
						{
							$organrhtml = '';
						}
						
						$htmlcode .= $organrhtml.'<tr>
						<td>Does the deceased person have a pre-paid Funeral Plan? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['is_pre_paid']).'</td>
						</tr>';
						if($deceased['is_pre_paid'] == 'yes')
						{
							$prepaidhtml = '<tr>
									<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Director Details</td>
									</tr>									
									<tr>
									<td>Business Name</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['business_name']).'</td>
									</tr>
									<tr>
									<td>Address</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['business_address1'].' '.$deceased['business_address2'].'</td>
									</tr>
									<tr>
									<td>Suburb</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['business_suburb']).'</td>
									</tr>
									<tr>
									<td>Country / State / Province</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($deceased['business_state']).'</td>
									</tr>
									<tr>
									<td>Postcode / Zip</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['business_postcode'].'</td>
									</tr>
									<tr>
									<td>Phone</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['business_telephone'].'</td>
									</tr>
									<tr>
									<td>Mobile</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['business_mobile'].'</td>
									</tr>
									<tr>
									<td>Email</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.$deceased['business_email'].'</td>
									</tr><tr>
									<td></td></tr>';
						}
						//<tcpdf method="AddPage" />color: #06ADB6; float:left!important; font-size:30px!important;
						$htmlcode .= $prepaidhtml.'<tcpdf method="AddPage" />
						<tr><td style="height: 40px; text-align:left!important; color: #06ADB6; float:left!important; font-size:30px!important; width:100%!important; opacity:2;">    
							<div style="width:100%; padding:20px!important; opacity:2;"><b>DETAILS OF COMMITTAL</b></div></td></tr>
						<tr>
						<td width="25%">How would you like the deceased to be laid to rest?</td>
						<td width="3%">:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['laid_to_rest']).'</td>
						</tr>';
						if($committal['laid_to_rest'] == 'burial')
						{
						
							$burialhtml ='<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Burial details </td>
							</tr>
							<tr>
							<td>Will the deceased be buried in a new grave or an existing grave?</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['burried_in']).'</td>
							</tr>';
							if($committal['burried_in'] == 'new grave')
							{
								$burialhtml .= '<tr>
									<td>Name of Cemetery</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['name_cemetery']).'</td>
									</tr>
									<tr>
									<td>City</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['cemetery_city']).'</td>
									</tr>
									<tr>
									<td>State</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['cemetery_state']).'</td>
									</tr>
									<tr>
									<td>Do you have a preferred section of the cemetery? </td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['is_preferred_section']).'</td>
									</tr>';
									
									if($committal['is_preferred_section'] == 'yes')
									{
										$burialhtml .= '<tr>
									<td>Cemetery Area </td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['cemetery_area']).'</td>
									</tr>
									<tr>
									<td>Section</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['cemetery_section']).'</td>
									</tr>
									<tr>
									<td>Number</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['cemetery_number']).'</td>
									</tr><tr>
									<td></td></tr>
									';
									}
															
							}
							else
							{
								$burialhtml .= '<tr>
								<td colspan="3" style="color:#000; text-align:left; font-weight:bold;font-size:12px;">If the deceased is being buried in an existing grave, provide details of cemetery: </td>
								</tr>
								<tr>
								<td>Name and address of cemetery </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['existing_grave_addr']).'</td>
								</tr>
								<tr>
								<td>State the grave number </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['grave_number']).'</td>
								</tr>
								<tr>
								<td>Where are the grave deeds located? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['grave_location']).'</td>
								</tr>
								';
							}
							
						}
						elseif($committal['laid_to_rest'] == 'cremation')
						{
							$burialhtml = '<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Cremation details </td>
							</tr>
							<tr>
							<td>Name of Crematorium </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['crematorium_name']).'</td>
							</tr>
							<tr>
							<td>City</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['crematorium_city']).'</td>
							</tr>
							<tr>
							<td>State</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['crematorium_state']).'</td>
							</tr>
							<tr>
							';
						}
						elseif($committal['laid_to_rest'] == 'entombment')
						{
							$burialhtml = '<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Entombment details</td>
							</tr>
							<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Which mausoleum do you wish the deceased to be entombed? </td>
							</tr>
							<tr>
							<td>Name of Mausoleum </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['mausoleum_name']).'</td>
							</tr>
							<tr>
							<td>City</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['mausoleum_city']).'</td>
							</tr>
							<tr>
							<td>State</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($committal['mausoleum_state']).'</td>
							</tr>
							
                                                        
							';
						}
						$htmlcode .= $burialhtml.'';
						
						//<tcpdf method="AddPage" />color: #06ADB6; float:left!important; font-size:30px!important;
						$htmlcode .= '<tcpdf method="AddPage" />
                                                    <tr><td></td></tr>
                                                    
                                                        <tr>
						<td colspan="3" style="height: 30px; text-align:left!important; color: #06ADB6; float:left!important; font-size:30px!important; width:100%!important; padding:10px!important; opacity:2;"><div style="width:100%; padding:20px!important; opacity:2;"><b>DETAILS OF FUNERAL SERVICE</b></div></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Date And Time Of Service</td>
						</tr>
						<tr>
						<td width="25%">Do you have a preferred day for the service?</td>
						<td width="3%">:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$service['day_of_service'].'</td>
						</tr>
						<tr>
						<td>Do you have a preferred date for the service?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.$service['date_service1'].'</td>
						</tr>
						<tr>
						<td>Do you have a preferred time for the service?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['time_of_service']).'</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Details Of Funeral Service</td>
						</tr>
						<tr>
						<td>How many people do you estimate may attend the service?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['num_of_people']).'</td>
						</tr>	
						<tr>
						<td>Would you prefer a private or public funeral? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_type']).'</td>
						</tr>
						<tr>
						<td>Do you require a single or double service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_service']).'</td>
						</tr>
						<tr>
						<td>Where would you like the funeral service to be held? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_place']).'</td>
						</tr>
						<tr><td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Religion</td></tr>
						<tr>
						<td>Do you require a religious or non-religious service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_status']).'</td>
						</tr>';
						if($service['funeral_status'] == 'religious')
						{
						$htmlcode .= '<tr>
						<td>Name of religion/spiritual belief/philosophy</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_religion']).'</td>
						</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Viewings and Rosaries</td>
						</tr>
						<tr>
						<td>Will you require a viewing or rosary?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_type']).'</td>
						</tr>';
						if($service['rosary_type'] != 'neither')
						{
							$htmlcode .= '<tr>
								<td>Do you require it to be private or public? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_type']).'</td>
								</tr>
								<tr>
								<td>Where would you like the viewing or rosary to be held? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_place']).'</td>
								</tr>
								<tr>
								<td>Do you have a preferred day and time for the viewing or rosary? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_day']).'</td>
								</tr>	
								<tr>
								<td>How many people do you estimate may attend the viewing or rosary?</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_num_people']).'</td>
								</tr>
								<tr>
								<td>Will you require the body to be dressed in special clothing and jewellery for the viewing or rosary?</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['rosary_jewellary']).'</td>
								</tr>
								<tr>
								<td>Special items of clothing or jewellery to be provided:</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['num_of_jewellary']).'</td>
								</tr>';
						}
						
						$htmlcode .='<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Embalming</td>
						</tr>
						<tr>
						<td>Do you require the body to be embalmed? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['embalmed_body']).'</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Coffin Casket</td>
						</tr>
						<tr>
						<td>What type of coffin or casket do you require?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['casket_type_category']).'</td>
						</tr>
						<tr>
						<td>Budget</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['casket_type_name']).'</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Minister Or Celebrant</td>
						</tr>
						<tr>
						<td>Do you have a minister, celebrant or person in mind to perform the service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['service_performer']).'</td>
						</tr>';
						if($service['service_performer'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>Name</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['service_performer_name']).'</td>
								</tr>
								<tr>
								<td>Email</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.$service['service_performer_email'].'</td>
								</tr>
								<tr>
								<td>Phone</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.$service['service_performer_phone'].'</td>
								</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Eulogy</td>
						</tr>
						<tr>
						<td>Do you require a eulogy at the service about the deceased persons life? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['eulogy_service']).'</td>
						</tr>
						
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Special Readings</td>
						</tr>
						<tr>
						<td>Will you require any special readings to be read at the funeral service ? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_special_readings']).'</td>
						</tr>';
						if($service['funeral_special_readings'] == 'yes')
						{
							$htmlcode .= '<tr>
							<td>Name of person/s to deliver the reading </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['eulogy_service_persons']).'</td>
							</tr>
							<tr>
							<td>Listen or poems to be read </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['eulogy_service_poems']).'</td>
							</tr>';
						}
						$htmlcode .='<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Notices</td>
						</tr>
						<tr>
						<td>Do you require the funeral director to organise the funeral notices in the main newspaper? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_notice']).'</td>
						</tr>';
						if($service['funeral_notice'] == 'yes')
						{
							$htmlcode .= '<tr>
							<td>Name of newspaper </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_newspaper']).'</td>
							</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Transport</td>
						</tr>
						<tr>
						<td>How do you want the body to be transported?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_transport']).'</td>
						</tr>
						<tr>
						<td>Do you require limousines or mourning cars for the immediate family? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_transport_material']).'</td>
						</tr>';
						if($service['funeral_transport_material'] == 'yes')
						{
							$htmlcode .= '<tr>
									<td>How many seats will you require?</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_seats']).'</td>
									</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">What transport requirements do you require to and from the funeral service?</td>
						</tr>
						<tr>
						<td>Pick Up Location </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_location_to']).'</td>
						</tr>
						<tr>
						<td>Return location</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_location_from']).'</td>
						</tr>
						<tr>
						<td>Special requests: (colour/special routes, etc) </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_special_request']).'</td>
						</tr>
						<tr><td></td></tr>
						<tr>
						<td>Do you require a funeral cortege? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_cortege']).'</td>
						</tr>
                                                
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Floral arrangements</td>
						</tr>
						<tr>
						<td>Do you require floral arrangements at the funeral? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['floral_arrangement']).'</td>
						</tr>';
						
						if($service['floral_arrangement'] == 'yes')
						{
							$htmlcode .= '<tr>
									<td>What type of floral arrangements do you require</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['floral_type']).'</td>
									</tr>';
						}
						
						$htmlcode  .='<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Donations</td>
						</tr>
						<tr>
						<td>Would you prefer donations at the funeral service in lieu of flowers?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_donation']).'</td>
						</tr>';
						if($service['funeral_donation'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>Name of organisation  </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['donation_organisation']).'</td>
								</tr>';
						}
						
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Stationery</td>
						</tr>
						<tr>
						<td>Do you require funeral stationery during the service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_stationary']).'</td>
						</tr>';
						
						if($service['funeral_stationary'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>What type of funeral stationery do you require </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['stationary_type']).'</td>
								</tr>';
						}
						
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Music</td>
						</tr>
						<tr>
						<td>Do you require music at the funeral?</td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['is_music']).'</td>
						</tr>';
						
						if($service['is_music'] == 'yes')
						{
							$htmlcode .= '<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">What music would you like played at the funeral service?</td>
							</tr>
							<tr>
							<td>Music entering: (Song/artist)</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_music_enter']).'</td>
							</tr>
							<tr>
							<td>Music during: (Song/artist)</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_music_mid']).'</td>
							</tr>
							<tr>
							<td>Music leaving: Song/artist)</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_music_enter_leave']).'</td>
							</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Musician and Singers</td>
						</tr>
						<tr>
						<td>Will you be having a musician or singer perform at the funeral service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_musician']).'</td>
						</tr>';
						if($service['funeral_musician'] == 'yes')
						{
							$htmlcode .= '<tr>
							<td>Name</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['singer_name']).'</td>
							</tr>
							<tr>
							<td>Email</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['singer_email']).'</td>
							</tr>
							<tr>
							<td>Phone</td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['singer_phone']).'</td>
							</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Media Tributes</td>
						</tr>
						<tr>
						<td>Will you require any media/DVD tribute during the funeral service ? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_media']).'</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Pall Bearers</td>
						</tr>
						<tr>
						<td>Would you prefer family/friend bearers OR bearers provided by a funeral director? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_bearer']).'</td>
						</tr>';
                                                
						if($service['funeral_bearer'] == 'family/friend')
						{
							$htmlcode .= '';
								
							while($bearer = mysql_fetch_assoc($bearersql))
							{
								$htmlcode .= '<tr>
								<td>Name</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($bearer['bearer_name']).'</td>
								</tr>
								<tr>
								<td>Relationship</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($bearer['bearer_relationship']).'</td>
								</tr>
								<tr>
								<td>Sex</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($bearer['bearer_sex']).'</td>
								</tr>
								';
							}
								
						}
							
						$htmlcode .= '<tr>
							<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Releases </td>
							</tr>
							<tr>
							<td>Do you require a special funeral release during the service? </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_release']).'</td>
							</tr>';
						if($service['funeral_release'] == 'yes')
						{
							$htmlcode .= '<tr>
							<td>What type of funeral release do you require? </td>
							<td>:</td>
							<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_release_type']).'</td>
							</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Refreshments </td>
						</tr>	
						<tr>
						<td>Will you require refreshments at the venue immediately after the funeral service? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['funeral_refreshment']).'</td>
						</tr>';
						
						if($service['funeral_refreshment'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>What type of menu will you require? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['refreshment_menu']).'</td>
								</tr>
								<tr>
								<td>Estimated number of people to be catered for</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['refreshment_people']).'</td>
								</tr>';
						}
						$htmlcode .= '<tr>
						<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Other Special Requests</td>
						</tr>	
						<tr>
						<td>Do you require any other special arrangements? </td>
						<td>:</td>
						<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['other_funeral_request']).'</td>
						</tr><tr>
									<td></td></tr>';
						if($service['other_funeral_request'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>Details of special arrangements</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['request_description']).'</td>
								</tr>';
						}
						//<tcpdf method="AddPage" />color: #06ADB6; float:left!important; font-size:30px!important;
						$htmlcode .= ' <tcpdf method="AddPage" />     <tr>
								<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
								</tr>  
								<tr>                     
								<td colspan="3" style="height: 50px; text-align:left!important; color: #06ADB6; float:left!important; font-size:30px!important; width:100%!important; opacity:2;"><div style="width:100%; opacity:2;"><b>AFTER THE FUNERAL</b></div></td>
								</tr>
								<tr>
								<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Funeral Wake</td>
								</tr>
								<tr>
								<td width="25%">Do you intend holding a wake after the funeral service?</td>
								<td width="3%">:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['is_wake']).'</td>
								</tr>';
								if($funeral['is_wake'] == 'yes')
								{
									$htmlcode .= '<tr>
										<td>Details of wake</td>
										<td>:</td>
										<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['wake']).'</td>
										</tr>';
								}
								
								$htmlcode .= '<tr>
								<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Collection Of Ashes</td>
								</tr>
								<tr>
								<td>After cremation, how would you like the cremated remains to be collected? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['cremated_collected']).'</td>
								</tr>
								<tr><td colspan="3" style="font-weight:bold;font-size:14px;">Urn or Casket</td></tr>
								<tr>
								<td>Do you require an urn or casket for the cremated remains? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['is_urn']).'</td>
								</tr>';
								if($funeral['is_urn'] == 'yes')
								{
									$htmlcode .= '<tr>
											<td>Type of Urn or Casket</td>
											<td>:</td>
											<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['cremin_type']).'</td>
											</tr>';
								}
								
								$htmlcode .='<tr>
								<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Special Requests</td>
								</tr>	
								<tr>
								<td>Do you have any special requests for the ashes? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['is_special_request']).'</td>
								</tr>';
								
								if($funeral['is_special_request'] == 'yes')
								{
									$htmlcode .= '<tr>
									<td>Details of special request</td>
									<td>:</td>
									<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['special_request']).'</td>
									</tr>';
								}
								
								$htmlcode .= '<tr>
								<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Memorials</td>
								</tr>
								<tr>
								<td>Do you require any form of memorial after cremation?</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['is_memorial']).'</td>
								</tr>';
								if($funeral['is_memorial'] == 'yes')
								{
									$htmlcode .= '<tr>
											<td>Details of memorial</td>
											<td>:</td>
											<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['memorial']).'</td>
											</tr>';
								}
								$htmlcode .= '<tr>
								<td>Do you a preferred stonemason to supply and fix the memorial? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['is_stonemason']).'</td>
								</tr>
								<tr>
								<td>What would you like written on the memorial (inscription)? </td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($funeral['written']).'</td>
								</tr>
								<tr><td></td></tr>
                                                                <tr><td></td></tr>
                                                                <tr><td></td></tr>
                                                                <tr><td></td></tr>
                                                                <tr><td></td></tr><tr><td></td></tr>
								<tr>
                                                                <td colspan="3" style="height: 50px; text-align:left!important; color: #06ADB6; float:left!important; font-size:30px!important;  width:100%!important; opacity:2;"><div style="width:100%; padding:10px; opacity:2;"><b style="padding:10px 10px 10px 10px!important; float:left!important;">Notes</b></div></td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;"></td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								<tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
                                                                <tr>
								<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
								</tr>
								
								<tr><td></td></tr>
								<tr><td colspan="3">&copy; 2014 EziFunerals Pty Ltd.All Rights Reserved.</td></tr>
								<tr><td colspan="3" style="font-size:12px;">The eziFunerals Logo and Cradle2grave mark are registered trademarks of EziFunerals Pty Ltd.<br />
No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of EziFunerals Pty Ltd.</td></tr>
								<tr><td colspan="3" style="font-size:12px;">The eziFunerals Logo and Cradle2grave mark are registered trademarks of EziFunerals Pty Ltd.<br />
No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of EziFunerals Pty Ltd.</td></tr>
								<tr><td colspan="3"><span style="font-size:22px;">eziFunerals</span><br/>
AUSTRALIA’S LARGEST FUNERAL MARKETPLACE<br/>
Telephone +612.9119.2283<br/> Email support@ezifunerals.com.au<br/>
www.ezifunerals.com.au</td></tr>';
						$htmlcode .= '</table>';
		
					//echo $htmlcode;
			
			
						$pdf->writeHTML($htmlcode, true, false, false, false, '');
	
	
	
	
					// -----------------------------------------------------------------------------
					
					//Close and output PDF document
			//echo 	$_SERVER['DOCUMENT_ROOT'];			
				
				//define('ATNEED','http://greencubes.co.in/Projects/EZI/atneed/');
				//define('ATNEED','EZI/atneed/');
				//$path =$_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/form_pdf/'.$_SESSION['client'];   
					
			 //	$filename = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/form_pdf/".$_SESSION['client']. "/";
			
			 //	$path1 = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/form_pdf/".$_SESSION['client'];
					
					if (!file_exists($filename)) {
				
				
							mkdir('Pdf_Uploads',0777);
				
						//mkdir('$path',0777);		
					}
					
						//$unique = rand();
						
						$unique = $_SESSION['client'];
							
				       $pdfname = $clientsresult['first_name'].'_myfuneral_At_need_plan_'.$unique.'.pdf';
						//$url=base_url;
						
						//$pdfdoc=$pdf->Output('Pdf_Uploads'.'/'.$pdfname, 'F');
					
						$pdfdoc=$pdf->Output('Pdf_Uploads'.'/'.$pdfname, 'F');
					
					
					//$pdf->Output($path.'/'.$pdfname, 'F');
		
			
			
			
			
			
			
			
				/*$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/form_pdf/'.$_SESSION['client'];
					
				$filename = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/form_pdf/".$_SESSION['client']. "/";
		
				$path1 = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/form_pdf/".$_SESSION['client'];
				
				if (!file_exists($filename)) {
					mkdir($path1, 0777);		
				}
				
				$unique = rand();
				
				$pdfname = $clientsresult['first_name'].'_advance_'.$unique.'.pdf';
				
				$pdf->Output($path.'/'.$pdfname, 'F');*/
	
		
		// Load the SwiftMailer files
		//require_once('../atneed/swift/swift_required.php');
		
		//$email = 'peter@ezifunerals.com.au';
		$email = $clientsresult['email'];
		
		$name = $clientsresult['first_name'];
		
		
		
		require_once('your-funeral-plan-is-ready.php');
		
		
			
		
		$ordersql = "INSERT
					INTO
						client_purchase_info
						(
							client_id,
							order_id,
							order_info,
							order_amount,
							reg_amount,
							response_code,
							transcation_no,
							receipt_no,
							card_type,
							pdf_type,
							token_no,
							pdf_name					
						)
					VALUES
						(
							'".$_SESSION['client']."',
							'".$receipt."',
							'".$message."',
							'".$amount."',
							'".$reg_amount."',
							'".$response_code."',
							'".$txn."',
							'".$receipt."',
							'".$card."',
							'At Need Plan',
							'".$token_no."',
							'".$pdfname."'
						)
						
					";
	
			mysql_query($ordersql);
			
			
			//upgrade plan for client
			
		$up="UPDATE `clients` SET plan='2' where id='".$_SESSION['client']."'";
			
			$rel=mysql_query($up);
			
			//invoice send to client.................................
			
		
			
			
		
		@$sel_paln="select * from clients where email='".$email."'";
		
		@$rel_plan=mysql_query($sel_paln);
		
		@$row_of_plan=mysql_fetch_array($rel_plan);
		
		
		@$sel_city="select * from cities where city_id='".$row_of_plan['city']."'";
		
		@$rel_city=mysql_query($sel_city);
		
		@$row_of_city=mysql_fetch_array($rel_city);
		
			
		include('../invoice_client.php');
		
			
			
	}
	else
	{
		$ordersql = "INSERT
					INTO
						client_purchase_info
						(
							client_id,
							order_id,
							order_info,
							order_amount,
							reg_amount,
							response_code,
							transcation_no,
							receipt_no,
							card_type,
							token_no,
							pdf_type						
						)
					VALUES
						(
							'".$_SESSION['client']."',
							'".$receipt."',
							'".$message."',
							'".$amount."',
							'".$reg_amount."',
							'".$response_code."',
							'".$txn."',
							'".$receipt."',
							'".$card."',
							'".$token_no."',
							'At Need Plan'
						)
						
					";
	
		mysql_query($ordersql);
		
	}
	
	
	
	
?>	
 <?php
								if($message == 'Approved')
									{
										
							
						?>
						
<script type="text/javascript">


 	window.location.href="thankyou.php";
          
              
</script>			  
              <!--<div style="width:855px; background-color:#00a3b4; padding:10px; text-align:center">
              <p style="font-size:30px; color:#fff;">Thank You...!</p>
            </div>
            <div style="width:750px; padding:10px;">
              <p style="font-size:26px; margin-top:10px;"></p>
              <br />
             
              <p style="font-size:16px; line-height:22px;">Your Payment Process has been completed successfully.
              
              </p>
              <p style="font-size:16px; line-height:22px;">Your Transaction Number is <?php echo $receipt;?>.
              
              <p/>
              <p style="font-size:16px; line-height:22px;">Please keep your transaction number for your records.
              
              </p>
              <p style="font-size:16px; line-height:22px;">Your personal funeral plan has been sent to you together with links to your FREE resources.</p>
              <p style="font-size:16px; line-height:22px;">Please check your email for details.</p>
			   <br />
            </div>-->
           
    
																
						<?php
										
									}
									else
									{
						?>
													<span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important; color: #444444;float: left;font-weight: bold;font-size: 22px; margin: 5px; margin-top: 10px;margin-bottom: 10px;width: 100%;">Your Payment was Unsuccessful.</span><br/>
												    <span class="verify_subtitle" style="font-family: Arial, Helvetica, sans-serif !important; color: #444444;float: left;font-weight: bold;font-size: 22px; margin: 5px; margin-top: 10px;margin-bottom: 10px;width: 100%;">Please Try Again....!</span><br/>
													<a href="preview-new-nextpop.php" style="font-size:18px;">Back</a>
						<?php
									}
						?>	   
		   
            <?php } ?>			
			
		<div id="raw">
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; white-space: nowrap;"> <?php echo $service->getLastUrl(); ?><br>
                <pre id="request_dump"></pre>
              </div>
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; white-space: nowrap;">
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
	  

		
            <div id="maincontent">
<div id="eWAYBlock" style="margin-left: -90px;">
    <div style="text-align:center;">
        <a href="https://www.eway.com.au/secure-site-seal?i=12&s=15&pid=56a57d19-fe71-491c-ad1f-c164a7666460&theme=1" title="eWAY Payment Gateway" target="_blank" rel="nofollow">
            <img alt="eWAY Payment Gateway" src="https://www.eway.com.au/developer/payment-code/verified-seal.ashx?img=12&size=15&pid=56a57d19-fe71-491c-ad1f-c164a7666460&theme=1" />
        </a>
    </div>
</div>			
			
			
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
                      <label for="EWAY_CARDISSUENUMBER" > Issue Number</label>
                      <input type='text' name='EWAY_CARDISSUENUMBER' id='EWAY_CARDISSUENUMBER' value="" maxlength="2" style="width:40px;"/>
                      <!-- This field is optional but highly recommended -->
                    </div>
                    <div class="fields">
                      <label for="EWAY_CARDCVN"> CVN</label>
                      <input type='text' name='EWAY_CARDCVN' id='EWAY_CARDCVN' value="" maxlength="4" style="width:40px;"/>
                      <!-- This field is optional but highly recommended -->
                    </div>
                 
                  <br/> <br/>
				 
                  	  <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="login_button" />
                	
                </div>
				 </div>
              </form>
            </div>
			
          	
         
            
            <div id="raw">
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; white-space: nowrap;"> <?php echo $service->getLastUrl(); ?><br>
                <pre id="request_dump"></pre>
              </div>
              <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; white-space: nowrap;">
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
                <input id="APIKey" name="APIKey" type="text" value="44DD7ALLytTzdO6LHTDDzzA4QWaCcksRC4BFN4LtR7qjCJ7+DPAfFbXVtF6sbq4aroZvLS" /> <!--live api-->
			   <!--<input id="APIKey" name="APIKey" type="text" value="A1001C0o8YXMzE7+HTb60JZlnEfDKESoiMN0gzqLeFrPuZHff45sPhJlRcdkZ2Nw1wK3iq" /> --> <!--sendbox api-->
              </div>
			  
              <div class="fields"  style="display:none;">
                <label for="APIPassword">API Password</label>
                  <input id="APIPassword" name="APIPassword" type="password" value="QKXfazhg" />  <!--live api password -->
				<!-- <input id="APIPassword" name="APIPassword" type="password" value="gPAAeHv5" /> --><!--send api password -->
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
<?php 
				$data_of_client=mysql_query("select * from clients where id='".$_SESSION['client']."'");
				$result_of_client_data=mysql_fetch_array($data_of_client);
?>                
				
               
                <div class="fields"  style="display:none;">
                  <label for="txtFirstName">First Name</label>
                  <input id="txtFirstName" name="txtFirstName" type="text" value="<?php echo $result_of_client_data['first_name'];?>" />
                </div>
				
                <div class="fields"  style="display:none;">
                  <label for="txtLastName">Last Name</label>
                  <input id="txtLastName" name="txtLastName" type="text" value="<?php echo $result_of_client_data['last_name'];?>" />
                </div>
               
                <div class="fields"  style="display:none;">
                  <label for="txtCountry">Country</label>
                  <input id="txtCountry" name="txtCountry" type="text" value="au" maxlength="2" />
                </div>
                <div class="fields"  style="display:none;">
                  <label for="txtEmail">Email</label>
                  <input id="txtEmail" name="txtEmail" type="text" value="<?php echo $result_of_client_data['email'];?>" />
                </div>
          
                <div class="fields"  style="display:none;">
                  <label for="ddlTransactionType">Transaction Type</label>
                  <select id="ddlTransactionType" name="ddlTransactionType" style="width:140px;">
                    <option value="Recurring">Recurring</option>
                  </select>
                </div>
				
              </div>	
			
			
<br/><br/>

					<center><p style="font-size:30px;">OUR FEE</p></center>
					<br/><br/>
        
		<div class="container">              
                            <p  style="width:auto; margin-bottom:5px;font-size:16px;font-weight:normal !important"><span style="text-transform:none;">Our fee for producing your Funeral Plan will be <strong>$59.</strong></span></p>
                            <p  style="width:auto;margin-bottom:5px;font-size:16px;font-weight:normal !important">You'll need to pay our fee by credit card before we can send your Funeral Plan. We will include a tax invoice for your payment .</p>
                            <p  style="width:auto;margin-bottom:5px;font-size:16px;font-weight:normal !important">Please now click the <span style="text-transform:none;">'Proceed to Payment' </span>button below to enter your credit card details.</p><p style="margin-bottom:5px;font-size:16px;font-weight:normal !important">

Please also note that, at this point, you can still close this window, to go back and check or change any answer you have given. Once you click the <span style="text-transform:none;">'Proceed to Payment'</span> button, and enter your credit card details, you'll no longer be able to do this.</p>
<p><span style="font-weight:bold; font-style:italic;margin-bottom:5px;font-size:16px;"> If you need to check or change anything, please do so now.</span></p>
                 </div>    
            <!--start mpd-form-->
           
            	<br/><br/>
            	<center>
               <input type="submit" value="Proceed To Payment" id="btnSubmit" name="btnSubmit" class="redirect_signup login_button" style="width:200px; text-align:center; border-radius:15px;"/> 
                
            	</center>
				<br/><br/>
            </form>
		
            <!--end mpd-form-->
     		
<?php

    } // for if ($in_page === 'view_result') {
?>
											
										</div>
					  </div>  
					</div>         
				</div>
		</div>
	</div>
</div>
<?php include("../include/footer.php"); ?>  

</body>
</html>
