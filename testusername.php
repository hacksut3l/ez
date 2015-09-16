<?php
ob_start();
include_once('include/config.php');
$username=$_REQUEST['username'];
$q=mysql_query("select * from directors where username = '".$username."'");
if(mysql_num_rows($q)>0)
{
	echo 1;
}
else
{
	echo 0;
}
?>