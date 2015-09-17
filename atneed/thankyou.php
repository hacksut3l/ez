<?php
	ob_start();
	include_once('../include/config.php');
	session_start();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>eziFuneral</title>
<link href="../css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="../css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/Old_Include_Js/respond.min.js"></script>
<?php include "../include/header.php"; ?>

</head>
<body><br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />	
<div class="punch_text_02 funral_director_heading">
    <div class="container">
	<div align="left">
        	<font style="font-family: 'Helvetica IE',Arial; font-size:24px;">Thank you..!</font>	
    </div>
	</div>
</div>
<?php
		$data_of_client_payment=mysql_query("select * from client_purchase_info where client_id='".$_SESSION['client']."'");
		$sucess_result=mysql_fetch_array($data_of_client_payment);
		
		



?>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
      <div id="wrapper">
       		<div id="container">
            
            <div style="width:100%; float:left; padding-bottom:20px;">
            	<div class="container">
                <div class="login_wrapper" style="border:2px solid #c2c2c2; margin-top:50px; margin-bottom:50px;">
                	<div class="verify_box">
                  
                        <div class="verify_box_right">
                         <span class="verify_subtitle" style="font-family:Arial, Helvetica, sans-serif; line-height:1.5"><b>Your Payment Process has been completed successfully.<br/>
						 <span style="font-size:17px; line-height:22px;">Your Transaction Number is <span><?php echo $sucess_result['order_id']; ?></span>.</span><br/>
						<span style="font-size:17px; line-height:22px;">Please keep your transaction number for your records.</span><br/>
						<span style="font-size:17px; line-height:22px;">Your personal funeral plan has been sent to you together with links to your FREE resources.</span><br/>
						<span style="font-size:17px; line-height:22px;">Please check your email for details.</span><br/>
						 
						 
						 
						 
						 </b>
						 </span>
					  </div>
                  </div>
                </div>
                
                </div><?php include("../include/footer.php"); 
				
				
				
			?>  
               
            </div>  
            
            </div>
      </div>
      </div>
  </div>

</body>
</html>
