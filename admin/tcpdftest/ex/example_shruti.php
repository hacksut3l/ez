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

$htmlcode = '<table  cellpadding="6">
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
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">MY PERSONAL DETAILS</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">My Personal Details</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">dddgdgdfgdfgf</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">gdfgfdgfdgdfg</td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">fgfgfdfgfggdgd</td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">gdfgfdgfdgdgg</td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">fdddddd</td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dfgdfgdgdfg</td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dfgdfgdfgf</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">fgfdgdfgfdf</td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Date of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dgdgd</td>
</tr>
<tr>
<td>Place of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">tyhujl</td>
</tr>
<tr>
<td>Country of Birth</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">fsdfsdfs</td>
</tr>
<tr>
<td>If born overseas when did you arrive in Australia?</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dgfgfgfgf</td>
</tr>
<tr>
<td>Main occupation/s during working life</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dgfgfgfgf</td>
</tr>
<tr>
<td>Religion</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">dgfgfgfgf</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Marital Status</td>
</tr>
<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="90%" style="color:#000; font-weight:bold;font-size:11px;">Never Married</td>
		<td width="90%" style="color:#000; font-weight:bold;font-size:11px;">Married</td>
		<td width="90%" style="color:#000; font-weight:bold;font-size:11px;">Widowed</td>
		<td width="90%" style="color:#000; font-weight:bold;font-size:11px;">Divorced</td>
		<td width="90%" style="color:#000; font-weight:bold;font-size:11px;">Separated</td>
	  </tr>
	  <tr>
		<td  width="90%">dggdggdf</td>
		<td  width="90%">ddfd</td>
		<td  width="90%">dfd</td>
		<td   width="90%">ddfd</td>
		<td   width="90%">dfd</td>
	  </tr>
	</table>
</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Childrens Details</td>
</tr>
<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td  width="100%"style="color:#000; font-weight:bold;font-size:11px;">Full Name</td>
		<td  width="100%"style="color:#000; font-weight:bold;font-size:11px;">Date of Birth</td>
		<td  width="100%"style="color:#000; font-weight:bold;font-size:11px;">Gender</td>
	  </tr>
	  <tr>
		<td  width="100%">dggdggdf</td>
		<td  width="100%">03.02.12</td>
		<td  width="100%">Female</td>
	  </tr>
	</table>
</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Next Of Kin</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fdgfdgfdgfdgfd</td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Relationship to you</td>
<td>:</td>
<td>fddfgdfg</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Doctor</td>
</tr>
<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">gfgfg</td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Will</td>
</tr>
<tr>
<td width="25%">Location</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fgfgfgfghgdfgdfgdfgh</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Executor</td>
</tr>
<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"> </td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Solicitor</td>
</tr>
<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>


<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Family and Friends</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Relationship to you</td>
<td>:</td>
<td>fddfgdfg</td>
</tr>
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">MY FUNERAL GUARDIAN</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">My Funeral Guardian</td>
</tr>

<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Gender</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Male</td>
</tr>
<tr>
<td>Address</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country/State/Province *</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Postcode/Zip</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Country</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Telephone</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Mobile</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td>Email</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>

<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">MY COMMITTAL</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details of Committal</td>
</tr>
<tr>
 <td width="50%">How would you like to be laid to rest?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Burial</td>

	  </tr>
	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Burial Details</td>
</tr>
<tr>
		<td width="50%">Do you wish to be buried in a new grave or an existing grave?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">New Grave</td>
</tr>
<tr>
		<td width="50%">If it is to be a new grave,who will be the owner?</td>
		</tr>
		<tr>
<td width="25%">Name</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Address</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Country/State/Province *</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Postcode/Zip</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Country</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Telephone</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Mobile</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;"></td>
</tr>
<tr>
<td width="50%">Email</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">dfdfd</td>
</tr>

 <tr>
 <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">Do you have a preferred section of the cemetery that you wish to be buried ?</td>
  </tr>
