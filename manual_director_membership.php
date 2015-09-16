<?php
	ob_start();
	include_once('include/config.php');
	@session_start();
		
	$pagesql = "SELECT * FROM packages ORDER BY id ";
	$pageex = mysql_query($pagesql);
	
	$value = array();
	
	while($packages = mysql_fetch_assoc($pageex))
	{
		array_push($value,$packages['slug']);
	}
	
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
<link href="css/Old_Include_Css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/Old_Include_Css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/Old_Include_Js/respond.min.js"></script>

</head>
<body>
<script type='text/javascript'><!--
			$(document).ready(function() {
				enableSelectBoxes();
			});
			
			function enableSelectBoxes(){
				$('div.selectBox1').each(function(){
					$(this).children('span.selected1').html($(this).children('div.selectOptions1').children('span.selectOption1:first1').html());
					$(this).attr('value',$(this).children('div.selectOptions1').children('span.selectOption1:first1').attr('value'));
					
					$(this).children('span.selected1,span.selectArrow1').click(function(){
						if($(this).parent().children('div.selectOptions1').css('display') == 'none'){
							$(this).parent().children('div.selectOptions1').css('display','block');
						}
						else
						{
							$(this).parent().children('div.selectOptions1').css('display','none');
						}
					});
					
					$(this).find('span.selectOption1').click(function(){
						$(this).parent().css('display','none');
						$(this).closest('div.selectBox1').attr('value',$(this).attr('value'));
						$(this).parent().siblings('span.selected1').html($(this).html());
					});
				});				
			}//-->
		</script>
