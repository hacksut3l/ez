<?php 
ob_start();
session_start();
//echo dirname(dirname(__FILE__)).'/config.php';exit;
ini_set('max_execution_time', 0);
ini_set('memory_limit', '-1');

include('../config.php');
$id = $_POST['userid'];


$from_date =$_POST['from_date'];

$to_date =$_POST['to_date'];

$sql =

	"SELECT 
	
		a.*,
		
		b.*
	FROM 
		
		director_member_info a,
		directors b
	WHERE
		
		a.director_id= b.id
	AND
		a.director_id = '".$id."'
	
	AND
	    a.d_date
		BETWEEN
			'".$from_date."' 
		AND
			'".$to_date."'
		
	";




/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.6, 2011-02-27
 */
/** Error reporting */
error_reporting(E_ALL);
date_default_timezone_set('Europe/London');
/** PHPExcel */
require_once '../classes/PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
// Add some data
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Invoice Report '.date('d-m-Y'));
$objPHPExcel->getActiveSheet()->setCellValue('B2', "Sr.No");
$objPHPExcel->getActiveSheet()->setCellValue('C2', "Full Name");
$objPHPExcel->getActiveSheet()->setCellValue('D2', "Business Name");
$objPHPExcel->getActiveSheet()->setCellValue('E2', "Order Amount");
$objPHPExcel->getActiveSheet()->setCellValue('F2', "Order Info");
$objPHPExcel->getActiveSheet()->setCellValue('G2', "Order Id");
$objPHPExcel->getActiveSheet()->setCellValue('H2', "Receipt No");
$objPHPExcel->getActiveSheet()->setCellValue('I2', "Card Type");
$objPHPExcel->getActiveSheet()->setCellValue('J2', "Date");


//print($sql);exit;
$result = mysql_query($sql); 
//$ispresent = mysql_num_rows($result);
//echo '-'.$ispresent;exit;

$count = 1;

$i=3;
while($row=mysql_fetch_assoc($result)){

	$user_name = $row['full_name'];
        $business_name = $row['business_name'];
	$amount =    $row['order_amount'];
        $oder_info = $row['order_info'];
         $order_id = $row['order_id'];
         $receipt = $row['receipt_no'];
         $c_type = $row['card_type'];
	$date = $row['d_date'];

$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $count);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $user_name);
$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $business_name);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $amount);
$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $oder_info);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $order_id);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $receipt);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i, $c_type );
$objPHPExcel->getActiveSheet()->setCellValue('J'.$i, $date);

	

$i=$i+1;
$count++;
}
$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'BFBFBFBF')
							),
		
		 )
	);
	$objPHPExcel->getActiveSheet()->getStyle('A2:J2')->applyFromArray(
	array('fill' 	=> array(
								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
								'color'		=> array('argb' => 'EAEAEAEA')
							),
		
		 )
	);



$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setName('Arial');

$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(35);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);





$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('D2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('H2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('I2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('I2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('J2')->getFont()->setSize(11);
$objPHPExcel->getActiveSheet()->getStyle('J2')->getFont()->setBold(true);




// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Invoice Report'.date('d-m-Y H:i:s').'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;



?>