<tr>
	<td width="50%">How would you like to be laid to rest?</td>
<td  width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>

</tr>
	  <tr>
	  <td width="50%">If you answered YES, what section of the cemetery would you prefer?</td>
	  </tr>
	  <tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
		  <tr>
			  <td width="100%"> Cemetery Area:</td>
			  <td width="100%"> Section:</td>
			   <td width="100%"> Number:</td>
		   </tr>
		   <tr>
			  <td width="100%">fssfsfsfffsd</td> 
			  <td width="100%">dfdfsfsfs</td>
			  <td width="100%">sdfsdfsdfsfs</td>
		  </tr>
	 </table>
	 </td>
	 </tr>
 <tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">If you wish to be buried in an existing grave, provide details of cemetery:</td>
	  </tr>
	  <tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
		  <tr>
			  <td width="100%">Name and Address of the cemetery</td>
			  <td width="100%">State the grave number</td>
			   <td width="100%">Where are the grave deeds located?</td>
		   </tr>
		   <tr>
			  <td width="100%">fsdfsfsdfdfsd</td> 
			  <td width="100%">55454545</td>
			  <td width="100%">ghvviog</td>
		  </tr>
	 </table>
	 </td>
	 </tr>
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Cremation Details</td>
</tr>	 
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">Which crematorium do you wish to be cremated?</td>
</tr> 
<tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
		  <tr>
			  <td width="100%">Name of the Crematorium:</td>
			  <td width="100%">City:</td>
			   <td width="100%">State:</td>
		   </tr>
		   <tr>
			  <td width="100%">Mausoleum</td> 
			  <td width="100%">Mausoleum City</td>
			  <td width="100%">Mausoleum State</td>
		  </tr>
	 </table>
	 </td>
	 </tr>
	 
	 	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Entombment Details</td>
</tr>	 
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">Which mausoleum do you wish to be entombed?</td>
</tr> 
<tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
		  <tr>
			  <td width="100%">Name of Mausoleum:</td>
			  <td width="100%">City:</td>
			   <td width="100%">State:</td>
		   </tr>
		   <tr>
			  <td width="100%">fsdfsfsdfdfsd</td> 
			  <td width="100%">55454545</td>
			  <td width="100%">ghvviog</td>
		  </tr>
	 </table>
	 </td>
	 </tr>
	 
	 
<tcpdf method="AddPage" />
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">MY FUNERAL WISHES</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Details of Funeral Service</td>
</tr>
<tr>
<td width="50%">Would you prefer a private or public funeral?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Private</td>
</tr>
<tr>
	  <td width="50%">Do you require a single or double service?</td>
		<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Single</td>
	  </tr>	
	<tr>
	  <td width="50%">  Where would you like the funeral service to be held?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Graveside</td>
	  
	</tr>
	<tr>
	  <td width="50%">Do you require a religious or non-religious service?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Religious</td>
	</tr>
	<tr>
	<td width="50%">What religion/spiritual belief/philosophy will the service be based upon?</td>
		   <td width="3%">:</td>
	<td width="70%" style="border-bottom:1px solid #000;">dddgdfgdfg</td>
	</tr>
	
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Viewings and Rosaries</td>
</tr>
	<tr>
<td width="50%">Would you like a viewing or rosary?</td>
 <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Viewing</td>
</tr>
<tr>
<td width="50%">If you answered YES, do you require it to be private or public?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Private</td>
</tr>
<tr>
<td width="50%">Where would you like the viewing or rosary to be held?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Church</td>
</tr>
<tr>
<td width="50%">Provide details of location</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Church</td>
</tr>
<tr>
<td width="50%">Would you like to be dressed in special jewellery and clothing</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
<tr>
<td width="50%">If Yes, provide details of jewellery and clothing </td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">vdgdgdggdfg</td>

</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Embalming</td>
</tr>
<tr>
<td width="50%">Do you wish to be embalmed?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr>
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Coffin Casket</td>
</tr>
	  <tr>
	  <td width="50%">What type of coffin or casket do you require?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr>
	 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;"> Minister Or Celebrant</td>
