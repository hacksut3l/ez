<?php
	include_once('config.php');

	$type = $_POST['type'];
	$business_name = $_POST['name'];

	if($type == '2'){

		$sql = "SELECT
					id,
					business_name
				FROM 
					directors
				WHERE 
					business_name LIKE '%".$business_name."%'
				AND 
					user_type = '2'
				LIMIT 10
				";

		$sqlex = mysql_query($sql);
		$ispresent = @mysql_num_rows($sqlex);

		if($ispresent > 0){

			while($result = mysql_fetch_assoc($sqlex))
			{
				$id = $result['id'];
				$name = $result['business_name'];
				
				$data[] = array(
				'groups' => $name,
				'id' => $id
				);
			}

		}
		else
		{
			$data[] = array(
				'groups' => 'Not found',
				'id' => 0
				);
		}

		echo json_encode($data);
		exit;


	}


?>