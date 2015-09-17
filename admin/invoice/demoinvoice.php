<?php 
	include('../config.php');
	
	//error_reporting(0);
	
  $sel="select * from directors INNER JOIN lead_invoice ON lead_invoice.req_to=directors.id";
 
 $rel=mysql_query($sel);
 $charge = 50;
 while($row=mysql_fetch_array($rel))
 {
 		
		$seldata="SELECT * FROM invite WHERE invite_to = '".$row['id']."'";
		$result=mysql_query($seldata);
		$count=mysql_num_rows($result);
		$row_client=mysql_fetch_array($result);
		
		$state=mysql_query("select * from states where state_id='".$row['state']."'");
		$row_state=mysql_fetch_array($state);
		
		if($count > 0)
		{
		
			$charge1=$count*$charge;
			
		}
	
?>


<table width="600" border="0" cellpadding="5" cellspacing="0" style="padding:5px; border:1px solid #999;">
<tr>
<td width="39%" valign="top"><a href="#"  style="color:#000;"><img style="display:block;" src="http://ezifunerals.com.au/emailImages/image001.jpg" alt="Logo" /></a></td>
<td width="61%" align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:22px; color:#000;">Receipt/Tax Invoice</td>
</tr>
<tr>
<td align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">ABN 20 460 418 090</td>
</tr>
</table>
</td>
<td align="right" valign="bottom" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
Date: <?php //echo $currentdate;?><br />
Invoice # <?php //echo $invoice_no;?></td>
</tr>
<tr>
  <td colspan="2">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td width="39%" align="left" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">To,<br /><?php echo $row['full_name'];?><br />
    <?php echo $row['business_name'];?>,<br />
    <?php echo $row['address'];?>,<br />
    <?php echo $row['city_name'];?><?php echo $row_state['state_name'];?>,<?php echo $row['postal_code'];?><br /></td>
  <td width="61%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">&nbsp;</td>
  </tr>
  </table>
  </td>
</tr>
<tr>
  <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">Membership Type: Standard<br />
</tr>
</table>
</td>
</tr>
<tr>
  <td colspan="2" style=" padding-bottom:5px;">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4" bgcolor="#d0dede" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">
  <tr>
  <td width="31%" height="30" align="center" bgcolor="#00a3b6"><strong>Description</strong></td>
  <td width="22%" align="center" bgcolor="#00a3b6"><strong>Date</strong></td>
  <td width="17%" align="center" bgcolor="#00a3b6"><strong>Unit  Price</strong></td>
  <td width="16%" align="center" bgcolor="#00a3b6"><strong>Qty</strong></td>
  <td width="14%" align="center" bgcolor="#00a3b6"><strong>Total</strong></td>
  </tr>
  
<?php
  

    $clientsql = "SELECT first_name FROM clients WHERE id = '".$row_client['invite_from']."' LIMIT 1  ";
    $clientex = mysql_query($clientsql);

    $client = mysql_fetch_assoc($clientex);

    $invite_date = explode('-',$row_client['date']);
    $invite_date = $invite_date[2].'/'.$invite_date[1].'/'.$invite_date[0];
?>

  <tr>
  <td valign="top" bgcolor="#dedede" style="padding:5px 0 5px 20px;"> Funeral quote request<br />
    (Client  name: <?php echo $client['first_name'];?>)</td>
  <td align="center" valign="top" bgcolor="#dedede"><?php echo $invite_date;?></td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$<?php echo $charge;?>.00</td>
  <td align="center" valign="top" bgcolor="#dedede">1</td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$<?php echo $charge;?>.00</td>
  </tr>
  <tr>
  <td height="2" colspan="5" valign="top" bgcolor="#ffffff"></td>
  </tr>
  


  <tr>
  <td colspan="3" valign="top" bgcolor="#dedede">&nbsp;</td>
  <td valign="top" bgcolor="#dedede" style="padding:5px 0px 5px 10px;"><strong>Subtotal</strong></td>
  <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$<?php echo $charge1;?></td>
  </tr>
  <tr>
  <td height="2" colspan="5" valign="top" bgcolor="#ffffff"></td>
  </tr>
  <tr>
    <td colspan="3" valign="top" bgcolor="#dedede">&nbsp;</td>
    <td valign="top" bgcolor="#dedede" style="padding:5px 0px 5px 10px;"><strong>Total</strong></td>
    <td align="right" valign="top" bgcolor="#dedede" style="padding:5px 20px 5px 0px;">$<?php echo $charge1;?></td>
  </tr>
  </table>
  </td>
</tr>
<tr>
<td colspan="2" valign="top" style=" padding-bottom:5px;"><table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">GST included in total amount</td>
  </tr>
  <tr>
    <td height="30" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;">Thank you for your business!</td>
  </tr>
  <tr>
    <td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#666;"><strong>Please be advised this  receipt has been issued subject to the successful <br />clearance of funds by your  financial institution.</strong></td>
  </tr>
</table></td>
</tr>
</table>
<?php
		
 
	
}
	
?>