</tr>
<tr>
	  <td width="50%">Do you have a minister, celebrant or person in mind to perform the service?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr>
	  <tr>
		  <td>
			  <table width="100%" border="1" style="border-color:#ccc;">
				  <tr>
					  <td width="80%">If YES,please give the name</td>
					  <td width="80%">Email</td>
					  <td width="80%">Phone</td>
				  </tr>  
					<tr>
					  <td width="80%">ffgf</td>
					  <td width="80%">gdfgdfgdfg</td>
					  <td width="80%">gdfg</td>
				  </tr>
			  </table>
		  </td>
	  </tr>
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;"> Eulogy</td>
</tr> 
<tr>
	  <td width="50%"> Would you like a eulogy at the service about your life?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr> 
	  <tr>
	  <td width="50%">If you answered YES, have you written the text for the eulogy?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr> 
	
	<tr><td  width="50%">Please provide details</td>
	 <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">dfdsfdfdffds</td>
	</tr>
		<tr><td>dgfgdfggdf</td></tr>
		<tr>
		  <td width="50%" >Is there somebody you would prefer to give the eulogy (other than the minister or celebrant) at the service?</td>
		  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
		</tr>
	  <tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">If YES,give their name and contact details</td>
	  </tr>
	  <tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
	  <td width="50%">Name</td>
	  <td width="50%">Contact Number</td>
	  <td width="50%">Address</td>
	  </tr>
	   <tr>
	  <td width="50%">fdsfdf</td>
	  <td width="50%">fdsfdf</td>
	  <td width="50%">fdsfdf</td>
	  </tr>
	  </table>
	  </td>
	  </tr>
	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;"> Special Readings</td>
</tr> 
<tr>
	  <td width="50%"> Would you any special readings to be read at your funeral service?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	</tr>
	  <tr>
	  <td width="50%">If you answered YES,please provide details,List text or poems</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Transport</td>
</tr> 
<tr>
	  <td width="50%"> How would you like to be transported to and from the funeral :-</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">other</td>
	</tr>
		<tr>
		<td width="50%">(motorbike/horse & carriage)</td>
		<td>:</td>
		<td width="70%" style="border-bottom:1px solid #000;">dfgdfgdfgdfgfg</td>
		</tr>
		<tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">What transport requirements would you like to and from the funeral service:</td>
	</tr>
	 <tr>
		<td width="50%">Pick Up Location</td>
		 <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fsdfzsdfsdf</td>
</tr>

<tr>
		<td width="50%">Return Location</td>
		 <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fhfgh</td>
		</tr>
		<tr>
		 <td width="50%">Special Requests:(color/ special routes, etc)</td>
		  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">dgff</td>
		</tr>
		<tr>
	  <td width="50%">Would you like a funeral cortege?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Floral Arrangements</td>
</tr> 

<tr>
	  <td width="50%">Would you like floral arrangements at your funeral?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  <tr>
	  <td cwidth="50%">If you answered YES,what type of floral arrangements do you require?	</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Wreath</td>
	  </tr>
   <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Donations</td>
</tr> 
<tr>
	  <td width="50%">Would you prefer donations at the funeral service in lieu of flowers?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  
	  <tr>
	  <td width="50%">If you answered YES,list the name of organisation</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sfsdfsdfsdf</td>
	  </tr>
	  <tr><td>gfgfgf</td></tr>
	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Stationery</td>
</tr> 
<tr>
	  <td width="50%">Would you like funeral stationery to be provided at your funeral service?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  
	   <tr>
	  <td width="50%" >If you answered YES,what type of funeral stationery do you require</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Booklets</td>
	  </tr>
	   <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Notices</td>
</tr> 
<tr>
	  <td width="50%">Would you like a Funeral Notice placed in the main newspaper?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	   <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Music</td>
</tr> 

