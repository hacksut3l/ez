<?php
	session_start();
	include_once('../config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eziFunerals</title>
<link href="favicon.icon" rel="shortcut icon">
<link href="../css/style1.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/jquery-1.9.js"></script>
<script language="javascript" type="text/javascript" src="../js/information.js"></script>
<script language="javascript" type="text/javascript" src="../js/information_vali.js"></script>

</head>
<body>
<!--start web-layout --> 
<div class="web-layout">
	<div class="web-960">	
      <!--start header-form --> 
      <div class="header-form"  style="border:none;">
       	  <h1 id="logo"><a href="index.html" title=""><img src="../images/logo.png" alt="" /></a></h1>
          <h2>FUNERAL AT NEED PLAN</h2>
      </div>
      <!--end header-form --> 
      <!--start form-navigation-->
      <!--end form-navigation-->
      <!--start content-wrap-->
      <div class="login_wrapper" style="margin-top:10px;">
      <div class="content-wrap">
      	<div class="left-content"  style=" margin-left: 15px;">
        	<h2 class="heading">IMPORTANT CONTACTS AND INFORMATION</h2>
            <!--start mpd-form-->
            <form name="infoform" class="infoform" action="save-information.php" method="POST">
           		<div class="top-mainform">
                	<p class="topcont">This list will help you put the pieces of your loved one together and provide information that will assist in sorting and managing the deceased’s affairs in an orderly manner after the funeral. </p>
                    <div class="key-cont">
                    	<h2 class="h2">A. Key Contacts</h2>
                        <h3 class="h3">1.Family and Friends</h3>	
                        <div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>Name</li>
                                    <li>Relationship</li>
                                    <li>Telephone No</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                            	<table id="family_table">
                                    <tr>
                                        <td><input type="text" id="name1" name="name1" class="ontintext-tbl" /></td>
                                        <td><input type="text" id="realtionship1" name="realtionship1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="telephoneno1" name="telephoneno1" class="ontintext-tbl"/></td>
                                        
                                    </tr>
                             	</table>
                                
                                <input type="hidden" value="1" id="family_hidden" name="family_hidden"/>
                                
                                
                              <div class="buttoncl"><input type="button" id="family_add_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>                    
                    </div>
                    
                    <div class="key-cont" style="margin-top:10px;">
                        <h3 class="h3">2.Important Contacts</h3>	
                        <div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>Category</li>
                                    <li>Name </li>
                                    <li>Telephone No</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="contact_table">
                                	<tr>
                                        <td><select class="selectcont" name="contact_category1" id="contact_category1">
                                                    <option value="0">Select Category</option>
                                                    <option value="executor">Executor/Administrator</option>
                                                    <option value="lawyer">Lawyer</option>
                                                    <option value="financial advisor">Financial Advisor</option>
                                                    <option value="insurance agent">Insurance Agent</option>
                                                    <option value="stockbroker">Stockbroker</option>
                                                    <option value="bank manager">Bank Manager</option>
                                                    <option value="employer">Employer</option>
                                                    <option value="landlord">Landlord</option>
                                                    <option value="doc general">Doctor (general)</option>
                                                    <option value="doc specialist">Doctor (specialist)</option>
                                                    <option value="dentist">Dentist</option>
                                                    <option value="religion">Minister of Religion</option>
                                                    <option value="celebrant">Celebrant</option>
                                                    <option value="veterinarian">Veterinarian</option>
                                                    <option value="other">Other</option>
                                            </select></td>
                                        <td><input type="text" id="contact_name1" name="contact_name1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="contact_phone1" name="contact_phone1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                <input type="hidden" value="1" id="contact_hidden" name="contact_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="contact_add_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>                    
                    </div>
                    
                    <div class="key-cont" style="margin-top:13px;">
                        <h3 class="h3">3. Service Providers</h3>	
                        <div class="inner-tabel">
                        	<div class="cont-head01">
                            	<ul>
                                	<li>Category</li>
                                    <li>Name </li>
                                    <li>Customer Ref #</li>
                                     <li>Telephone No</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="service_provider_table">
                                	<tr>
                                        <td>
                                            <select class="selectcont01" name="category1" id="category1">
                                                    <option value="0" selected="selected">Select Category</option>
                                                    <option value="water">Water</option>
                                                    <option value="electricity">Electricity</option>
                                                    <option value="gas">Gas</option>
                                                    <option value="public trustee">Public Trustee</option>
                                                    <option value="medicare">Medicare</option>
                                                    <option value="centerlink">Centrelink</option>
                                                    <option value="local government">Local government</option>
                                                    <option value="veteran affairs">Veteran Affairs</option>
                                                    <option value="post office">Post Office</option>
                                                    <option value="australian taxation office">Australian Taxation Office</option>
                                                    <option value="bank">Bank</option>
                                                    <option value="nursig home">Nursing Home</option>
                                                    <option value="home help">Home Help</option>
                                                    <option value="other">Other</option>
                                            </select>	
                                        </td>
                                        <td><input type="text" id="provider_name1" name="provider_name1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="provider_ref1" name="provider_ref1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="provider_telephone1" name="provider_telephone1" class="ontintext01-tbl"/></td>
                                    </tr>
                                </table>
                                
                                <input type="hidden" value="1" id="service_provider_hidden" name="service_provider_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="service_provider_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>                    
                    </div>
                   
                    <div class="key-cont" style="margin-top:13px;">
                    	<h2 class="h2">B. Insurance Information</h2>
                        <h3 class="h3">1.Insurance Companies</h3>	
                        <div class="inner-tabel">
                        	<div class="cont-head02">
                            	<ul>
                                	<li>Category</li>
                                    <li>POLICY </li>
                                    <li>INSURANCE COMPANY</li>
                                    <li>CONTACT INFORMATION.</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="insurance_company_table">
                                	<tr>
                                        <td>
                                            <select class="selectcont01" name="insurance_category1" id="insurance_category1">
                                                    <option value="0">Select Category</option>
                                                    <option value"health">Health</option>
                                                    <option value="life">Life</option>
                                                    <option value="house and contents">House & Contents</option>
                                                    <option value="mortage">Mortgage</option>
                                                    <option vale="annuity">Annuity</option>
                                                    <option value="car">Car</option>
                                                    <option value="dental">Dental</option>
                                                    <option value="disability">Disability</option>
                                                    <option value="pet">Pet</option>
                                                    <option value="boat">Boat</option>
                                                    <option value="caravan or trailer">Caravan/Trailer</option>
                                                    <option value="funeral">Funeral</option>
                                                    <option value="business">Business</option>
                                                    <option value="other">Other</option>
                                            </select>	
                                        </td>
                                        <td><input type="text" id="insurance_policy1" name="insurance_policy1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="insurance_company1" name="insurance_company1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="insurance_contact1" name="insurance_contact1" class="ontintext01-tbl"/></td>
                                    </tr>
                                </table>
                                
                                                                
                                <input type="hidden" value="1" id="insurance_hidden" name="insurance_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="insurance_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>                    
                    </div>
                    
                    <div class="key-cont" style="margin-top:13px;">
                    	<h2 class="h2">C. Important Information</h2>
                        <p class="font13">The Executor/Administrator or family will need to gather a variety of documents following the death in order to settle the deceased persons affairs. </p>
                        <!--<div class="inner-tabel">
                        	<div class="cont-head03">
                            	<ul>
                                	<li>Category</li>
                                    <li>CONTACT INFORMATION </li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <ul>
                                   <li><select class="selectcont02">
                                        		<option>Select Category</option>
                                    			<option>Will</option>
                                                <option>Birth Certificate</option>
                                                <option>Citizenship Certificate</option>
                                                <option>Military Discharge</option>
                                                <option>Drivers Licence</option>
                                                <option>Insurance Policies</option>
                                                <option>Marriage Certificate</option>
                                                <option>Divorce Papers</option>
                                                <option>Trust Documents</option>
                                                <option>Property Deed(s)</option>
                                                <option>Vehicle Ownership</option>
                                                <option>Passport</option>
                                                <option>Social Security Cards</option>
                                                <option>Safe Deposit Box Key</option>
                                                <option>Adoption Papers</option>
                                                <option>Other</option>
                                    	</select>	
                                    </li>
                                    <li><input type="text" id="" name="" class="ontintext03"/></li>
                                </ul>
                                <div class="buttoncl"><input type="button" id="" value="Add" class="addbut" /></div>
                            </div>
                        </div>-->                    
                    </div>
                    
                    
                    <div class="key-cont" style="margin-top:13px;">
                    	<h3 class="h3">1. Financial Information</h3>	
                        <p class="font13">The Executor/Administrator will need information about the deceased persons assets after the death. </p>
                        <h3 class="h3">(a).Assets</h3>
                        <h4 class="h4">BANK</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>ACCOUNT TYPE</li>
                                    <li>ACCOUNT # </li>
                                    <li>BANK NAME</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="bank_table">
                                	<tr>
                                        <td><select class="selectcont" name="account_type1"  id="account_type1">
                                                    <option value="0">Select Type</option>
                                                    <option value="executor or adminsitrator">Executor/Administrator</option>
                                                    <option value="safe deposit">Safe Deposit Box</option>
                                                    <option value="saving">Savings</option>
                                                    <option value="term deposit">Term Deposit</option>
                                                    <option value="atm or debit card">ATM/Debit Card</option>
                                                    <option value="investment">Investment</option>
                                                    <option value="business">Business</option>
                                                    <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="account_no1" name="account_no1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="bank_name1" name="bank_name1" class="ontintext-tbl"/></td>
                                      </tr>
                                </table>
                                <input type="hidden" value="1" id="bank_hidden" name="bank_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="bank_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                    </div>
                    
                     <div class="key-cont" style="margin-top:13px;">
                        <h4 class="h4">INVESTMENT</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>ACCOUNT TYPE</li>
                                    <li>ACCOUNT # </li>
                                    <li>INSTITUTION NAME</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="investment_table">
                                	<tr>
                                        <td><select class="selectcont" name="investment_type1" id="investment_type1">
                                                    <option value="0">Select Type</option>
                                                    <option value="brokerage account">Brokerage Account</option>
                                                    <option value="funeral bond">Funeral Bond</option>
                                                    <option value="superannuation">Superannuation</option>
                                                    <option value="investment fund">Investment Fund</option>
                                                    <option value="shares">Shares</option>
                                                    <option value="other">Other</option>
    
                                            </select>
                                        </td>
                                        <td><input type="text" id="investment_account_no1" name="investment_account_no1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="institution_name1" name="institution_name1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                
                                <input type="hidden" value="1" id="investment_hidden" name="investment_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="investment_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                    </div>
                    
                    
                    <div class="key-cont" style="margin-top:13px;">
                        <h4 class="h4">PENSION</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>TYPE</li>
                                    <li>ACCOUNT # </li>
                                    <li>ORGANISATION NAME</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="pension_table">
                                	<tr>
                                        <td><select class="selectcont" name="pension_type1" id="pension_type1">
                                                    <option value="0">Select Type</option>
                                                    <option value="aged">Aged</option>
                                                    <option value="disability">Disability</option>
                                                    <option value="veteran affairs">Veteran Affairs</option>
                                                    <option value="family tax">Family Tax Assistance</option>
                                                    <option value="spouse">Spouse</option>
                                                    <option value="health care">Health Care Card</option>
                                                    <option value="family support">Family Support</option>
                                                    <option value="rental assistance">Rental Assistance</option>
                                                    <option value="single parent">Single Parent</option>
                                                    <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="pension_account_no1" name="pension_account_no1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="organisation_name1" name="organisation_name1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                <input type="hidden" value="1" id="pension_hidden" name="pension_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="pension_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                    </div>
                    
                    
                    <div class="key-cont" style="margin-top:13px;">
                        <h4 class="h4">PROPERTY</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>TYPE</li>
                                    <li>DESCRIPTION </li>
                                    <li>LOCATION</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id ="property_table">
                                	<tr> 
                                        <td><select class="selectcont" name="property_type1" id="property_type1">
                                                    <option value="0">Select Type</option>
                                                    <option value="real estate">Real Estate</option>
                                                    <option value="car">Car</option>
                                                    <option value="boat">Boat</option>
                                                    <option value="caravan or trailer">Caravan/Trailer</option>
                                                    <option value="motorcycle">Motorcycle</option>
                                                    <option value="art work">Art Work</option>
                                                    <option value="jewellery">Jewellery</option>
                                                    <option value="collections">Collections</option>
                                                    <option value="other">Other</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="property_description1" name="property_description1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="property_location1" name="property_location1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                
                                <input type="hidden" value="1" id="property_hidden" name="property_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="property_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                    </div>
                    
                   <div class="key-cont" style="margin-top:13px;">
                     <h3 class="h3">(b).Liabilities</h3>
                        <p class="font13">In addition to the deceased persons assets, the Executor/Administrator or family will need information about any outstanding debts the deceased person has.</p>

                        <h4 class="h4">LOANS</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>ACCOUNT TYPE</li>
                                    <li>ACCOUNT </li>
                                    <li>LENDER NAME</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="loan_table">
                                	<tr>
                                        <td><select class="selectcont" name="loan_account_type1" id="loan_account_type1">
                                                    <option value="0">Select Type</option>
                                                    <option value= "1st mortgage">1st Mortgage</option>
                                                    <option value="2nd morgage">2nd Mortgage</option>
                                                    <option value="home equity">Home Equity Line of Credit</option>
                                                    <option value="reverse morgage">Reverse Mortgage</option>
                                                    <option value="car1">Car 1</option>
                                                    <option value="car2">Car 2</option>
                                                    <option value="boat">Boat</option>
                                                    <option value="personal">Personal</option>
                                                    <option value="caravan or trailer">Caravan/Trailer</option>
                                                    <option value="business">Business</option>
                                                    <option value="motorcycle">Motorcycle</option>
                                                    <option value="investment">Investment</option>
                                                    <option value="other">Other</option>
    
                                            </select>
                                        </td>
                                        <td><input type="text" id="loan_account1" name="loan_account1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="lender_name1" name="lender_name1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                
                                 <input type="hidden" value="1" id="loan_hidden" name="loan_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="loan_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                  </div> 
                  
                  <div class="key-cont" style="margin-top:13px;">
                        <h4 class="h4">CREDIT CARDS</h4>
                       	<div class="inner-tabel">
                        	<div class="cont-head01">
                            	<ul>
                                	<li>COMPANY NAME </li>
                                    <li>CARD  </li>
                                    <li>EXP. DATE</li>
                                     <li>PHONE </li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="credit_table">
                                	<tr>
                                        <td><input type="text" id="credit_company1" name="credit_company1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="credit_card1" name="credit_card1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="exp_date1" name="exp_date1" class="ontintext01-tbl"/></td>
                                        <td><input type="text" id="credit_phone1" name="credit_phone1" class="ontintext01-tbl"/></td>
                                    <tr>
                                </table>
                                
                                <input type="hidden" value="1" id="credit_hidden" name="credit_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="credit_button" value="Add" class="addbut" /></div>
                            </div>
                        </div> 
                  </div>
                  
                 <div class="key-cont" style="margin-top:13px;">
                    	<h2 class="h2">D. SOCIAL MEDIA ACCOUNTS</h2>
                        <p class="font13">The deceased person may have had a number of social media accounts that you need to access </p>
                        <div class="inner-tabel">
                            <div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>Category   </li>
                                    <li>Username   </li>
                                    <li>Password</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="social_media_table">
                                	<tr>
                                        <td><select class="selectcont" name="social_category1" id="social_category1">
                                                    <option value="0">Select Category</option>
                                                    <option value="facebook">Facebook</option>
                                                    <option value="twitter">Twitter</option>
                                                    <option value="linked in">Linked In</option>
                                                    <option value="google">Google+</option>
                                            </select>
                                        </td>
                                        <td><input type="text" id="username1" name="username1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="password1" name="password1" class="ontintext-tbl"/></td>
                                    </tr>
                                </table>
                                
                                <input type="hidden" value="1" id="social_hidden" name="social_hidden"/>
                                
                                <div class="buttoncl"><input type="button" id="social_button" value="Add" class="addbut" /></div>
                            </div>
                        </div>
                        </div>                    
                    </div> 
                  
                  
                  <div class="key-cont" style="margin-top:13px;">
                    	<h2 class="h2">E. Pets</h2>
                        <p class="font13">The deceased persons pets may be an important part of their life </p>
                        <div class="inner-tabel">
                            <div class="inner-tabel">
                        	<div class="cont-head">
                            	<ul>
                                	<li>Category </li>
                                    <li>Name  </li>
                                    <li>Sex</li>
                                </ul>
                            </div>
                            <div class="inn-cinfo">
                                <table id="pet_table">
                                	<tr>
                                        <td><select class="selectcont" name="pet_category1" id="pet_category1">
                                                    <option value="0">Select Category</option>
                                                    <option value="dog">Dog</option>
                                                    <option value="cat">Cat</option>
                                                    <option value="other">Other</option>
                                            </select>                                        </td>
                                        <td><input type="text" id="pet_name1" name="pet_name1" class="ontintext-tbl"/></td>
                                        <td><input type="text" id="pet_sex1" name="pet_sex1" class="ontintext-tbl"/></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="3"><p>
                            	<lebel>Special Notes:</lebel>
                            	<textarea id="P_address"  name="pet_notes1" id="pet_notes1" class="textarea-f" ></textarea>
                            </p></td>
                                    </tr>
                                    
                                </table>
								
                                <input type="hidden" value="1" id="pet_hidden" name="pet_hidden"/>
                                
                                <div class="buttoncl" style="margin-top:10px;"><input type="button" id="pet_button" value="Add" class="addbut" /></div>
                              </div>
                            
                             
                        </div>
                        </div>                    
                    </div>
                    
                    <div class="f-row-2">
                 <p style="float:right;">
                 	<input type="image" src="../images/submit.png"  /> 
                 </p>
                        
           </div>
                    
                    
                </div>
            
            </form>
            <!--end mpd-form-->
        </div>
      </div>
      <!--end content-wrap-->
    </div>
</div>
<!--end web-layout -->




 <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/
			$("a#example1").fancybox();

			$("a#example2").fancybox({
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'elastic'
			});

			$("a#example3").fancybox({
				'transitionIn'	: 'none',
				'transitionOut'	: 'none'	
			});

			$("a#example4").fancybox({
				'opacity'		: true,
				'overlayShow'	: false,
				'transitionIn'	: 'elastic',
				'transitionOut'	: 'none'
			});

			$("a#example5").fancybox();

			$("a#example6").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			$("a#example7").fancybox({
				'titlePosition'	: 'inside'
			});

			$("a#example8").fancybox({
				'titlePosition'	: 'over'
			});

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>
<link rel="stylesheet" href="css/jquery.ui.all.css" type="text/css" />
<script language="javascript" type="text/javascript" src="../js/jquery.ui.core.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.ui.widget.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
<script language="javascript" type="text/javascript" src="../js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" language="javascript">
    $(function() {
        $( "#searchsdate" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    
            $( "#searchsdate1" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>

</body>
</html>
