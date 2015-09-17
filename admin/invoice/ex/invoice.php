<?php 
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
 $sel="select DISTINCT directors.id,directors.full_name,directors.state,directors.city,directors.business_type,directors.business_name,directors.address,directors.user_type,directors.address,directors.email from directors INNER JOIN lead_invoice ON lead_invoice.req_to=directors.id";
 
 $rel=mysql_query($sel);
 
 $currentdate=date('d-m-y');
 //$charge = 50;
 while($row=mysql_fetch_array($rel))
 {
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
		$result=mysql_query($seldata);
		$count=mysql_num_rows($result);
		
		
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
  

 
 
	 while($rw=mysql_fetch_array($result)){

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
	
	require_once('../../email_format/invoice_mail.php');
	
	
		ob_end_clean();
			
	
}
	
 

	
?>