<div class="gridContainer clearfix">
<?php include("include/main_header.php"); ?>
	  <div id="LayoutDiv1">
		  <div id="wrapper">
				
				<div id="container"><br/><br/><br/><br/><br/>
					
						<div style="width:100%; float:left; padding-bottom:20px;">
							<div class="log_ex">
							<div class="login_wrapper" style="box-shadow:none;">
								<div class="reg_box">
									<span class="login_head">Membership Fees – Funeral Directors
									</span>
									<p>Funeral Director Membership Packages</p>
									<div class="director_membership_box">
										<div class="director_mem_img"><img src="images/director_member.jpg"/></div>
										<div class="membership_box">
											<div class="membership_con_box"><strong>Member Benefits</strong></div>
											<div class="membership_con_box"><strong>Free Member</strong></div>
											<div class="membership_con_box"><strong>Standard Member Most Popular</strong></div>
											<div class="membership_con_box membrship_last_box"><strong>Premium Member</strong></div>
											<div class="membership_lt_blue">
												<div class="membership_con_box mem_packages_height"><strong>MemberShip Packages</strong></div>
												<div class="membership_con_box mem_packages_height">
													<ul><li>FREE</li></ul>
												</div>
												<div class="membership_con_box mem_packages_height">
													<ul>
														<li>$99 one-time setup fee</li>
														<li>$50 per exclusive lead</li></li>
													</ul>
												</div>
												<div class="membership_con_box mem_packages_height membrship_last_box">
													<ul>
														<li>$199/month + $20 per additional location(s) </li>
													</ul>
												</div>
											</div>
											 <div class="membership_white">
												<div class="membership_con_box mem_ol_profile_height"><strong>Establish your Online Profile</strong><br> We'll help make it easy for your customers to find you 
			</div>
												<div class="membership_con_box mem_ol_profile_height"><ul><li>Contact Information Listing</li></ul></div>
												<div class="membership_con_box mem_ol_profile_height">
													<ul>
														<li>Contact Information Listing</li>
														<li>Descriptive "About Us" section</li>
														<li>Photo and Video Gallery </li></li>
													</ul>
												</div>
												<div class="membership_con_box mem_ol_profile_height membrship_last_box">
													<ul>
														<li>Contact Information Listing</li>
														<li>Descriptive "About Us" section</li>
														<li>Photo and Video Gallery </li></li>
													</ul>
												</div>
											</div>
											<div class="membership_lt_blue">
												<div class="membership_con_box"><strong>Build Brand Visibility</strong><br> We'll help your brand stand out from the rest</div>
												<div class="membership_con_box"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box">
													<ul>
														<li>Priority search results above Free members</li>
													</ul>
												</div>
												<div class="membership_con_box membrship_last_box">
													<ul>
														<li>Guaranteed priority position above Standard members</li>
													</ul>
												</div>
											</div>
											 <div class="membership_white">
												<div class="membership_con_box mem_advt_feature_height"><strong>Get Exclusive Advertising Features</strong></div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height membrship_last_box"><ul><li>Exclusive advertising in the "Featured Premium Members" section on the top of Find a Funeral Director search page. </li></ul></div>
											</div>
											
											<div class="membership_lt_blue">
												<div class="membership_con_box mem_plead_gen_height"><strong>Lead Generation Tools</strong><br>We'll drive consumers to you
			</div>
												<div class="membership_con_box mem_plead_gen_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_plead_gen_height">
													<ul>
														<li>Exclusive leads from customers inviting you to quote on their funeral</li>
													</ul>
												</div>
												<div class="membership_con_box mem_plead_gen_height membrship_last_box">
													<ul>
														<li>Exclusive leads from customers inviting you to quote on their funeral</li>
													</ul>
												</div>
											</div>
											
											<div class="membership_white">
												<div class="membership_con_box mem_advt_feature_height"><strong>Get Ratings and Reviews</strong><br>
			Engage with customers and build your reputation
			</div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Connect with customers direct using ratings and reviews features</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height membrship_last_box"><ul><li>Connect with customers direct using ratings and reviews features</li></ul></div>
											</div>
											<div class="membership_lt_blue">
												<div class="membership_con_box mem_plead_gen_height"><strong>Promote Special Offers</strong><br>Provide your customers with exclusive offers
			</div>
												<div class="membership_con_box mem_plead_gen_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_plead_gen_height">
													<ul><li>Not Included</li></ul>
												</div>
												<div class="membership_con_box mem_plead_gen_height membrship_last_box">
													<ul>
														<li>Promote special offers as an incentive for customers to contact your business</li>
													</ul>
												</div>
											</div>
											<div class="membership_white">
												<div class="membership_con_box mem_advt_feature_height"><strong>Performance Tracking</strong>
			We'll let you know how your investment in eziFunerals is working
			</div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Not Included</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height"><ul><li>Access to real-time metrics reporting.</li></ul></div>
												<div class="membership_con_box mem_advt_feature_height membrship_last_box"><ul><li>Access to real-time metrics reporting.</li></ul></div>
											</div>
											<div class="membership_lt_blue">
												<div class="membership_con_box">&nbsp;
			</div>
												<div class="membership_con_box">
											   <!-- <a href="#">View Package</a>-->
												<a href="free-membership-registration.php?id=<?php echo $_REQUEST['id'];?>"><input type="button" value="Sign Up" class="invite_director_btn"/></a> </div>
												<div class="membership_con_box">
													<!--<a href="#">View Package</a>-->
													<a href="manual_standard_registration.php?id=<?php echo $_REQUEST['id']?>"><input type="button" value="Apply Now" class="invite_director_btn add_blue"/></a>
												</div>
												<div class="membership_con_box membrship_last_box">
													<!--<a href="#">View Package</a>-->
													<a href="manual_premium_registration.php?id=<?php echo $_REQUEST['id']?>"><input type="button" value="Apply Now" class="invite_director_btn add_green"/></a>
												</div>
											</div>
										   
											
										</div>
									</div>
							
							
	<!--                        <div class="director_membership_box_m">
								<div class="m_title">MemberShip Packages</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Free</p>
								<p><strong>Standard Member Most Popular</strong></p>
								
								<ul>
									<li>$99 one-time setup fee</li>
									<li>$25 per cremation lead</li>
									<li>$50 per burial lead</li>
								</ul>
								<p><strong>Premium Member</strong></p>
								<ul>
									<li>$199/month + $10 per additional location(s) </li>
								</ul>
								</div>
							</div>
							<div class="director_membership_box_m">
								<div class="m_title">Establish your Online Profile We'll help make it easy for your customers to find you </div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Contact Information Listing</p>
								<p><strong>Standard Member Most Popular</strong></p>
								
								<ul>
									<li>Contact Information Listing</li>
									<li>Descriptive "About Us" section</li>
									<li>Photo and Video Gallery </li>
								</ul>
								<p><strong>Premium Member</strong></p>
								<ul>
									<li>Contact Information Listing</li>
									<li>Descriptive "About Us" section</li>
									<li>Photo and Video Gallery </li>
								</ul>
								</div>
							</div>
							
							<div class="director_membership_box_m">
								<div class="m_title">Build Brand Visibility We'll help your brand stand out from the rest</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								
								<ul>
									<li>Priority search results above Free members</li>
								</ul>
								<p><strong>Premium Member</strong></p>
								<ul>
									<li>Guaranteed priority position above Standard members</li>
								</ul>
								</div>
							</div>
							<div class="director_membership_box_m">
								<div class="m_title">Get Exclusive Advertising Features</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								<p>Not Included</p>
								<p><strong>Premium Member</strong></p>
								<ul>
									<li>Exclusive advertising in the "Featured Premium Members" section on the top of Find a Funeral Director search page. </li>
								</ul>
								</div>
							</div>
							
							<div class="director_membership_box_m">
								<div class="m_title">Lead Generation Tools We'll drive consumers to you</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								<ul>
									<li>Exclusive leads from customers inviting you to quote on their funeral</li>
								</ul>
								<p><strong>Premium Member</strong></p>
								 <ul>
									<li>Exclusive leads from customers inviting you to quote on their funeral</li>
								</ul>
								</div>
							</div>
							<div class="director_membership_box_m">
								<div class="m_title">Get Ratings and Reviews
	Engage with customers and build your reputation
	</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								<ul>
									<li>Connect with customers direct using ratings and reviews features</li>
								</ul>
								<p><strong>Premium Member</strong></p>
								 <ul>
									<li>Connect with customers direct using ratings and reviews features</li>
								</ul>
								</div>
							</div>
							<div class="director_membership_box_m">
								<div class="m_title">Promote Special Offers Provide your customers with exclusive offers</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								<p>Not Included</p>
								<p><strong>Premium Member</strong></p>
								 <ul>
									<li>Promote special offers as an incentive for customers to contact your business</li>
								</ul>
								</div>
							</div>
							<div class="director_membership_box_m">
								<div class="m_title"><strong>Performance Tracking</strong>
	We'll let you know how your investment in eziFunerals is working
	</div>
								<div class="m_detail">
								<p><strong>Free Member</strong></p>
								<p>Not Included</p>
								<p><strong>Standard Member Most Popular</strong></p>
								<ul>
									<li>Access to real-time metrics reporting.</li>
								</ul>
								<p><strong>Premium Member</strong></p>
								 <ul>
									<li>Access to real-time metrics reporting.</li>
								</ul>
								</div>
							</div>-->
							
							
					  </div>
					</div>
					</div>
                <!--<div class="login_text_wrapper">
                	<p>New Client</p>
                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="#">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>
                </div>-->
            </div>  
            <?php include("include/main_footer1.php"); ?>
            </div>
      </div>
      </div>
  </div>
</body>
</html>
