	<head>
<title></title>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- Favicon -->
<link rel="shortcut icon" href="favicon.png">
<!-- this styles only adds some repairs on idevices  -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- ######### CSS STYLES ######### -->
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link rel="stylesheet" href="css/popup.css" type="text/css" />
<link rel="stylesheet" href="css/media.css" type="text/css" /> 	


<!-- responsive devices styles -->
<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
<link rel="stylesheet" href="css/colors/blue.css" />
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
<!-- style switcher -->
<link rel = "stylesheet" media = "screen" href = "js/style-switcher/color-switcher.css" />
<!-- REVOLUTION SLIDER -->
<link rel="stylesheet" type="text/css" href="js/revolutionslider/css/fullwidth.css" media="screen" />
<link rel="stylesheet" type="text/css" href="js/revolutionslider/rs-plugin/css/settings.css" media="screen" />
<!-- jquery jcarousel -->
<link rel="stylesheet" type="text/css" href="js/jcarousel/skin.css" />
<link rel="stylesheet" type="text/css" href="js/jcarousel/skin2.css" />




<style>
	@font-face {
	font-family: 'Helvetica Chrome';
	src: url(fonts/HELVNCBL.ttf);
	}

	/*@font-face {
	font-family: 'Helvetica IE';
	src: url(fonts/HelveticaNeueLTStd-Bd.otf);	
	}*/
	
	/*@font-face {
	font-family: 'Helvetica IE';
	src: url(fonts/HelveticaNeueLTStd-Lt.otf);	
	}*/
	
	@font-face {
	font-family: 'Helvetica Roman test';
	src: url(fonts/HelveticaNeueLTStd-Roman.otf);	
	}
	
	@font-face {
	font-family: 'Helvetica Medium 65';
	src: url(fonts/HelveticaNeueLTStd-Md.otf);	
	}
	
	@font-face {
	font-family: 'Helvetica Light Condensed 47';
	src: url(fonts/HelveticaNeueLTStd-LtCn.otf);	
	}
	
	@font-face {
	font-family: 'Helvetica Light Condensed 47';
	src: url(fonts/HelveticaNeueLTStd-LtCn.otf);	
	}
	header{
            float: left;
width:auto;
padding: 18px 0px;
border-bottom: 1px solid #f3f3f3;

position: fixed;
right: 0;
left: 0;
top: 95PX;
background: white;
z-index: 1000;
            
            // set animation
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }
        
        header.sticky {
       float: left;
width:auto;
padding: 18px 0px;
border-bottom: 1px solid #f3f3f3;

position: fixed;
right: 0;
left: 0;
top: 0PX;
background: white;
z-index: 1000;
        }
		


/*mobile menu css....................*/

@media screen and (max-width:810px) {
	
	.nav {
		position:relative;
		min-height: 40px;
		margin-left:60px;
		
		
	}	
	.nav ul {
		width: 180px;
		padding: 5px 0;
		position: absolute;
		top: 0;
		left:0px;
		border: solid 1px #aaa;
		background: #fff url(images/icon-menu.png) no-repeat 10px 11px;
		border-radius: 5px;
		box-shadow: 0 1px 2px rgba(0,0,0,.3);
	}
	.nav li {
		display: none; /* hide all <li> items */
		margin: 0;
	}
	.nav .current {
		display: block; /* show only current <li> item */
	}
	.nav a {
		display: block;
		padding: 5px 5px 5px 32px;
		text-align: left;
	}
	.nav .current a {
		background: none;
		color: #666;
	}

	/* on nav hover */
	.nav ul:hover {
		background-image: none;
	}
	.nav ul:hover li {
		display: block;
		margin: 0 0 5px;
	}
	.nav ul:hover .current {
		background: url(images/icon-check.png) no-repeat 10px 7px;
	}

	/* right nav */
	.nav.right ul {
		left: auto;
		right: 0;
	}

	/* center nav */
	.nav.center ul {
		left: 50%;
		margin-left: -90px;
	}
.fullscreenmenu{display:none !important;}

	
}

@media screen and (min-width:810px){
	
	.mobilemenu{display:none !important}
	
}

</style>

<script type="text/javascript">
var __lc = {};
__lc.license = 4860721;

