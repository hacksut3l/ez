<?php
session_start();
include_once('../../../config.php');


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Peter');
$pdf->SetTitle('Funeral PDF');
$pdf->SetSubject('Funeral PDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

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
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);


$sql1 = "SELECT * FROM person_making_arangements WHERE id = '1' ";
$sqlex1 = mysql_query($sql1);

$result1 = mysql_fetch_assoc($sqlex1);

$htmlcode = '<table  cellpadding="6" >

<tr>
<td colspan="3" style="color:#999; font-weight:bold;font-size:14px; text-align:right;"><img src="../../../images/logo.png"></td>
</tr>
<tr>
<td style="height:200px;"></td>
</tr>
<tr>
<td colspan="3" style="color:#06ADB6; font-weight:bold;font-size:16px;text-align:right;">FUNERAL PLAN</td>
</tr>
<tr>
<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:18px; text-align:right;">Name of Person/Deceased</td>
</tr>
<tr>
<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:16px; text-align:right;">17th June, 2013</td> 
</tr>
<tr>
<td style="height:330px;"></td>
</tr>
<tr>
<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:16px; text-align:right;">EZIFUNERALS</td>
</tr>
<tr>
<td colspan="3" style="border-top:1px solid #6C6D70; text-align:right; float:right; margin:0;"></td>
</tr>
<tr>
<td colspan="3" style="color:#6C6D70; font-weight:bold; font-size:16px; text-align:right; padding:0;">www.ezifunerals.com.au</td>
</tr>

<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">PERSON MAKING ARRANGEMENTS</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">My Personal Details</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.$result1['f_name'].' '.$result1['m_name'].' '.$result1['l_name'].'</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.$result1['address1'].' '.$result1['address2'].'</td>
</tr>
<tr>
<td>Suburb</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($result1['suburb']).'</td>
</tr>
<tr>
<td>Country / State / Province 	</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($result1['state']).'</td>
</tr>
<tr>
<td>Postcode / Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($result1['postcode']).'</td>
</tr>
<tr>
<td>Phone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($result1['telephone']).'</td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.ucwords($result1['mobile']).'</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">'.$result1['email'].'</td>
</tr>
<tr>
<td colspan="3">
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td style="color:#000; font-weight:bold;font-size:11px;">Relationship to the deceased</td>
		<td style="color:#000; font-weight:bold;font-size:11px;">Funeral Budget</td>
		<td style="color:#000; font-weight:bold;font-size:11px;">Method Of Funeral Payment</td>
	  </tr>
	  <tr>
		<td>'.ucwords($result1['realtions']).'</td>
		<td>'.$result1['budget'].'</td>
		<td>'.ucwords($result1['payment_methods']).'</td>
	  </tr>
	</table>
</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Notes</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;"></td>
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

<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">DETAILS OF DECEASED</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details Of Deceased</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sammeer</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Suburb</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Country / State / Province 	</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Postcode / Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Age</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Date Of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Height</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Weight</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Place Of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr><tr>
<td>Country Of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Date Of Death</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Time Of Death</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Place Of Death</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Details Of Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Suburb</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>State</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Postcode</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Place where deceased is currently resting: </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Medical Certificate of Cause of Death issued: </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Doctors Details</td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Suburb</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Country / State / Province</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Postcode / Zip 	</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Phone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Is the deceased person registered as an organ donor? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, provide details below: </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Does the deceased person have a pre-paid Funeral Plan? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If YES, the nominated funeral director must direct the funeral. Enter the name of the Funeral Director and contact details below: </td>
</tr>
<tr>
<td>Does the deceased person have a pre-paid Funeral Plan?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Business Name</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr><tr>
<td>Suburb</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Country / State / Province</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Postcode / Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Phone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Notes</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Demo</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Test</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>


<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">DETAILS OF COMMITAL</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details Of Committal</td>
</tr>

<tr>
<td width="25%">How would you like the deceased to be laid to rest?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sammeer</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Burial details </td>
</tr>
<tr>
<td>Will the deceased be buried in a new grave or an existing grave?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Will the deceased be buried in a new grave or an existing grave?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If you are using a new grave, which cemetery do you wish the deceased to be buried? </td>
</tr>	
<tr>
<td>Name of Cemetery</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>City</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>State</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a preferred section of the cemetery? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If you answered YES, what section of the cemetery, do you wish the deceased to be buried ? </td>
</tr>
<tr>
<td>Cemetery Area </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Section</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If the deceased is being buried in an existing grave, provide details of cemetery: </td>
</tr>
<tr>
<td>Name and address of cemetery </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>State the grave number </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr><tr>
<td>Where are the grave deeds located? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Cremation details </td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Which crematorium do you wish the deceased to be cremated? </td>
</tr>
<tr>
<td>Name of Crematorium </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>City</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>State</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Entombment details</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Which mausoleum do you wish the deceased to be entombed? </td>
</tr>
<tr>
<td>Name of Mausoleum </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>City</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>State</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Notes</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Demo</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Test</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>


