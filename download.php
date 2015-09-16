<?php
//download.php
include'include/config.php';
$filename=$_GET['filename'];
$type=$_GET['type'];
$file=$type."/Pdf_Uploads/".$filename;
//$file="advance/Pdf_Uploads/".$filename;

$len = filesize($file); // Calculate File Size
header("Content-Type:application/octet-stream"); 
//header("Content-Type: application/pdf");
header("Cache-Control: max-age=0");
header("Accept-Ranges: none");
header("Pragma: public");
header("Expires: 0");

//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public"); 
header("Content-Description: File Transfer");
header("Content-Transfer-Encoding:base64");
// Send type of file
//header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$len); // Send File Size
$header="Content-Disposition: attachment; filename='".$filename."'"; // Send File Name
header($header );
//header($content);

 readfile($file);

if(!is_readable($file))
{

echo 'error';
}

exit;

?>