<tr>
	  <td width="50%">Do you require music at the funeral?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  <tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">If Yes,what music would you like played at your funeral service?</td>
	  </tr>
	  <tr>
	  <td width="50%" >Music entering (Song /Artist)</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
<tr>
	  <td width="50%">Music during (Song /Artist)</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
<tr>
	  <td width="50%">Music leaving (Song /Artist)</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
	  <tr>
	  <td width="50%">Hyms</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Musician and Singers</td>
</tr> 
<tr>
	  <td width="50%">Would you like a musician or singer to perform at your funeral service?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
	
	  <tr>
	  <td width="50%">Musician or singer details (if applicable):</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fdfff</td>
</tr>
	 
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Media Tributes</td>
</tr>   
<tr>
	  <td width="50%">Would you like a media/DVD tribute about your life during your funeral service ?</td>
	   <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
</tr>
	<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Pall Bearers</td>
</tr>   


	    <tr>
	  <td width="50%">Would you prefer family/friend Pall Bearers OR Pall Bearers provided by a funeral director?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Family/Friend</td>
	  </tr>
	   <tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">If family Pall Bearers are provided, please give their names and relationship to you.</td>
	  </tr>
	  <tr>
	  <td>
	  <table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
	  <td width="80%">Name</td>
	  <td width="80%">Relationship </td>
	  <td width="80%">Sex</td>
	  </tr>
	  <tr>
	  <td width="80%">dfdfFfdf</td>
	  <td width="80%">dfdfFfdf</td>
	  <td width="80%">dfdfFfdf</td>
	  </tr>
	  </table>
	  </td>
	  </tr>
	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Releases</td>
</tr>  
<tr>
	  <td width="50%">Would you like a special funeral release during your funeral service?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr> 
<tr>
	  <td width="50%">If you answered YES, what type of funeral release would you like ?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Doves</td>
	  </tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Other Special Requests</td>
</tr>  
<tr>
	  <td width="50%">Do you require any other special arrangements?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
<tr>
	  <td width="50%">If YES, please describe</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">fsfsfdsfdsf</td>
	  </tr>	  
	  
	  <tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">AFTER THE FUNERAL </td>
</tr>
	  <tr>
	  <td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">Although the funeral itself might seem like the end of the arrangements, there may be some other areas that you need to consider.</td>
	  </tr>
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Funeral Wake</td>
</tr>  

<tr>
	  <td width="50%">Would you like your family and friends to hold a wake to celebrate your life?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Yes</td>
	  </tr>
	  
	  <tr>
	  <td width="50%">If YES, what type of funeral wake would you like?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">vgdgdfgdf</td>
	  </tr>	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Scattering of the Ashes</td>
</tr> 
	  <tr>
	  <td width="50%"> Would you like your ashes scattered at a special place?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">YES</td>
	  </tr>
	    <tr>
<td width="50%">If you answered YES, where would you like them scattered?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">On a family grave</td>
</tr> 
 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Burying of the Ashes</td>
</tr>  
<tr>
	  <td  width="50%">Would you like your ashes to be buried?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">YES</td>	
	  </tr>
	  <tr>
	  <td width=50%">If YES, where would you like them to be buried?</td>
	  <td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">Within the grounds of the crematorium</td>
	  </tr>
 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">Marker/Headstone/Memorial Preferences</td>
</tr>  
<tr>
<td width="50%"> Would you like a marker/headstone or memorial?</td>
	  </tr>
