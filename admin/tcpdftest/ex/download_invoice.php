<?php
	@session_start();
	include_once('../../config.php');

	require_once('tcpdf_include.php');

	error_reporting(1);

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$director = $_POST['director'];

 $sel="select * from directors where id='".$director."'";
 $rel=mysql_query($sel);
 $row=mysql_fetch_array($rel);
 
	//echo $sql;exit;
	$sqlex = mysql_query($sql);

	$ispresent = @mysql_num_rows($sqlex);
 
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

	$sql = "SELECT 
				*
			FROM 
				invite
			WHERE 
				invite_to = '".$director."'
			AND 
				(
						`date` 
					BETWEEN
						'".$from_date."'
					AND 
						'".$to_date."'
				)
			";
	//echo $sql;exit;
	$sqlex = mysql_query($sql);

	$ispresent = @mysql_num_rows($sqlex);

	if($ispresent > 0){

		$sum = $ispresent * $charge;

		/*while($result = mysql_fetch_assoc($sqlex)){

			$sum = $sum * $charge;

		}*/


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
		require_once('../../email_format/invoice_pdf_html.php');
		$htmlcode = ob_get_contents();
		ob_end_clean();

		//$htmlcode = 'Total Invoice :'.$sum;








		$pdf->writeHTML($htmlcode, true, false, false, false, '');

		mkdir('allinvoice',0777);
		
		$unique = rand();
		
		$pdfname = 'invoice_'.$unique.'.pdf';
		
		$pdfdoc=$pdf->Output('allinvoice'.'/'.$pdfname, 'F');

		
			$directorsql = "SELECT 
								full_name,
								email
							FROM 
								directors
							WHERE 
								id = '".$director."'
							LIMIT 1
							";

			$directorex = mysql_query($directorsql);

			$director_result = mysql_fetch_assoc($directorex);

			$name = $director_result['full_name'];
			$email = $director_result['email'];

			$from_date = explode('-', $from_date);
			$to_date = explode('-', $to_date);

			$from_date = $from_date[2].'/'.$from_date[1].'/'.$from_date[0];
			$to_date = $to_date[2].'/'.$to_date[1].'/'.$to_date[0];


			$subject = 'Invoice for the month '.$from_date.' to '.$to_date;

			ob_start();
			require_once('../../MailConfig3.php');
			require_once('../../email_format/invoice_mail.php');
			
			echo $pdfname;
			

	}
	else{
		echo '2';
		exit;
	}



	

?>