<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">DETAILS OF FUNERAL SERVICE</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details Of Funeral Service</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Date And Time Of Service</td>
</tr>
<tr>
<td width="25%">Do you have a preferred day for the service?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sammeer</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Do you have a preferred date for the service? </td>
</tr>
<tr>
<td>Date</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a preferred time for the service?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details Of Funeral Service</td>
</tr>	
<tr>
<td>Would you prefer a private or public funeral? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you require a single or double service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Where would you like the funeral service to be held? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you require a religious or non-religious service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, what religion/spiritual belief/philosophy will the service be based upon?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Viewings and Rosaries</td>
</tr>
<tr>
<td>Will you require a viewing or rosary?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you selected YES to a viewing or rosary, do you require it to be private or public? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Where would you like the viewing or rosary to be held? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a preferred day and time for the viewing or rosary?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a preferred day and time for the viewing or rosary? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a preferred day and time for the viewing or rosary?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>How many people do you estimate may attend the viewing or rosary?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Will you require the body to be dressed in special clothing and jewellery for the viewing or rosary?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>List special items of clothing or jewellery to be provided:</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Embalming</td>
</tr>
<tr>
<td>Do you require the body to be embalmed? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Coffin Casket</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">What type of coffin or casket do you require?</td>
</tr>
<tr>
<td>Select Category</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Budget</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Supplier</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Minister Or Celebrant</td>
</tr>
<tr>
<td>Do you have a minister, celebrant or person in mind to perform the service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, please give the name</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Phone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Eulogy</td>
</tr>
<tr>
<td>Do you require a eulogy at the service about the deceased persons life? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Special Readings</td>
</tr>
<tr>
<td>DWill you require any special readings to be read at the funeral service ? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If you answered YES, please provide details: </td>
</tr>
<tr>
<td>Details of person/s to deliver the reading </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>List text or poems </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Notices</td>
</tr>
<tr>
<td>Do you require the funeral director to organise the funeral notices in the main newspaper? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If yes, which newspaper </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Transport</td>
</tr>
<tr>
<td>How do you want the body to be transported </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you require limousines or mourning cars for the immediate family? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, how many seats will you require? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>No Of Seats </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">What transport requirements do you require to and from the funeral service</td>
</tr>
<tr>
<td>Pick up location</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Return location</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Special requests: (colour/special routes, etc) </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you require a funeral cortege? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Floral arrangements</td>
</tr>
<tr>
<td>Do you require floral arrangements at the funeral? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, what type of floral arrangements do you require</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Donations</td>
</tr>
<tr>
<td>Would you prefer donations at the funeral service in lieu of flowers?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, list the name of organisation  </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Stationery</td>
</tr>
<tr>
<td>Do you require funeral stationery during the service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, what type of funeral stationery do you require </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Music</td>
</tr>
<tr>
<td>Do you require music at the funeral?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">What music would you like played at the funeral service? </td>
</tr>
<tr>
<td>Music entering: (Song/artist)</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Music during: (Song/artist)</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Music leaving: Song/artist)</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Musician and Singers</td>
</tr>
<tr>
<td>Will you be having a musician or singer perform at the funeral service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Musician / singer details(Name)</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Phone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Media Tributes</td>
</tr>
<tr>
<td>Will you require any media/DVD tribute during the funeral service ? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Pall Bearers</td>
</tr>
<tr>
<td>Would you prefer family/friend bearers OR bearers provided by a funeral director? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">If family bearers are provided, please give their names and their relationship to the deceased: </td>
</tr>	
<tr>
<td>Name</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Relationship</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Sex</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Releases </td>
</tr>	
<tr>
<td>Do you require a special funeral release during the service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered YES, what type of funeral release do you require? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Refreshments </td>
</tr>	
<tr>
<td>Will you require refreshments at the venue immediately after the funeral service? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If you answered yes what type of menu do you require? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Estimated number of people to be catered for</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Other Special Requests</td>
</tr>	
<tr>
<td>Do you require any other special arrangements? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, please describe </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Notes</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Demo</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Test</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>


<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">AFTER THE FUNERAL</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">After The Funeral</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Wake</td>
</tr>
<tr>
<td width="25%">Do you intend holding a wake after the funeral service?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sammeer</td>
</tr>
<tr>
<td>If YES, provide details</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Collection Of Ashes</td>
</tr>
<tr>
<td>After cremation, how would you like the cremated remains to be collected? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you require an urn or casket for the cremated remains? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, what type </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Special Requests</td>
</tr>	
<tr>
<td>Do you have any special requests for the ashes? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, what type</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Memorials</td>
</tr>
<tr>
<td>Do you require any form of memorial after cremation?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, please describe </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>Do you have a specific memorial in mind?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>If YES, please give details of the memorial</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr><tr>
<td>Do you a preferred stonemason to supply and fix the memorial? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td>What would you like written on the memorial (inscription)? </td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:14px;">Notes</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Demo</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">Test</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #000;">&nbsp;</td>
</tr>
</table>
';


// Table with rowspans and THEAD
/*$tbl = <<<EOD

<div class="pdf-main">

<h1 style=" margin-left: 25px; margin-top: 65px; width: 600px;">PERSON MAKING ARRANGEMENTS</h1>
<h1 style=" color: #1a1a1a; margin-left: 26px; margin-top: 10px; width: 600px;">My Personal Details</h1>
<table>
  <tr>
    <td>Name</td>
    <td>:</td>
    <td style="border-bottom:1px solid #000;"></td>
  </tr>
  <tr  class="">
    <td class="">Address</td>
    <td>:</td>
    <td style="    width: 937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr  class="">
    <td class="">Suburb</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr  class="">
    <td class="">Country / State / Province</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr  class="">
    <td class="">Postcode / Zip</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr  class="">
    <td class="">Phone</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr class="">
    <td class="">Mobile</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
  <tr  class="">
    <td class="">Email</td>
    <td>:</td>
    <td style="width:937px; border-bottom:1px solid #000; margin-left:8px;">&nbsp;</td>
  </tr>
</table>
EOD;*/
//echo $htmlcode;
$pdf->writeHTML($htmlcode, true, false, false, false, '');




// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('rakesh3.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+