<?php
	@session_start();
	include_once('../include/config.php');
	
	error_reporting(0);
	
	$_SESSION['person_id'] = '1';
	
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
	
	if($_REQUEST['vpc_TxnResponseCode'] == '0')
	{
	
	/*----------- PDF Formation -------------- */
	
		require_once('tcpdf_include.php');
	
		
		class MYPDF extends TCPDF {

		public function Header() {
			// Logo
			$image_file = base_url.'images/logo.png';
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
		
		$htmlcode = '<table  cellpadding="6" >
						<tr>
						<td colspan="3" style="color:#999; font-weight:bold;font-size:14px; text-align:center; width:635px;"><img src="'.base_url.'images/logo.png"></td>
						</tr>
						<tr>
						<td style="text-align:center;width:635px; height:344px;"><img src="'.base_url.'images/main.jpg"></td>
						</tr>
						<tr><td></td></tr>
						<tr>
						<td colspan="3" style="color:#06ADB6; font-weight:bold;font-size:34px;text-align:center;width:635px;">MY FUNERAL PLAN</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6b6e70;font-size:32px; text-align:center;width:635px;">'.$deceased['f_name'].' '.$deceased['m_name'].' '.$deceased['l_name'].'</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6c6d70;font-size:22px;text-align:center;">'.$deceased['dod'].'</td>
						</tr>
						<tr>
						<td style="height:100px;"></td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:15px; text-align:center;width:635px;">EZIFUNERALS</td>
						</tr>
						<tr>
						<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:15px; text-align:center; padding:0;width:635px;">www.ezifunerals.com.au</td>
						</tr>
						<tr>
						<td></td>
						
						</tr>
						<tr>
						<td></td>
						
						</tr>	
                                              
                                                <tr style="height: 30px; background:#EBF0F1;!important; width:100%;top: 7.533888%; margin-top:-70px!important;"><td style="height: 30px; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2; top: 7.533888%!important; margin-top:10px!important;"><b>PERSON MAKING ARRANGEMENTS</b></td></tr>
                                             
                                                
                                                
					
                                                <tr>
						<td colspan="3" style="text-align:left!important; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2;"><div style="width:100%; background-color:#06bbce; padding:20px!important; opacity:2;"><b>My Personal Details</b></div></td>
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
                                                
                                                <tr><td style="height: 50px;background:#EBF0F1;!important; text-align:left!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2;"><div style="width:100%; background-color:#06bbce; padding:20px!important; opacity:2;"><b>DETAILS OF DECEASED</b></div></td></tr>
                                               
                                                
		
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
									</tr>';
						}
						
						$htmlcode .= $prepaidhtml.'
						<tcpdf method="AddPage" />
						<tr>
						<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
						</tr>
                                                
                                               
                                                <tr><td style="height: 50px; text-align:left!important; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2;">                                                <div style="width:100%; background-color:#06bbce; padding:20px!important; opacity:2;">
<b>DETAILS OF COMMITAL</b></div></td></tr>
                                              

						
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
									</tr>
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
						
						
						$htmlcode .= '
                                                    <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr><td></td></tr>
                                                        <tr>
						<td colspan="3" style="height: 50px; text-align:left!important; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; padding:10px!important; opacity:2;"><div style="width:100%; background-color:#06bbce; padding:20px!important; opacity:2;"><b>DETAILS OF FUNERAL SERVICE</b></div></td>
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
						</tr>';
						if($service['other_funeral_request'] == 'yes')
						{
							$htmlcode .= '<tr>
								<td>Details of special arrangements</td>
								<td>:</td>
								<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($service['request_description']).'</td>
								</tr>';
						}
						
						$htmlcode .= '<tr>
								<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
								</tr>
								<tr><td></td></tr>
                                                                <tr><td></td></tr>
                                                                <tr><td></td></tr>
                                                                <tr><td></td></tr>
								<tr>
                                                                
								<td colspan="3" style="height: 50px; text-align:left!important; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2;"><div style="width:100%; background-color:#06bbce; padding:20px!important; opacity:2;"><b>AFTER THE FUNERAL</b></div></td>
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
                                                                
								<tr>
                                                                <td colspan="3" style="height: 50px; text-align:left!important; background:#EBF0F1;!important; color: #ffffff; float:left!important; font-size:20px!important; width:100%!important; opacity:2;"><div style="width:100%; background-color:#06bbce; padding:10px; opacity:2;"><b style="padding:10px 10px 10px 10px!important; float:left!important;">Notes</b></div></td>
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
No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of EziFunerals Pty Ltd.</td></tr>';
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
		
		
		/*----------- End of PDF Formation -------------- */
		
		
		// Load the SwiftMailer files
		//require_once($dir.'/swift/swift_required.php');
		
		//$email = 'peter@ezifunerals.com.au';
		
		$email = $clientsresult['email'];
		
		$name = $clientsresult['first_name'];
		
		//$name = 'Rakesh Shetty';
		
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
							pdf_name					
						)
					VALUES
						(
							'".$_SESSION['client']."',
							'".$_REQUEST['vpc_ReceiptNo']."',
							'".$_REQUEST['vpc_Message']."',
							'".$_REQUEST['vpc_Amount']."',
							'150',
							'".$_REQUEST['vpc_TxnResponseCode']."',
							'".$_REQUEST['vpc_TransactionNo']."',
							'".$_REQUEST['vpc_ReceiptNo']."',
							'".$_REQUEST['vpc_Card']."',
							'At Need Plan',
							'".$pdfname."'
						)
						
					";
	
	                mysql_query($ordersql);
					
					//upgrade plan for client
			
			$up="UPDATE `clients` SET plan='2' where id='".$_SESSION['client']."'";
			
			$rel=mysql_query($up);
			
			//invoice send to client.................................
		$reg_amount='150';
		
		$card = $_REQUEST['vpc_Card'];
		
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
							pdf_type						
						)
					VALUES
						(
							'".$_SESSION['client']."',
							'".$_REQUEST['vpc_ReceiptNo']."',
							'".$_REQUEST['vpc_Message']."',
							'".$_REQUEST['vpc_Amount']."',
							'".$reg_amount."',
							'".$_REQUEST['vpc_TxnResponseCode']."',
							'".$_REQUEST['vpc_TransactionNo']."',
							'".$_REQUEST['vpc_ReceiptNo']."',
							'".$_REQUEST['vpc_Card']."',
							'At Need Plan'
						)
						
					";
	
		mysql_query($ordersql);
		
		
		
	}
	