<tr>
<td width="50%">If you answered YES, what would you like written on your inscription?</td>
<td width="3%">:</td>
<td width="70%" style="border-bottom:1px solid #000;">sdgsdfsdfsd</td>
</tr> 
<tr>
<td colspan="3" style="color:#004DD2; font-weight:bold;font-size:14px;">IMPORTANT CONTACTS AND INFORMATION</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:12px;">This list will help you put the pieces of your loved one together and provide information that will assist in sorting and managing the deceased’s affairs in an orderly manner after the funeral.</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;"> A. KEY CONTACTS</td>
	  </tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">1.Family and Friends</td>
	  </tr>
	  <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="100%" style="color:#000; font-weight:bold;font-size:11px;">Name</td>
		<td width="100%" style="color:#000; font-weight:bold;font-size:11px;">Relationship</td>
		<td width="100%" style="color:#000; font-weight:bold;font-size:11px;">Telephone No</td>
	  </tr>
	  <tr>
		<td width="100%">gdfgdfgdfgdfgf</td>
		<td width="100%">dfgfdgdfgfgfdg</td>
		<td width="100%" >85555555555555</td>
	  </tr>
	</table>
</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">2.Important Contacts</td>
	  </tr>
	  <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="100%"style="color:#000; font-weight:bold;font-size:11px;">Category</td>
		<td width="100%"style="color:#000; font-weight:bold;font-size:11px;">Name</td>
		<td width="100%" style="color:#000; font-weight:bold;font-size:11px;">Telephone No</td>
	  </tr>
	  <tr>
		<td width="100%">gdfgdfgdfgdfgf</td>
		<td width="100%">dfgfdgdfgfgfdg</td>
		<td width="100%">55555555555555</td>
	  </tr>
	</table>
</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">3.Service Providers</td>
	  </tr>
	  
	  <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Category</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Name</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Customer Ref #</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Telephone No</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">55555555555555</td>
	  </tr>
	</table>
</td>
</tr>

<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;"> B. INSURANCE INFORMATION</td>
	  </tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">1.Insurance Companies</td>
	  </tr>
	    <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Category</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Policy</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Insurance Company</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Contact Information</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">55558888555555</td>
	  </tr>
	</table>
</td>
</tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;"> C. IMPORTANT INFORMATION</td>
	  </tr>
	 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;"> The Executor/Administrator or family will need to gather a variety of documents following the death in order to settle the deceased persons affairs.</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">1. Financial Information</td>
	  </tr>
	  
	  <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;"> The Executor/Administrator will need information about the deceased persons assets after the death.</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">(a).Assets</td></tr>
 <tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">BANK</td></tr>
   <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Account Type</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Account #</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Bank Name</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">INVESTMENT</td></tr>
   <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Account Type</td>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Account #</td>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Institution Name</td>

	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">PENSION</td></tr>

 <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Type</td>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Account #</td>
		<td width="80%"style="color:#000; font-weight:bold;font-size:11px;">Organisation Name</td>

	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">PROPERTY</td></tr>

<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Type</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Description</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Location</td>

	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">(b).Liabilities</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">In addition to the deceased persons assets, the Executor/Administrator or family will need information about any outstanding debts the deceased person has.</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">LOANS</td></tr>

<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Account Type</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Account #</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Lender Name</td>

	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">CREDIT CARDS</td></tr>
<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Company Name</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Card</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Exp Date</td>
         <td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Phone</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	    <td width="80%">55656565656565</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">D. SOCIAL MEDIA ACCOUNTS</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">The deceased person may have had a number of social media accounts that you need to access</td></tr>

<tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Category</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Username</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Password</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">E. PETS</td></tr>
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">The deceased persons pets may be an important part of their life.</td></tr>
 <tr>
<td>
	<table width="100%" border="1" style="border-color:#ccc;">
	  <tr>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Category</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Name</td>
		<td width="80%" style="color:#000; font-weight:bold;font-size:11px;">Sex</td>
	  </tr>
	  <tr>
		<td width="80%">gdfgdfgdfgdfgf</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
		<td width="80%">dfgfdgdfgfgfdg</td>
	  </tr>
	</table>
</td>
</tr>	
<tr>
<td colspan="3" style="color:#000; font-weight:bold;font-size:11px;">Special Notes</td>
<td>:</td>
<td width="70%">sdsdsdsfsdfdsfd</td>
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
$pdf->Output('shruti01.pdf', 'F');

//============================================================+
// END OF FILE
//============================================================+