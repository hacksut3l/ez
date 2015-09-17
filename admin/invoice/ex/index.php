<?php
/**
 * Example eWAY Rapid 3.1 Direct Payment
 *
 * This page demonstrates how to use eWAY's Rapid 3.1 API
 * to complete a direct connection payment.
 * Please note, since the data is sent via your server, either
 * eWAY needs to be provided with evidence of PCI compliance or
 * client side encryption needs to be implemented.
 *
 * THIS SCRIPT IS INTENDED AS AN EXAMPLE ONLY
 *
 * @see https://eway.io/api-v3/#direct-connection
 */

session_start();
include_once('../../config.php');
 include "../../MailConfig3.php";

require_once('tcpdf_include.php');
// Include RapidAPI Library
require('eWAY/RapidAPI.php');

$in_page = 'before_submit';

//Payment data submitted
if ( isset($_POST['btnSubmit']) ) {


    $request->Customer->FirstName = $_POST['txtFirstName'];
    $request->Customer->LastName = $_POST['txtLastName'];
    $request->Customer->Country = $_POST['txtCountry'];

    // Populate values for ShippingAddress Object.
    // This values can be taken from a Form POST as well. Now is just some dummy data.
    $request->ShippingAddress->FirstName = "John";
    $request->ShippingAddress->LastName = "Doe";
    $request->ShippingAddress->Country = "gb";
	
 class MYPDF extends TCPDF {

			public function Header() {
				// Logo
				//$image_file = base_url.'images/logo.png';
				$this->Image($image_file, 15, 5, 40, '20', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
				// Set font
				$this->SetFont('helvetica', 'B', 20);
				// Title
				//$this->Cell(0, 15, 'At Need Plan', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			}
		
			// Page footer
			public function Footer() {
				// Position at 15 mm from bottom
				$this->SetY(-15);
				// Set font
				$this->SetFont('helvetica', 'I', 8);
				// Page number
				$this->Cell(0, 10, 'All Rights Reserved', 0, false, 'C', 0, '', 0, false, 'T', 'M');
			}
		}
		
	
	$a_date = date('Y-m-d');
	$last= date("Y-m-t", strtotime($a_date));
	$first=date("Y-m-01", strtotime($a_date));	
 	 $sel="select DISTINCT directors.id,directors.full_name,lead_invoice.req_date,directors.state,directors.city,directors.business_type,directors.business_name,directors.address,directors.user_type,directors.address,directors.email from directors INNER JOIN lead_invoice ON lead_invoice.req_to=directors.id AND lead_invoice.req_date BETWEEN '".$first."' AND '".$last."'";
 
 $rel=mysql_query($sel);
 
 $currentdate=date('d-m-y');
 //$charge = 50;
 while($row=mysql_fetch_array($rel))
 {

// we skip all validation but you should do it in real world

    // Create DirectPayment Request Object
    $request = new eWAY\CreateDirectPaymentRequest();

    // Populate values for Customer Object
    // Note: TokenCustomerID is required when update an exsiting TokenCustomer
	"select * from director_member_info where director_id='".$row['id']."'";
	$tokren_fetch=mysql_fetch_array(mysql_query("select * from director_member_info where director_id='".$row['id']."'"));	
	
  
 			   $request->Customer->TokenCustomerID = $tokren_fetch['token_no'];
  
	
		$invoice_no = rand();
 
 		if($row['user_type']==1)
		{
			$charge = 99;
			$type='Free';
		}
		if($row['user_type']==2)
		{
			$charge = 49;
			$type='Standard';
		}
		if($row['user_type']==3)
		{
			$charge = 29;
			$type='Premium';
		}
		
		
		$dir_email=$row['email'];
		$name=$row['business_name'];
		 		
		$seldata="SELECT * FROM invite WHERE invite_to = '".$row['id']."'";
		$result1=mysql_query($seldata);
		$count=mysql_num_rows($result1);
		
		
		$state=mysql_query("select * from states where state_id='".$row['state']."'");
		$row_state=mysql_fetch_array($state);
		
		if($count!=0)
		{
		
			$charge1=$count*$charge;
			
		}

    $clientsql = "SELECT first_name FROM clients WHERE id = '".$row_client['invite_from']."' LIMIT 1  ";
    $clientex = mysql_query($clientsql);

    $client = mysql_fetch_assoc($clientex);

    $invite_date = explode('-',$row_client['date']);
    $invite_date = $invite_date[2].'/'.$invite_date[1].'/'.$invite_date[0];

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
        $request->Payment->TotalAmount = $charge1.'00';
        $request->Payment->InvoiceNumber = $invoice_no;
        $request->Payment->CurrencyCode = $_POST['txtCurrencyCode'];
    }
	 	
	  $request->Method = $_POST['ddlMethod'];
    $request->TransactionType = $_POST['ddlTransactionType'];

    // Call RapidAPI
    $eway_params = array();
    if ($_POST['ddlSandbox']) {
        $eway_params['sandbox'] = true;
    }
    $service = new eWAY\RapidAPI($_POST['APIKey'], $_POST['APIPassword'], $eway_params);
    $result = $service->DirectPayment($request);


		
	
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
		
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		
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
		

		$pdf->SetFont('helvetica', '', 11);



		ob_start();
		
		$htmlcode ='<table width="600" border="0" cellpadding="5" cellspacing="0" style="padding:5px; border:1px solid #999;">
<tr>
<td width="39%" valign="top"><a href="#"  style="color:#000;"><img style="display:block;" src="http://ezifunerals.com.au/emailImages/image001.jpg" alt="Logo" /></a></td>
<td width="61%" align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#000;">Receipt/Tax Invoice</td>
</tr>
<tr>
<td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">ABN 20 460 418 090</td>
</tr>
</table>
</td>
<td align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
Date:'.$currentdate.'<br />
Invoice #'.$invoice_no.'</td>
</tr>
<tr>
  <td colspan="2">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="39%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">To,<br />'.$row['full_name'].'<br />'.$row['business_name'].',<br />'.$row['address'].',<br />'.$row['city_name'].''.$row_state['state_name'].','.$row['postal_code'].'<br /></td>
  <td width="61%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">&nbsp;</td>
  </tr>
  </table>
  </td>
</tr>
<tr>
  <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">Membership Type:'.$type.'<br />
</tr>
</table>
</td>
</tr>
<tr>
  <td colspan="2" style=" padding-bottom:5px;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#d0dede" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">
  <tr>
  <td width="31%" height="30" align="center" bgcolor="#00a3b6"><strong>Description</strong></td>
  <td width="22%" align="center" bgcolor="#00a3b6"><strong>Date</strong></td>
  <td width="17%" align="center" bgcolor="#00a3b6"><strong>Unit  Price</strong></td>
  <td width="16%" align="center" bgcolor="#00a3b6"><strong>Qty</strong></td>
  <td width="14%" align="center" bgcolor="#00a3b6"><strong>Total</strong></td>
  </tr>';
  

 
 
	 while($rw=mysql_fetch_array($result1)){

  	$clientsql = "SELECT first_name FROM clients WHERE id = '".$rw['invite_from']."' LIMIT 1";
    $clientex = mysql_query($clientsql);

    $client = mysql_fetch_assoc($clientex);
	

    $invite_date = explode('-',$rw['date']);
    $invite_date = $invite_date[2].'/'.$invite_date[1].'/'.$invite_date[0];

 $htmlcode .='<tr>
  <td valign="top" bgcolor="#dedede" style="padding:5px 0 5px 20px;"> Funeral quote request<br />
    (Client  name:'.$client['first_name'].')</td>
  <td align="center" valign="top" bgcolor="#dedede"><?php echo $invite_date;?></td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$'.$charge.'.00</td>
  <td align="center" valign="top" bgcolor="#dedede">1</td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$'.$charge.'.00</td>
  </tr>
  <tr>
  <td height="2" colspan="5" valign="top" bgcolor="#ffffff"></td>
  </tr>';
  
 }


$htmlcode .=  '<tr>
  <td colspan="3" valign="top" bgcolor="#dedede">&nbsp;</td>
  <td valign="top" bgcolor="#dedede" style="padding:5px 0px 5px 10px;"><strong>Subtotal</strong></td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$'.$charge1.'</td>
  </tr>
  <tr>
  <td height="2" colspan="5" valign="top" bgcolor="#ffffff"></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" bgcolor="#dedede">&nbsp;</td>
    <td valign="top" bgcolor="#dedede" style="padding:5px 0px 5px 10px;"><strong>Total</strong></td>
    <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$'.$charge1.'</td>
  </tr>
  </table>
  </td>
</tr>
<tr>
<td colspan="2" valign="top" style=" padding-bottom:5px;"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">GST included in total amount</td>
  </tr>
  <tr>
    <td height="30" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">Thank you for your business!</td>
  </tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;"><strong>Please be advised this  receipt has been issued subject to the successful <br />clearance of funds by your  financial institution.</strong></td>
  </tr>
</table></td>
</tr>
</table>
		
		
		'; 
		
		$pdf->writeHTML($htmlcode, true, false, false, false, '');

			if (!file_exists($filename)) {
				
				
			mkdir('allinvoice',0777);
				
						//mkdir('$path',0777);		
					}
		
		
		$unique = rand();
		
		$pdfname = 'invoice_'.$unique.'.pdf';
		
	$pdfdoc=$pdf->Output('allinvoice'.'/'.$pdfname, 'F');
	
	
	$month_payment="insert into monthly_payment(director_id,total_payment,invoice,status) values('".$row['id']."','".$charge1."','".$pdfname."','Approved')";
	$result_payment=mysql_query($month_payment);
	
	include('../../email_format/invoice_mail.php');
	
	
		ob_end_clean();
	 // Check if any error returns
    if (isset($result->Errors)) {
        // Get Error Messages from Error Code.
        $ErrorArray = explode(",", $result->Errors);
        $lblError = "";
        foreach ( $ErrorArray as $error ) {
            $error = $service->getMessage($error);
            $lblError .= $error . "<br />\n";;
        }
		
		
    }
	
	 else {
       
	    $in_page = 'view_result';
		
    }					
	
}
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>eWAY Rapid Direct Connection Demo</title>
    <link href="assets/Styles/Site.css" rel="stylesheet" type="text/css" />
    <link href="assets/Styles/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css" />
    <script src="assets/Scripts/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="assets/Scripts/jquery-ui-1.8.11.custom.min.js" type="text/javascript"></script>
    <script src="assets/Scripts/jquery.ui.datepicker-en-GB.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/Scripts/tooltip.js"></script>
</head>
<body>
    <form method="POST">
    <center>
        <div id="outer">
            <div id="toplinks">
                <img alt="eWAY Logo" class="logo" src="assets/Images/companylogo.gif" width="960px" height="65px" />
            </div>
            <div id="main">

<?php
    // Display Results Page
    if ($in_page === 'view_result') {
?>

    <div id="titlearea">
        <center><h2>Payment Result</h2></center>
        <br><br>
      
    </div>

    <div id="maincontent">
       
           <h2> Your Payment sucessfully Done.</h2>
    </div>

        <br />
        <br />
    
        <br />
        <br />
        
        <div id="raw">
            <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;">
                <?php echo $service->getLastUrl(); ?><br>
                <pre id="request_dump"></pre>
            </div>
            <div style="width: 45%; margin-right: 2em; background: #f3f3f3; float:left; overflow: scroll; white-space: nowrap;"><pre id="response_dump"></pre></div>
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
        
    <div id="maincontentbottom">
    </div>

<?php
    // Display payment form
    } else {
?>

    <div id="titlearea">
        <h2>Monthly Payment Page</h2>
    </div>
<?php
    if (isset($lblError)) {
?>
    <div id="error">
        <label style="color:red"><?php echo $lblError ?></label>
    </div>
<?php } ?>
    <div id="maincontent">
        <div class="transactioncustomer">
            <div class="header first">
                Request Options
            </div>
            <div class="fields">
                <label for="APIKey">API Key</label>
                <input id="APIKey" name="APIKey" type="text" value="44DD7ALLytTzdO6LHTDDzzA4QWaCcksRC4BFN4LtR7qjCJ7+DPAfFbXVtF6sbq4aroZvLS"readonly="" />
            </div>
            <div class="fields">
                <label for="APIPassword">API Password</label>
                <input id="APIPassword" name="APIPassword" type="password"  value="QKXfazhg" readonly=""/>
            </div>
            <div class="fields" style="display:none">
                <label for="ddlSandbox">API Sandbox</label>
                <select id="ddlSandbox" name="ddlSandbox">
                <option value="1">Yes</option>
                <option value="" selected="selected">No</option>
                </select>
            </div>
            <div class="fields" style="display:none">
                <label for="ddlMethod">Payment Method</label>
                <select id="ddlMethod" name="ddlMethod" style="width: 140px" onchange="onMethodChange(this.options[this.options.selectedIndex].value)">
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
            <div class="header" style="display:none" >
                Payment Details
            </div>
            <div class="fields" style="display:none">
                <label for="txtAmount">Amount &nbsp;<img src="assets/Images/question.gif" alt="Find out more" id="amountTipOpener" border="0" /></label>
                <input id="txtAmount" name="txtAmount" type="text" value="100" />
            </div>
            <div class="fields" style="display:none">
                <label for="txtCurrencyCode">Currency Code </label>
                <input id="txtCurrencyCode" name="txtCurrencyCode" type="text" value="AUD" />
            </div>
            <div class="fields" style="display:none">
                <label for="txtInvoiceNumber">Invoice Number</label>
                <input id="txtInvoiceNumber" name="txtInvoiceNumber" type="text" value="Inv 21540" />
            </div>
           
            <!-- <div class="header">
                Custom Fields
            </div>
            <div class="fields">
                <label for="txtOption1">Option 1</label>
                <input id="txtOption1" name="txtOption1" type="text" value="Option1" />
            </div>
            <div class="fields">
                <label for="txtOption2">Option 2</label>
                <input id="txtOption2" name="txtOption2" type="text" value="Option2" />
            </div>
            <div class="fields">
                <label for="txtOption3">Option 3</label>
                <input id="txtOption3" name="txtOption3" type="text" value="Option3" />
            </div> -->
          </div> <!-- end for <div id='payment_details'> -->
        </div>
        <div class="transactioncard" style="display:none" >
            <div class="header first" style="display:none">
                Customer Details
            </div>
            <div class="fields" style="display:none">
                <label for="txtTokenCustomerID">Token Customer ID &nbsp;<img src="../assets/Images/question.gif" alt="Find out more" id="tokenCustomerTipOpener" border="0" /></label>
                <input id="txtTokenCustomerID" name="txtTokenCustomerID" type="text" />
            </div>
            <div class="fields" style="display:none;">
                <label for="txtFirstName">First Name</label>
                <input id="txtFirstName" name="txtFirstName" type="text" value="John" />
            </div>
            <div class="fields" style="display:none;">
                <label for="txtLastName">Last Name</label>
                <input id="txtLastName" name="txtLastName" type="text" value="Doe" />
            </div>
     
           
            <div class="fields" style="display:none;">
                <label for="txtCountry">Country</label>
                <input id="txtCountry" name="txtCountry" type="text" value="au" maxlength="2" />
            </div>
            <div class="fields" style="display:none;">
                <label for="ddlTransactionType">Transaction Type</label>
                <select id="ddlTransactionType" name="ddlTransactionType" style="width:140px;">
                <option value="Recurring" selected="selected">Recurring</option>
                </select>
            </div>
        </div>
        <div class="button">
            <br />
            <br />
            <input type="submit" id="btnSubmit" name="btnSubmit" value="Make Payment" />
        </div>
    </div>
   
<?php
    }
?>
            </div>
            <div id="footer"></div>
        </div>
    </center>
    </form>

</body>
</html>