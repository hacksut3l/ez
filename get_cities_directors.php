<?php
	ob_start();
	include_once('include/config.php');
	session_start();
	
	
	$sql = "SELECT * FROM cities WHERE state_id = '".$_POST['state_id']."' ORDER BY city_name ";
	$sqlex = mysql_query($sql);
	
	$ispresent = @mysql_num_rows($sqlex);
	
	$str = '<select class="selectOptions2 findSelect" name="city" id="city">';
	
	if($ispresent > 0)
	{
		while($result = mysql_fetch_assoc($sqlex))
		{
			$str .= '<option value="'.$result['city_id'].'">'.$result['city_name'].'</option>';
		}
	}
	else
	{
		$str .= '<option value="">Select City</option>';
	}
	
	$str .= '</select>';
	
	echo $str;
	
?>