?>
<style>
    .aLF-aPX-aPF-aPE-a1J-Jz-Jw
    {
       
    font-size: 11px;
    opacity: 1.01;
    overflow: hidden;
    height: 100%;
    position: absolute;
    width: 100%;
    z-index: 18;

    }
</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="<?php echo base_url;?>css/Old_Include_Css/style1.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url;?>js/Old_Include_Js/jquery-1.9.js" type="text/javascript"></script>
</head>
<body>
<style>
    .aLF-aPX-aPF-aPE-a1J-Jz-Jw
    {
       
    font-size: 11px;
    opacity: 1.01;
    overflow: hidden;
    height: 100%;
    position: absolute;
    width: 100%;
    z-index: 18;

    }
</style>
<!--start web-layout -->
<div class="web-layout">
  <div class="web-960"> 
    <!--start header-form -->
   
    <!--end header-form --> 
    <!--start form-navigation--> 
    <!--<div class="form-navigation">
      	<img src="<?php //echo base_url;?>images/nav01.png" alt="" />
      </div>--> 
    <!--end form-navigation--> 
    <!--start content-wrap--><br /><br /><br /><br /><br/>
    <div class="content-wrap">
      <center>
        <div class="content-wrap" >
          <div style="width:780px; background-color:#FFFFFF; height:280px; border:2px solid #06bbce;  box-shadow:0px 0px 30px #666; margin-top:50px; padding:10px;">
              <a href="../index.php" style="float: right;position: absolute;right: 260px;top: 131px;"><img src="images/cross.png"/></a>
              <div style="width:750px; background-color:#06bbce; padding:10px;">
              <p style="font-size:30px; color:#fff;">Thank You...!</p>
            </div>
            <div style="width:750px; padding:10px;">
              <p style="font-size:26px; margin-top:10px;"></p>
              <br />
              <br />
              <p style="font-size:16px; line-height:22px;">Your Payment Process has been completed successfully.
              
              </p>
              <p style="font-size:16px; line-height:22px;">Your Transaction Number is <?php echo $_REQUEST['vpc_ReceiptNo'];?>.
              
              <p/>
              <p style="font-size:16px; line-height:22px;">Please keep your transaction number for your records.
              
              </p>
              <p style="font-size:16px; line-height:22px;">Your personal funeral plan has been sent to you together with links to your FREE resources.</p>
              <p style="font-size:16px; line-height:22px;">Please check your email for details.</p>
            </div>
            <div style="width:750px; background-color:#06bbce; padding:10px; height:10px; margin-top:18px;"> </div>
          </div>
        </div>
      </center>
    </div>
    <!--end content-wrap--> 
  </div>
</div>
<!--end web-layout --> 

<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url;?>css/Old_Include_Css/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
		$(document).ready(function() {
			
			/*
			*   Examples - images
			*/
			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>
<link rel="stylesheet" href="<?php echo base_url;?>css/Old_Include_Css/jquery.ui.all.css" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.core.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.widget.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.datepicker.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo base_url;?>js/Old_Include_Js/jquery.ui.datepicker.js"></script> 
<script type="text/javascript" language="javascript">
    $(function() {
        $( "#searchsdate" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    
            $( "#searchsdate1" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>

</body>

</html>
