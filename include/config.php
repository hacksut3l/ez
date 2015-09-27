<?php 
error_reporting(0);
define('base_url',''); // please prepend 'http://' and append '/' along with the Domain address

define('folder_name','/');

$hostname = "localhost"; 
$db_user = "root"; 
//$db_password = "R5qQT6bb"; 
$db_password = "6yhn7ujm8ik,";
$database = "ezifunerals_ezifunerals_com_au";  
$db = mysql_connect($hostname, $db_user, $db_password); 
mysql_select_db($database,$db);	
?>
<?php 
/*error_reporting(0);
define('base_url','http://localhost/ezi/'); // please prepend 'http://' and append '/' along with the Domain address

//define('folder_name','/clients/ezi-funeral');

$hostname = "localhost"; 
$db_user = "root"; 
$db_password = ""; 
$database = "ezifunerals_ezifunerals_com_au";  
$db = mysql_connect($hostname, $db_user, $db_password); 
mysql_select_db($database,$db);	*/
?>