(function() {
 var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
 lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>

<!--<script type="text/javascript" src="js/universal/jquery.js"></script>-->




</head>
<body>
<div class="grey_bg" align="center" style="background:#f4f4f4; height:35px; margin-top:-40px;">
  <div class="center"><a href="page/how-it-works?type=director"><img src="images/header_AD.png" width="600" class="top_ad_top"></a></div>
</div>
<div class="site_wrapper">
<div class="container_full">
  <header>
    <div class="">
      <div class="container homecontainer">
       <div class="fullscreenmenu">
	  	<table>
          <tbody>
            <tr>
              <td style="vertical-align: top;">
			  <div style="margin-top: -15px;" class="ezi_logo ezi_logo2"> 
			  <a href="./index.php"><img src="./images/logo.png" width="200" height="55"></a>
                  <!-- end logo -->
                </div></td>
              <td style="vertical-align: middle;">

<div class="menu_three menu_three2"> 

<a href="organise_funerals.php"><font style="padding-left:30px;color:#7a7a7a !important; font-size:14px" class="menu_fonts">Organise a Funeral</font></a> 

<a href="find-funeral-director.php"><font style="padding-left:20px;color:#7a7a7a !important; font-size:14px" class="menu_fonts">Find a Funeral Director</font></a> 

<a href="page/how-it-works"><font style="padding-left:17px;color:#7a7a7a !important; font-size:14px" class="menu_fonts">How it Works</font></a> 

</div>

</td>
              <td style="vertical-align: middle;">
<style>
#primary_nav_wrap
{
	margin-left:10px;
	
	
}

#primary_nav_wrap ul
{
	list-style:none;
	position:relative;
	float:left;
	margin:0;
	padding:0
}

#primary_nav_wrap ul a
{
	display:block;
	color:#333;
	text-decoration:none;
	font-size:14px;
	line-height:30px;
	padding:8px 15px;
	font-family:'Helvetica Roman test' , 'Helvetica IE', Arial;
	width:130px;

}

#primary_nav_wrap ul a:hover
{
	display:block;
	color:#FFFFFF !Important;
	text-decoration:none;
	font-size:14px;
	line-height:30px;
	padding:8px 15px;
	font-family:'Helvetica Roman test' , 'Helvetica IE', Arial;
	width:130px;
	background:#00a3b4;

}

#primary_nav_wrap ul li
{
	position:relative;
	float:left;
	margin:0;
	padding:0
}

#primary_nav_wrap ul li.current-menu-item
{
	background:#ddd
}

#primary_nav_wrap ul ul
{
	display:none;
	position:absolute;
	top:100%;
	left:0;
	background:#fff;
	padding:0
}


#primary_nav_wrap ul ul ul
{
	top:0;
	left:100%
}

#primary_nav_wrap ul li:hover > ul
{
	display:block;
	
}
</style>
     
              <td><?php
 
 ob_start();
include_once('config.php');
 @session_start();
 
   
				if(!isset($_SESSION['client']) && !isset($_SESSION['person_id']))
				{
			?>
                <div style=" margin-top:12px;" class="login_signup"> 
				<a href="page/how-it-works"  style="margin-left:5px; border-radius:50px; padding:10px 30px;  font-size:14px !important;" class="login_button">SIGNUP</a> 
				&nbsp;&nbsp;&nbsp; 
				
				<a href="signin.php"  style="margin-left:-10px;border-radius:50px; padding:9px 30px;font-size: 14px  !important;" class="readmore_but_03" >LOGIN</a>
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				
				</div>
				
                <?php
				}
				 else
				{
					if(isset($_SESSION['client']))
					{
					  	$link = 'client_information.php';
					}
					else
					{
						$link = 'edit-information.php';
					}
					
			?>
                <div>
                <nav id="primary_nav_wrap">
                  <ul>
                  
                    <?php
					
					$dataofpayment=mysql_query("select * from directors where id='".$_SESSION['client']."'");
									@$rowofpayment=mysql_fetch_array($dataofpayment);
	
							if(@$_SESSION['type']=='client')
							{	
					?>
								<li><a href="client_dashboard.php">My Account&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/arrow.png" /></a>
									<ul>
                        				<li><a href="logout.php">Logout</a></li> 
                 				  </ul>
                   
                  				</li>
					<?php
					}
					else if(@$_SESSION['type']=='director' && $rowofpayment['payment_status']=='active')
					{
					?>
								 <li><a href="director_dashboard.php">My Account&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/arrow.png" /></a>
								 <ul>
                        			<li><a href="logout.php">Logout</a></li> 
                   				</ul>
                   			</li>
					<?php }
					else
					{
					?>	
						
					
						   			<li><a href="logout.php">Logout</a></li> 
					<?php
					}
					
					?>
                   
                   
                  </ul>  
                </nav>
                <!--
     <div id="primary_nav_wrap" style="display:none;">
        <ul class="sub-menu">
            <li style="border-radius:0px;"> <a href="<?php echo $link;?>">My Account</a> </li>
            <li style="border-radius:0px;"> <a href="logout.php">Logout</a></li>
            
        </ul>
    </div>    
    </li> 
</ul></div>
-->
                <?php
				}
			?>
              </td>
            </tr>
          </tbody>
        </table>
		<div>
      </div>
    </div>
	
<!----mobile menu------------------->	
<div class="mobilemenu">
<div style="margin-top: -15px; margin-left:50px !important" class="ezi_logo"> 
			  <a href="./index.php"><img src="./images/logo.png" width="200" height="55"></a>
                  <!-- end logo -->
                </div>	
<nav class="nav">
	<ul>
		<li class="current"><a href="#">Menu</a></li>
		<li><a href="organise_funerals.php"><font>Organise a Funeral</font></a></li>
		<li><a href="find-funeral-director.php"><font>Find a Funeral Director</font></a> </li>
		<li><a href="page/how-it-works"><font>How it Works</font></a> </li>
   
   		<?php
 
 ob_start();
include_once('config.php');
 @session_start();
  
				if(!isset($_SESSION['client']) && !isset($_SESSION['person_id']))
				{
			?>
               
				<li><a href="signin.php">Signup</a> </li>
			
				<li><a href="signin.php">Login</a></li>
				
			
				
                <?php
				}
				 else
				{
					if(isset($_SESSION['client']))
					{
					  	$link = 'client_information.php';
					}
					else
					{
						$link = 'edit-information.php';
					}
					
			?>
               
                    <?php
	
							if($_SESSION['type']=='client')
							{	
					?>
								<li><a href="client_dashboard.php">My Account</a></li>
					<?php
					}
					else if(@$_SESSION['type']=='director' && $rowofpayment['payment_status']=='active')
					{
					?>
								<li><a href="director_dashboard.php">My Account</a></li>
					<?php }
					
					?>
                          <li><a href="logout.php">Logout</a></li> 
       
      
                <?php
				}
			?>
   </ul>
</nav>
</div>
<!----End mobile menu------------------->	
	
  </header>
</div>
<!-- end top -->
