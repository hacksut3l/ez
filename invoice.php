<?php 

 if($row_of_plan['user_type'] == '2') { $plan = "Standard"; } else { $plan = "Premium "; } 
	$to       = $email;
	$subject  = "Thank you for your payment!";
	$header   = "peter@ezifunerals.com.au' => 'eziFunerals"; 
	$msg      = '





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ezi funeral</title>

</head>
<body style="font-size: 13px; line-height: 19px;  margin: 0;  padding: 0;  width: 100%;">
<div style="border: 1px solid #CCCCCC;float: left;  margin-left: 50px; padding-bottom: 20px; width: 800px;">
<div class="head" style="width:100%; float:left; margin-top:6px;padding-bottom:10px;">
<div style="float:left; width:32%; margin-left: 15px;">
<a href="http://ezifunerals.com.au"  style="color:#000;" target="_blank"><img style="display:block;" src="'.base_url.'emailImages/image001.jpg" alt="Logo" /></a>
</div>
<div style="float:left; width:36%; font-family:Arial, Helvetica, sans-serif;">eziFunerals Pty Ltd<br/>ABN 20 460 418 090<br/>www.ezifunerals.com.au</div>
<div style="float: right;width: 28%;font-family: Arial, Helvetica, sans-serif;text-align: right;margin-right: 10px;font-size: 18px;">INVOICE</div>

</div>

<div style="width:100%; float:left; font-family:Arial, Helvetica, sans-serif;">

<div style="width:50%; float:left;">

<div style="padding-left:15px; width:95%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;margin-left:5px; margin-right:5px; margin-top:5px; background:#dddddd; color:#0d0d0d; text-transform:uppercase;border-top-left-radius:3px; border-top-right-radius:3px; border:1px solid #ccc;">Billed To :</div>
<div style="width: 95%;float: left;font-family: Arial,Helvetica,sans-serif;margin-left: 5px;margin-right: 5px;margin-bottom: 5px;border: 1px solid #ccc;border-bottom-left-radius: 3px;border-bottom-right-radius: 3px;padding: 5px;">
'.$name.'<br/>
'.$result1['business_name'].'<br/>
'.$result1['address'].'<br/>
'.$city_name .$result1['postal_code'].'<br/>
'.$result1['country'].'<br/>
'.$result1['phone'].'<br/></div>
</div>


<div style="width:50%; float:left;">
<!--<div class="inner">
<div class="id3">Date:</div>
<div class="id4">1/07/2013</div>
</div>-->
<div style="width:100%; float:left;">
<div style="padding-left: 15px;width: 43.4%;float: left;font-family: Arial, Helvetica, sans-serif;background: #dddddd;color: #0d0d0d;text-transform: uppercase;border-top-left-radius: 3px;padding: 5px;margin-top: 5px;border-bottom: 0;border: 1px solid #ccc;">Order ID:
</div>
<div style="width: 50%;float: left;font-family: Arial, Helvetica, sans-serif;padding: 5px;border-top-right-radius: 3px;margin-top: 5px;border: 1px solid #ccc;border-left: 0px;">'.$receipt.'
</div>
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif;background:#dddddd; color:#0d0d0d; text-transform:uppercase;padding:5px;border-bottom: 1px solid #ccc; ">Order Total:
</div>
<div style="width: 50%;float: left;font-family: Arial, Helvetica, sans-serif;padding: 5px;border: 1px solid #ccc;border-top: 0;border-left: 0;">'.$reg_amount.' </div>
</div>
<div style="width:100%; float:left;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif;background:#dddddd; color:#0d0d0d; text-transform:uppercase;padding:5px;border-bottom: 1px solid #ccc; ">Payment Method:</div>
<div style="width: 50%;float: left;font-family: Arial, Helvetica, sans-serif;padding: 5px;border: 1px solid #ccc;border-top: 0;border-left: 0;">'.$card.' </div>
</div>
<div style="width:100%; float:left;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif;background:#dddddd; color:#0d0d0d; text-transform:uppercase;padding:5px; border-bottom-left-radius:3px;border-bottom: 1px solid #ccc;">Receipt #:</div>
<div style="width: 50%;float: left;font-family: Arial, Helvetica, sans-serif;padding: 5px;border-bottom-right-radius: 3px; border: 1px solid #ccc;border-top: 0;border-left: 0;">'.$receipt.' </div>
</div>

