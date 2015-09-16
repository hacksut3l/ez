<?php
include "MailConfig2.php"; 
	ob_start();
	include_once('include/config.php');
	@session_start();
	error_reporting(0);
	
	//require_once('atneed/swift/swift_required.php');
	
	$directorsql = "SELECT * FROM directors WHERE id = '".$_REQUEST['director_id']."' ";
	
        $directorex = mysql_query($directorsql);
	
	$director = mysql_fetch_assoc($directorex);
	
	
	
	$clientsql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."'";
	$clientex = mysql_query($clientsql);
	
	//echo $clientsql;exit;
	
	
	$client_result = mysql_fetch_assoc($clientex);
	
	
 $pdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$client_result['id']."' ORDER BY date DESC LIMIT 1";
	
       
       //exit;
        
	$pdfex = mysql_query($pdfsql);
	
	$is_pdf_present = @mysql_num_rows($pdfex);
	
	$pdfresult = mysql_fetch_assoc($pdfex);
	
	
	$director_business = $director['business_name'];
	$dir_name = $director['full_name'];
	
	$dir_email = $director['email'];
    
	$inv_from = $_SESSION['name'];
	
	
	$client_name = $client_result['first_name'].' '.$client_result['last_name'];
	
	$client_phone = $client_result['phone'];
	
	$client_email = $client_result['email']; 
	
 	$service_required = $pdfresult['funeral_service'];
	
	$reason = $pdfresult['reason_quote'];
	
	$budget = $pdfresult['budget'];
	
	$pdfname=$pdfresult['pdf_name'];
	
	 //echo $budget;
	
	if($pdfresult['pdf_name'] != '')
	{
		

		$pdfname=$pdfresult['pdf_name'];
		

	}
		
	
	$user ="EziFunerals";
    $password ="Ercyman123";
    $api_id = "3539273";
    $baseurl ="http://api.clickatell.com";
 	$phone=$director['phone'];
    $text = urlencode("Hi.You have received an invitation to quote on a funeral. Please check your email for further details and login to your eziFunerals account. Regards, eziFunerals. Automated SMS - do not reply");
    $to ='+61'."$phone";
 
    // auth call
   $url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
 
    // do auth call
    $ret = file($url);
 
    // explode our response. return string is on first line of the data returned
    $sess = explode(":",$ret[0]);
    if ($sess[0] == "OK") 
	{
 
        $sess_id = trim($sess[1]); // remove any whitespace
       $url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
 
        // do sendmsg call
        $ret = file($url);
  
  
        $send = explode(":",$ret[0]);
 	 	$send[0];
        if ($send[0] == "ID")
		{
           // echo "successnmessage ID: ". $send[1];
        }
		else
		 {
           // echo "send message failed";
         }
    }
	else
	{
       // echo "Authentication failure: ". $ret[0];
    }	 
	 
	
	// Send the email, and show user message
	
	
	require_once('send_invite.php');
	
	 $sql_invite = "INSERT
				INTO
					invite
					(
						invite_from,
						invite_to,
						date,
						client_view
					)
				VALUES
					(
						'".$_SESSION['client']."',
						'".$director['id']."',
						NOW(),
						'active'
					)
				";
				
		mysql_query($sql_invite);
	
		
		
		echo '1';
		
	
		
	
?>