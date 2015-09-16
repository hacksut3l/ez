<?php
ob_start();
include_once('include/config.php');
$email=$_REQUEST['email'];
$q=mysql_query("select * from directors where email like '".$email."'");
if(mysql_num_rows($q)>0)
{
	echo 1;
}
else
{
	echo 0;
}
?>