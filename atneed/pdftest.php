<?php
include_once('../include/config.php');
?>
<html>
<head>
	<style>
	@media print
	{
		.formdiv {page-break-after:always}
	}
	
	
	body {
	font-family:Arial, sans-serif;
	font-size:10pt;
	margin:0 auto;
	color:#4a4a4a;
}
	h1{font-size: 22pt; }
	.tr-class{
	font-size:12pt;
	border:1px dashed #CCCCCC;
	}
	.td-class{
		font-size:12pt;
		border:1px dashed #CCCCCC;
		padding:8px;
	}
	.blue{ color:#0096a8;font-weight:bold;}
	.bold{ font-weight:bold; }
	.formdiv{width:100%;}
	</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>

<!--page landing start here-->
<div style="width:100%;" class="formdiv">
<center>
	<table align="center">
    	<tr>
       	  <td style="padding:5px; text-align:center;"><h1>
          <span style="font-size:38px; color:#333333;">At Need Funeral Plan</span></h1></td>
      </tr>
	</table>
	
	<table align="center" style="margin-top:120px;">
    	<tr>
       	  <td style="padding:5px; text-align:center;"><h1><span style="font-size:48px;">Person Name</span></h1></td>
      </tr>
	</table>
    
    <table align="center" style="border:0; margin-top:200px;">
		<tr>
            <td style="text-align:center;">
            <a href="index.html" title="">
           <img src="<?php echo base_url;?>images/logo1.jpg" alt="" /></a>
            </td>
        </tr>
        <tr>
            <td style="text-align:center;">
            	<img src="images/top-right-img.jpg"><br>
                <strong>Address:</strong>
            </td>
    	</tr>
        <tr>
        	<td style="text-align:center; font-size:12px;">
            	Dummy Text Dummy Text Dummy Text<br>
                Dummy Text Dummy Text Dummy Text
            </td>
        </tr>
    </table>
    </center>
 
</div>



<!--page 1st start here-->
<div style="width:100%;" class="formdiv">
	<table align="center" style="border:0; width:96%;">
		<tr>
            <td style="text-align:right; border:0; padding:10px;">
            <a href="index.html" title="">
           <img src="<?php echo base_url;?>images/logo1.jpg" alt="" /></a>
   			<br/><img src="images/top-right-img.jpg">
            </td>
    	</tr>
    </table>
	<table align="center" style="width:96%;">
    	<tr>
       	  <td style="padding:5px;" align="center"><h1>PERSON MAKING ARRANGEMENTS</h1></td>
      </tr>
        <tr>
        	<td style="padding:5px; background-color:#696969;"><strong>My Personal Details</strong></td>
        </tr>
		<tr>
   	  	  <td style="padding:5px;font-size:18px;"><strong>Full Name:</strong><span class="blue"> <?php echo ucwords($person['f_name'])." ".ucwords($person['m_name'])." ".ucwords($person['l_name']);?> </span></td>
	  </tr>
      <tr>
   	  	  <td style="padding:5px;font-size:18px;"><strong>Address:</strong>  <?php echo $person['address1'].",".$person['address2'].",".$person['suburb'].",".$person['state'].",".$person['postcode'];?></td>
	  </tr>
      <tr>
			<td style="padding:5px;font-size:18px;"><strong>Ph.:</strong> <?php echo $person['telephone']?></td>
	  </tr>
      <tr>
            <td style="padding:5px;font-size:18px;"><strong>Mob.:</strong><?php echo $person['mobile']?></td>
	  </tr>
      <tr>
            <td style="padding:5px;font-size:18px;"><strong>Email.:</strong><?php echo $person['email']?></td>
	  </tr>
	</table>
    <table align="center" style="width:96%; margin-bottom:10px; margin-top:10px;" >
        <tr class="tr-class">
            <td style="padding:5px;font-size:14px; background-color:#696969;" class="td-class"><span class="bold">Relationship to the deceased</span></td>
            <td style="padding:5px;font-size:14px; background-color:#696969;" class="td-class"><span class="bold">Funeral Costs and Payments</span></td>
            <td style="padding:5px;font-size:14px; background-color:#696969;" class="td-class"><span class="bold">Method Of Funeral Payment</span></td>
        </tr>
        <tr>
             <td style="padding:5px;font-size:14px;" class="td-class"><?php echo ucwords($person['realtions'])?></td>
             <td style="padding:5px;font-size:14px;" class="td-class"><?php echo $person['budget']?></td>
             <td style="padding:5px;font-size:14px;" class="td-class"><?php echo ucwords($person['payment_methods'])?></td>
       </tr>
   </table>
   <table align="center" style="width:96%;">
    	<tr>
       	  <td width="50%" style="padding:5px;font-size:18px;"><strong>Date: <span class="blue"> <?php echo $person['date']?></span></strong></td>
          <td width="50%"></td>
      </tr>
</table>
</div>


	

</body>
</html>