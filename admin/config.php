<?php 
//error_reporting(0);
error_reporting(0);
define('base_url','http://ezifunerals.com.au/'); // please prepend 'http://' and append '/' along with the Domain address

define('folder_name','/clients/ezi-funeral');


$hostname = "mysql-5.ezifunerals.com.au"; 
$db_user = "myezif1002"; 
//$db_password = "R5qQT6bb"; 
$db_password = "TplhXwvC"; 
$database = "ezifunerals_ezifunerals_com_au";  
$db = mysql_connect($hostname, $db_user, $db_password); 
mysql_select_db($database,$db);		

//$connect = @mysql_connect($hostname, $db_user, $db_password);//won't display the warning if any.
//if (!$connect) { echo 'Server error. Please try again sometime. CON'; }
?>
<?php 
/*error_reporting(0);
define('base_url','http://localhost/EZI/'); // please prepend 'http://' and append '/' along with the Domain address

define('folder_name','/clients/ezi-funeral');

$hostname = "localhost"; 
$db_user = "root"; 
$db_password = ""; 
$database = "ezifunerals_ezifunerals_com_au";  
$db = mysql_connect($hostname, $db_user, $db_password); 
mysql_select_db($database,$db);	 */
?>