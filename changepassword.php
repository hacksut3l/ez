<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->

<?php include'include/main_header.php'; ?>
<?php ob_start();
	@session_start();?>
<br><br><br><br><br><br><br><br><br>
<div class="container">
	Welcome <strong style="color: #0090ad;"><?php echo $_SESSION['name'];?></strong>
</div>
<center><font style="font-size:28px; font-family:Arial, Helvetica, sans-serif;">Change Password</font></center><br>
<div>
   
    <form name="changepassword" action="client_info_update.php" method="POST">
				<center>
                <table>
					
					<tr>
						<td  style="padding:5px;"><div class="name-full">New Password:-</div></td>  
				   		<td  style="padding:5px;"><input name="password" type="password" size="40"></td>	
				   
				    </tr>
					<tr>
						<td  style="padding:5px;"> <div class="name-full">Confirm Password:-</div></td>  
				   		<td  style="padding:5px;"><input name="cnfrm_password" type="password" size="40"></td>	
				   
				    </tr>
					
					</table>
					<br>
						 <input class="formspan1_a get_btn_bxshdo1" type="submit" id="submit" name="update" value="UPDATE" style="width:100px; height:35px; background:#00a3b4;color:#FFFFFF; border-style:ridge;"/> 
				   		
					</center>
					 <input type="hidden" value="password" name="type" />
	</form>				
<br>

<div class="grey_bg" align="center" style="background:#e8e8e8; height:70px;">
	
        <div class="center"><img src="images/footer_AD.png" width="620"></div>
        
</div>



<!-- Footer
======================================= -->
<?php include 'include/main_footer.php'; ?>
</html>