</div>
</div>

<table width="400" cellspacing="1" cellpadding="1" style="float:left; width:100%; margin-top:10px;">
  <tr>
    <td style="background: #dddddd;font-family: Arial, Helvetica, sans-serif;text-align: center;border: 1px solid #f1f1f1;border-left: inherit;color: #0d0d0d;text-transform: uppercase;border-right: 1px solid #ccc;border: 0;">Item</td>
    <td style="background:#dddddd; font-family:Arial, Helvetica, sans-serif; border:1px solid #ccc; margin-left:10px; border-left:inherit; color:#0d0d0d; text-transform:uppercase">Description</td>
    <td style="background:#dddddd; font-family:Arial, Helvetica, sans-serif; text-align:center; border:1px solid #ccc; border-left:inherit; color:#0d0d0d; text-transform:uppercase;">Qty</td>
    <td style="background:#dddddd; font-family:Arial, Helvetica, sans-serif; text-align:center; border:1px solid #ccc; border-left:inherit; color:#0d0d0d;text-transform:uppercase;">Rate</td>
    <td style="background:#dddddd;  font-family:Arial, Helvetica, sans-serif; text-align:center; border:1px solid #ccc; border-left:inherit;color:#0d0d0d; text-transform:uppercase;">Price</td>
  </tr>
  <tr>
    <td style="font-family: Arial,Helvetica,sans-serif; padding-top: 3px; text-align: center; vertical-align: top;">1</td>
    <td style="font-family:Arial, Helvetica, sans-serif; margin-left:10px;border-right: 1px solid #f1f1f1;
border-left: 1px solid #f1f1f1;">'.$plan.' Membership Package<br/></td>
    <td style="font-family: Arial,Helvetica,sans-serif; padding-top: 3px; text-align: center; vertical-align: top;border-right: 1px solid #f1f1f1;">1</td>
    <td style="font-family: Arial,Helvetica,sans-serif; padding-top: 3px; text-align: center; vertical-align: top;border-right: 1px solid #f1f1f1;">'.$reg_amount.'</td>
    <td style="font-family: Arial,Helvetica,sans-serif; padding-top: 3px; text-align: center; vertical-align: top;">'.$reg_amount.'</td>
  </tr>
    <tr>
        <td colspan="2" style="font-family: Arial,Helvetica,sans-serif; padding-top: 3px; text-align: center; vertical-align: top;"></td>
    </tr>
</table>

<div style="width:100%; float:left;border-top:1px solid #ccc;">
<div style="width:100%; float:left;"></div>
<div style="width:50%; float:right; ">
<div style=" width: 80%;float: right;border: 1px solid #ccc;border-top: 0;border-radius: 5px;">
<div style="width:100%; float:left;border-bottom: 1px solid #ccc;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px; font-weight:bold;">Total Purchases:</div>
<div style="width:49%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;">'.$reg_amount.'</div>
</div>
<div style=" width:100%; float:left;border-bottom: 1px solid #ccc;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;font-weight:bold;">Order Total:
</div>
<div style="width:49%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;">'.$reg_amount.'</div>
</div>
<div style="width:100%; float:left;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;font-weight:bold;">Payment:</div>
<div style="width:49%; float:left; font-family:Arial, Helvetica, sans-serif;padding:5px;">'.$reg_amount.'</div>
</div>
    <div style="border-top:1px solid #ccc; width:100%; float:left;">
<div style="padding-left:15px; width:93%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;font-weight:bold;"><strong>GST included in total amount paid</strong></div>

		</div>
<div style="border-top:1px solid #ccc; width:100%; float:left;">
<div style="padding-left:15px; width:44%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px;font-weight:bold;"><strong>Balance:</strong></div>
<div style="width:49%; float:left; font-family:Arial, Helvetica, sans-serif; padding:5px; margin-left:0px;"><strong>AUD 0.00</strong></div>
		</div>
		</div>
		</div>
	</div>
    <div style="float:left; width:100%;text-align:center; font-family:Arial,Helvetica,sans-serif; font-size:16px;padding:5px;margin-top: 10px;">Thank you for your business !</div>
	</div>


</body>

</html>';

$send=email("eziFunerals",$to,$msg,$subject,"No"); ?>