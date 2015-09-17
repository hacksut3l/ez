<?php
	@session_start();
	include_once('../include/config.php');
	
	error_reporting(1);
	
	//$_SESSION['person_id'] = '1';
	
	$dir = dirname(__FILE__);
	
	
	
	$sql = mysql_query("SELECT * FROM  lead_invoice as li,directors as d WHERE li.id = '".$_GET['id']."' and  li.req_to=d.id");	
	$rows = mysql_num_rows($sql);
	$person = mysql_fetch_array($sql);	
	
	
	
	
	/*ob_start();
	require_once($dir.'/pdf-form.php');
	$pdf_html = ob_get_contents();
	ob_end_clean();
	
	require_once($dir.'/dompdf/dompdf_config.inc.php');
	
	$dompdf = new DOMPDF(); // Create new instance of dompdf
	$dompdf->load_html($pdf_html); // Load the html
	$dompdf->render(); // Parse the html, convert to PDF
	$pdf_content = $dompdf->output(); // Put contents of pdf into variable for later
	
	
	ob_start();
	require_once($dir.'/html.php');
	$html_message = ob_get_contents();
	ob_end_clean();*/
	
	
	
	/*----------- PDF Formation -------------- */
	
		require_once('tcpdf_include.php');
		
		
		class MYPDF extends TCPDF {

		public function Header() {
			// Logo
			//$image_file = base_url.'images/logo.png';
			$this->Image($image_file , 15, 5, 40, '20', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
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
		
		//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);
		
		$pdf->SetFont('helvetica', '', 11);
		$unique = rand();
		$htmlcode='<table cellpadding="0" cellspacing="0" style="margin: 0 auto;border:1px solid #000;font-size:10px;" width="640">
	
    <tr>
    	<td  style="padding:0 10px"><a href="#"><img src="'.base_url.'images/logo.png" width="252"  height="94"/></a>
		<br/>';
		if($person['abn'])
		{
		$htmlcode.='ABN '.$person['abn'];
		}
		$htmlcode.='</td>
		<td align="right"><br/><br/>
		<h3>Receipt/Tax Invoice</h3>
		Date: ['.date('d-m-Y').']<br/>
        Invoice # ['.$unique.']
	 
		</td>
    </tr>
    <tr>
    	<td colspan="2">
        	To,
			     <div style="padding:50px;">
				 ['.$person['full_name'].'] <br/>
['.$person['business_name'].']<br/>
['.$person['address'].']<br/>';
$csql = "SELECT * FROM cities WHERE city_id = ".$person['city']."";
				$csqlex = mysql_query($csql);
				$ccity = @mysql_fetch_assoc($csqlex);
				//echo $ccity['city_name']." ";
$htmlcode.='['.$ccity['city_name']." " .$person['postal_code'].']


				 </div>
        </td>
    </tr>
    <tr>
    	<td colspan="2" style="padding:0px">
        	Funeral Director ID ['.$person['req_to'].']<br/>';
			if($person['user_type']==3)
			{
				$type='premium';
			}
			if($person['user_type']==2)
			{
				$type='standred';
			}
$htmlcode.='Membership Type: ['.$type.'] <br/>


        </td>
    </tr>
   
   
   <tr>
    	<td colspan="2">
		</td>
		</tr>
    
   
    <tr>
    	<td colspan="2">
        	<table width="625" bgcolor="#f4f8fa" cellpadding="0" cellspacing="0">
            	
                <tr>
                	<td colspan="3" valign="top">
                    	<table width="615" border="1" cellpadding="0" cellspacing="0" class="decs" style="width:605px;">
                        	<tr bgcolor="#839aaa">
                            	<td>Description</td>
                                <td>Date</td>
                                <td>unit price</td>
								<td>Qty</td>
								<td>Total</td>
                               
                            </tr>
							';
							//echo "SELECT sum(req_price),month,year FROM  lead_invoice as li WHERE li.req_to = '".$_GET['id']."' and month=".$_GET['month']." and year=".$_GET['year'];
							$sqlsumprice = mysql_query("SELECT count(req_price) as c FROM  lead_invoice as li WHERE li.req_to = '".$person['req_to']."' and month=".$_GET['month']." and year=".$_GET['year']);
							//echo "code excute";
							$rowprice=mysql_fetch_array($sqlsumprice);
							if($rowprice['c'])
							{
							$htmlcode .='
							
								<tr>
                                <td>';
								//$minmaxquery=mysql_query("select min(req_date), max(req_date),count(req_date) as total from lead_invoice where month=".$rowprice['month']." and year=".$rowprice['year'])or die(mysql_error());
								//$minmaxresult=mysql_fetch_array($minmaxquery);
								$htmlcode .= "Monthly charge for exclusive funeral leads for ".$_GET['mon']." ".$_GET['year'] ;
								if($person['user_type']==3)
			{
				$char=199;
                              $htmlcode .='  </td><td></td>
                                 <td>
                                 $ 199
                                </td>
                                 <td>';
			}
			else
			{
				$char=50;
				                 $htmlcode .='  </td><td></td>
                                 <td>
                                 $ 50
                                </td>
                                 <td>';
			}
                               
								$htmlcode .= $rowprice['c'].
								 '                                </td>
                                <td>$
                               '.
								 ($char*$rowprice['c'])
								.'
                                </td>
                               
                               
                                </tr>';
							}
if($person['user_type']==3)
			{
		
$htmlcode.='<tr>
<td colspan="4">&nbsp;
</td>
</tr>

';

//echo "select count(id) as t from directors where reference_id=".$_GET['id']." and DATE_FORMAT(date, '%m-%Y')='".$_GET['month']."-".$_GET['year']."' and user_type=2";
$adlocationqry=mysql_query("select count(id) as t from directors where reference_id=".$person['req_to']." and DATE_FORMAT(date, '%m-%Y')='".$_GET['month']."-".$_GET['year']."' and user_type=2")or die(mysql_error());
$locationrow= mysql_fetch_array($adlocationqry);							
if($locationrow['t'])
{
	$htmlcode .= " <tr>
<td> Monthly charge for additional business locations for ".$_GET['mon']." ".$_GET['year'];

$htmlcode .='
</td>
<td>
</td>
<td>
$20.00
</td>
<td>'.($locationrow['t']).'
</td>
<td>
 '.($locationrow['t']*20).'
 </td></tr>';
}}
	
							$sql1 = mysql_query("SELECT * FROM  lead_invoice as li,directors as d,clients as c WHERE li.req_to = '".$person['req_to']."' and  li.req_to=d.id and li.req_from=c.id  and month=".$_GET['month']." and year=".$_GET['year']);	
							$total=($locationrow['t']*20);
						while($row=mysql_fetch_array($sql1))
						{
			$htmlcode .='    <tr>
                            	<td> Lead  $'.$row['req_price'].' from '.$row['first_name'].' '.$row['last_name'].' on '.date("d-m-Y", strtotime($row['req_date'])).'.</td>
                                <td>'.date("d-m-Y", strtotime($row['req_date'])).'</td>
                                <td>$'.$row['req_price'].'</td>
								<td>1</td>
                              <td>$'.$row['req_price'].'</td>
                            </tr>';
							$total+=$row['req_price'];
                            
						}
                             
                            
                            
                  	$htmlcode .='      </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td width="140">&nbsp;</td>
                                <td width="200">&nbsp;</td>
                                <td></td>
                                <td><strong>Pay Amount</strong></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td bgcolor="#FFFFFF"></td>
                                <td>$'.$total.'</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
    	<td colspan="3">&nbsp;</td>
    </tr>
    <tr>
    	<td colspan="3" style="font-size:11px; padding:10px" align="center">
        	<strong> This receipt has been issued subject to the Lead of a director.<br />
Visit <a href="http://ezifunerals.com.au/" style="color:#1155cc">http://ezifunerals.com.au/</a> for view other director invoice.</strong>
        </td>
    </tr>
    <tr>
    	<td colspan="3">&nbsp;</td>
    </tr>
    
       
</table>';
		
		
			echo $htmlcode;			
		
		
					//	$pdf->writeHTML($htmlcode, true, false, false, false, '');
	
	
	
	
					// -----------------------------------------------------------------------------
					
					//Close and output PDF document
					$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/form_pdf/dir'.$_GET['id'];
					
					$filename = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/form_pdf/dir'.$_GET['id']. "/";
			
					$path1 = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/form_pdf/dir'.$_GET['id'];
					
					if (!file_exists($filename)) {
						mkdir($path1, 0777);		
					}
					
					
					
					$pdfname = $person['business_name'].'_lead_invoice_'.$unique.'.pdf';
					
				$pdf->Output($path.'/'.$pdfname, 'F');
		
		
		
		/*----------- End of PDF Formation -------------- */
		
		
		
// We'll be outputting a PDF
header('Content-type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="'.$pdfname.'"');

// The PDF source is in original.pdf
readfile($path.'/'.$pdfname);
	
		// Send the email, and show user message
		
			
		
			
			
	
	
?>
