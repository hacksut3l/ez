<?php

	session_start();

	if(!isset($_SESSION['client']))
	{
		header("location:../signin.php");	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eziFunerals | Client Dashboard</title>

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" media="screen" href="css/responsive-leyouts.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="js/tabs/tabs-style2.css" />
<link rel="stylesheet" type="text/css" href="js/tabs/tabs.css" />
<link type="text/css" rel="Stylesheet" href="css/Old_Include_Css/jquery.validity.css" />
  
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
  <link rel="stylesheet" href="css/style.css" type="text/css" />


<script type="text/javascript" src="js/Old_Include_Js/jquery-1.8.min.js"></script>
<!-- <script type="text/javascript" src="js/location.js"></script>
-->

<script type="text/javascript" src="js/Old_Include_Js/jquery-ui-1.8.23.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/Old_Include_Css/jquery-ui-1.8.23.custom.css" />



<script src="js/Old_Include_Js/respond.min.js"></script>




<?php include 'include/main_header.php'; ?>

<script type='text/javascript'>
   $(document).ready(function() {
    
     
    enableSelectBoxes();
    
    $( "#city" ).autocomplete({
     
     source: function(request, response) {
      
     $.ajax({
      url :"city.php" ,
      data : "state_id="+$("#state").val()+"&city="+$('#city').val(),
      dataType: "json",
      type : "POST",
      success : function(data)
      {
       group=[];
       label=[];
       $.each(data,function(i,v){
        group.push({
        label:$(v).attr('groups')
       })
      })
      
     response(group);
      }
     });
     },
     minLength: 2
    });
    
    
    
    
    
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
   }
</script>
<script type="text/javascript">


$(document).ready(function() {  
  
      $('#password_frm').submit(function()
        {
          if($('#password').val() == '' || $('#cnfrm_password').val() == '')
          {
            alert('Please enter data');
            return false;
          }          
          else if($('#password').val() != $('#cnfrm_password').val())
          {
            alert('Password does not match');
            return false;
          }
          
          
          
        });
        
      });


</script>  
  
<style>

a:hover{text-decoration:none !important;}
@media screen and (max-width: 640px) {
  table {
    overflow-x: auto !important;
    display: block !important;
  }
}

</style>
<script type='text/javascript'>//<![CDATA[ 
$(window).load(function(){
$(function() {
    $( "#tabs" ).tabs();
    $( "#more-tabs" ).tabs();
  $( "#more-tabs-myaccount" ).tabs();
  $( "#more-tabs-myfuneralplan" ).tabs();
  
 $('.open-tab').click(function (event) {
  var tab = $(this).attr('href');
  $('#more-tabs-myfuneralplan').tabs('select', tab);
});
  
  });
});//]]>  

</script>

</head>

<body>
<?php
  
  include_once'include/config.php';
  
  
  $sel="select * from clients where id='".$_SESSION['client']."' ";
   $rel=mysql_query($sel);
   $row=mysql_fetch_array($rel);
  
  if($row['plan']==1)
  {
    $plan="Basic";
  }
  else if($row['plan']==2)
  {
    $plan="Direct";
  }
  else if($row['plan']==3)
  {
    $plan="Advance";
    
  }
?>
  <?Php
  
  
      
  if(isset($_SESSION['client']))
  {
  $sql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."' ";
  $sqlex = mysql_query($sql);
  $result = mysql_fetch_assoc($sqlex);
        
        $citysql = "SELECT 
                        city_name
                    FROM 
                        cities
                    WHERE  
                        city_id = '".$result['city']."'
                    ";  
  $cityex = mysql_query($citysql);
  $city_name = mysql_fetch_assoc($cityex);
?>
<div class="container">
<br/><br/><br/><br/><br/><br/><br/><br/><br /><h2 class="dash_left_title head_links"><b>My Funeral Plans</b></h2>
<div  style="margin-top: 30px;">

      </div>

                   <div class="user_box" style="padding:4px !important; margin-bottom:15px;">
                     <div class="user_profile_photo">
                    <img src="<?php echo base_url;?>uploads/clients_profile_pics/<?php echo $result['image'];?>"  style="width:120px; height:130px;"/>
                      
                    </div>
                    <div class="user_info">
                      <p class="right-text company_name_m"><strong><?php echo ucwords($result['first_name']).' '.ucwords($result['last_name']);?></strong></p>
                        <p>
<?php echo ucwords(str_replace(","," ",$result['address'])).' '.ucwords($city_name['city_name']).' '.ucwords($state_name['state_name']).' '.ucwords($result['zip_code']);?>
<?php echo " ".ucwords($row['country']);?></p>
                        <p class="user_contact"><?php echo $result['phone'];?></p>
            
          
           
           
            </div>
                   
      </div>
              
  <div class="content_fullwidth dashboard_main_box" style="margin-bottom:20px; margin-top:-55px;">
    
    <div id="tabs" class="ui-tabs">
       <ul class="ui-tabs-nav">
        <li><a href="#tabs-1">My Account</a></li>
        <li><a href="#tabs-2">Create a Plan</a></li>
        <li><a href="#tabs-3">Get Basic Quotes</a></li>
        <li><a href="#tabs-4">View Quotes</a></li>
        <li><a href="">Help</a></li>
        <br/>
        <span style="padding-top:22px !important; padding-left: 30px !important; color:#7a7a7a !important; font-size:11px" class="menu_fonts"> Have more questions? <a href="https://ezifunerals.zendesk.com/hc/en-us/requests/new" target="_blank"> Submit a request</a></span>
              
        </ul>
        
      <script>
        $(document).ready(function() {
          $('#tabs > ul > li:nth-child(5)').click(function(){
            window.open('https://ezifunerals.zendesk.com/hc/en-us', '_blank');
          });
          
          $('#more-tabs-myfuneralplan > ul > li:nth-child(5)').click(function(){
            window.open('https://ezifunerals.zendesk.com/hc/en-us/requests/new', '_blank');
          });
        
          //$('#more-tabs-myfuneralplan > ul > li:nth-child(2)').click(function(){
           // window.open('http://ezifunerals.com.au/atneed/person-making-arrangements.php','_self')
          //});
		  
		                 
           // $('#more-tabs-myfuneralplan > ul > li:nth-child(2)').click(function(){
               // document.getElementById("displaymanageplan").style.display = "block";
            //});
				  
        });
      </script>
        
        <div id="tabs-1" class="ui-tabs-panel"> <!-- ************************* My Account ************************* -->  

          <div id="more-tabs-myaccount">
            <ul>
              <li><a href="#nested-tabs-1">My Profile</a></li>
              <li><a href="#nested-tabs-2">Password Change</a></li>
              <li><a href="#nested-tabs-3">Purchase Information</a></li>
              <li><a href="#nested-tabs-4" >Membership</a></li>
            </ul>
            
            <!-- ************************* My Profile ************************* -->  
            <div id="nested-tabs-1"><p>
            <form name="contact" action="client_info_update.php" method="POST" enctype="multipart/form-data">
            <table style="margin-left:40px;" class="tablefordashboard">
            <tr>
              <td style="padding:5px; width:180px;"><div class="name-full">First Name:-</div></td>
              <td style="padding:5px;"><input name="first_name"type="text" size="40" value="<?php echo ucwords($result['first_name']);?>" class="reg_field reg_field2"></td>  
             
            </tr>
            <tr>
              <td  style="padding:5px;"><div class="name-full">Last Name:-</div></td>  
              <td  style="padding:5px;"><input name="last_name" type="text" size="40" value="<?php echo ucwords($result['last_name']);?>" class="reg_field reg_field2"></td>  
             
            </tr>
               <tr> 
                        <td style="padding:5px; width:180px;"><span class="reg_name" style="margin-top:0;">Upload Profile Picture</span></td>
                     <td style="padding:5px;"><input type="file" id="file" name="profile_image" size="40" class="reg_field"/></td>
                </tr>
                    <tr>
            <tr>
              <td  style="padding:5px;"> <div class="name-full">Phone:-</div></td>  
              <td  style="padding:5px;"><input name="phone" type="text" size="40"  value="<?php echo $result['phone'];?>" class="reg_field reg_field2"></td>  
             
            </tr>
            <tr>
              <td style="padding:5px;"> <div class="name-full">Email Address:-</div></td>  
              <td style="padding:5px;"><input name="business_mail" type="text" size="40" value="<?php echo $result['email'];?>" class="reg_field reg_field2"></td>  
             
            </tr>
            <tr>
              <td style="padding:5px;"> <div class="name-full">Select Country:-</div></td>  
              <td style="padding:5px;"><select name="country" id="conutry" style="width:290px; height:30px;" class="input_bg dash_box_state">
                            <option value="">Select a Country</option>
                            <option value="Australia"  <?php if($result['country'] == 'Australia') echo "selected=selected";?>>Australia</option>
                           </select>
              </td>  
             
            </tr>
            <tr>
              <td style="padding:5px; vertical-align:top;"> <div class="name-full">Address:-</div></td>  
              <td style="padding:5px;"><textarea name="address"cols="49" rows="6" class="dash_box_add"><?php echo $result['address'];?></textarea></td>  
             
            </tr>
            
            <tr>
              <td style="padding:5px;"> <div class="name-full">Select State:-</div></td>  
              <td style="padding:5px;"><select name="state" style="width:290px; height:30px;" class="input_bg dash_box_state" id="state">
                           <option value="">Select state/region</option>
                  <?php
                    $statesql = "SELECT * FROM states ORDER BY state_name";
                    $statesex = mysql_query($statesql);
                    
                    while($states = mysql_fetch_assoc($statesex))
                    {
                      if($result['state'] == $states['state_id'])
                      {
                        $selected1 = 'selected=selected';
                      }
                      else
                      {
                        $selected1 = '';
                      }
                      
                      echo '<option value="'.$states['state_id'].'" '.$selected1.'>'.$states['state_name'].'</option>';
                    }
                  ?>
                  </select>
              </td>  
             
            </tr>
  
            <tr>
              <td style="padding:5px;"> <div class="name-full">Select Suburb:-</div></td>  
              <td style="padding:5px;"><input name="city" value="<?php  echo $city_name['city_name'];?>" size="40" id="city" class="reg_field reg_field2" style="margin-left:0px !important"/>
        
              
               </td>  
             
            </tr>
  
            <tr>
              <td style="padding:5px;"> <div class="name-full">Postcode/ Zip:-</div></td>  
              <td style="padding:5px;"><input name="postal_code" type="text" maxlength="10" size="40" value="<?php echo $result['zip_code']?>" class="reg_field reg_field2"></td>  
            </tr>
            
            <tr>  
              <td><br/><input class="login_button" type="submit" id="submit" name="update" value="UPDATE" /> </td>
            </tr>
            </table>

             <input type="hidden" value="contact" name="type" />        
            </form>        
            </p></div>
            
            <!-- ************************* Change Password ************************* -->  
            <div id="nested-tabs-2"><p>
            <form name="password_frm" id="password_frm" action="client_info_update.php" method="POST">
          <table style="margin-left:40px;" class="tablefordashboard">
            <tr>
              <td  style="padding:5px;"><div class="name-full">New Password:-</div></td>  
              <td  style="padding:5px;"><input name="password" type="password" size="40" class="reg_field " id="password"></td>  
            </tr>
            <tr>
              <td  style="padding:5px;"> <div class="name-full">Confirm Password:-</div></td>  
              <td  style="padding:5px;"><input name="cnfrm_password" type="password" size="40" class="reg_field" id="cnfrm_password"></td>  
            </tr>
            <tr>
             <td><br /><input class="login_button" type="submit" id="submit" name="update" value="UPDATE"/></td>
            </tr>
            </table>

             <input type="hidden" value="password" name="type" />
          </form>    
          
            </p></div>
            
            <!-- ************************* Purchase Information ************************* -->  
            
            <div id="nested-tabs-3"><p>
              <style>
            table th { border:solid 1px #FFFFFF !important; padding:5px; width:140px; background-color:#00a3b4!important; color:#FFFFFF !important;}
            </style>  
     
     
     
          <table style="margin-left:0px; font-size: 12px !important;">
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Trasaction number</th>
              <th scope="col">Plan</th>
              <th scope="col">Amount</th>
              <th scope="col">Paid</th>
              <th scope="col">Download Plan</th>
            </tr>
          <?php
          
              $purchase_information="select * from client_purchase_info where client_id='".$_SESSION['client']."' and order_info='Approved'";
              $purchase_result=mysql_query($purchase_information);
              $count=mysql_num_rows($purchase_result);
            
              if($count != '0')
              {  
              
              for($i=1;$i<=$count;$i++)  
              {
          
              $row_purchase_information=mysql_fetch_array($purchase_result);  
              
              if($i%2==0)
              {  
          ?>    
        
            <tr style="background:#eee !important;">
              <td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row_purchase_information['date']));?></center></div></td>
              <td><div class="name-full"><center><?php echo $row_purchase_information['transcation_no']; ?></center></div></td>
              <td><div class="name-full"><center><?php echo $row_purchase_information['pdf_type']; ?></center></div></td>
              <td><div class="name-full"><center><?php echo $row_purchase_information['reg_amount']; ?></center></div></td>
              <td><div class="name-full"><center>Paid</center></div></td>
             
            </tr>
          <?php 
          
              }
              else
              {
          ?>    
                  <tr style="background:#FFFFFF  !important;">
                      <td><div class="name-full"><center><?php echo date('d-M-y',strtotime($row_purchase_information['date']));?></center></div></td>
                      <td><div class="name-full"><center><?php echo $row_purchase_information['transcation_no']; ?></center></div></td>
                      <td><div class="name-full"><center><?php echo $row_purchase_information['pdf_type']; ?></center></div></td>
                      <td><div class="name-full"><center><?php echo $row_purchase_information['reg_amount']; ?></center></div></td>
                      <td><div class="name-full"><center>Paid</center></div></td>
                     
                    </tr>
              
              
              
          <?php      
                      
              }
              
              }
              }
              else
              {
          ?>        
          
          <tr>
                <td><center><?php  echo 'No Record';?></center></td>
                <td><center><?php  echo 'No Record';?></center></td>
                <td><center><?php  echo 'No Record';?></center></td>
                <td><center><?php  echo 'No Record';?></center></td>
                <td><center><?php  echo 'No Record';?></center></td>
          
          </tr>
      
          <?php     
              
              }
          ?>          
            
            </table>
            </p></div>
            
              <!-- ************************* Membership ************************* -->  
            <div id="nested-tabs-4"><p>
            <table style="margin-left:5px;width: 100%;">
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:360px; margin-left:5px;"><font style="font-size:20px;">ACTIVE PLAN:  <!--<label style="background:#E97000; color:#FFFFFF; padding:5px; font-size:18px;">--><?php if($result['plan']=='1'){ echo 'EZIFUNERALS BASIC';} else if($result['plan']=='2'){ echo 'EZIFUNERALS DIRECT';} else if($result['plan']=='3'){ echo 'EZIFUNERALS ADVANCE';}?><!--</label>--></font></td>
                        
                      
          </tr>
          <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>  
           <tr>
                    
                      <td style="padding:5px;width:180px; margin-left:5px;"></td>
                        <td style="padding:5px;"></td>
                      
          </tr>      
                  
          </table>
            </p></div>
          </div>
        </div>
        
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  
<!-- *************************** ******************* ******************* ******************* ***************** My Funeral Plan ************************* -->  

        <div id="tabs-2" class="ui-tabs-panel"> <!-- ************************* My Funeral Plan ************************* -->  
        
           <div id="more-tabs-myfuneralplan">
              <ul>
                <li><a href="#funeral-tabs-1">About My Plan</a></li>
				<?php if($row['plan']=='2') { ?>
                <li><a href="#funeral-tabs-2">Manage My Plan</a></li>
                <li><a href="#funeral-tabs-3">View My Plan</a></li>
                <li><a href="#funeral-tabs-4">Get Direct Quotes</a></li>
                <?php } ?>
              
              </ul>
              
              <!-- ************************* About My Plan ************************* -->  
              <div id="funeral-tabs-1"><p>
              
              
          <?php if($row['plan'] == '1'){ ?>
              <!--
              <p style="font-size:15px;">Thank you for choosing eziFunerals at this most difficult time!</p><br/>
              <p style="font-size:15px;">eziFunerals Basic is appropriate for those clients who DO NOT require specific support and assistance in planning a funeral.</p><br/>
              <p style="font-size:15px;">If you need to create a personalised funeral plan before selecting a funeral director, then eziFunerals Direct�or�eziFunerals Advance�may be the best option for you.</p><br/>
              -->
              
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;">Thank you for choosing eziFunerals at this most difficult time! </font>
              <br/><br/>
              <p style="font-size:15px;">This funeral plan is appropriate for those clients who require specific support and assistance in organising a funeral after someone has passed away or the loss of a family member is anticipated soon. You can use this plan to sit down with your family to discuss and plan the funeral arrangements before selecting and meeting a funeral director. If you are uncomfortable with searching for a funeral director, don't know who to trust, want to save money or simply wish to avoid a sales focused environment, then this plan would be suitable for you.</p>
               
               <br/> <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;" >How to complete your Funeral Plan</font>
              <br/><br/>
              <p style="font-size:15px; color:red; "> Your funeral plan is divided into a number of sections. You need to answer most of the questions in each section before you can move to the next section. Most of the questions simply require you to select 'Yes' or 'No', as appropriate. </p><br/>
               
              <p style="font-size:15px; color:red; "> When you've answered the questions on a section, click the 'Next' button at the bottom of the section to process the answers you've given and load the next section.</p><br/>
              <p style="font-size:15px; color:red; "> If you need to go backwards and forwards between sections (e.g. to check or change the answers you've given), use the 'Back' and 'Next' buttons at the bottom of a section to do so. This will ensure that any change in answers is properly processed.</p><br/>
               
              <strong> <p style="font-size:15px; color:red; ">PLEASE DO NOT USE the back, forward or history buttons in your browser to move between screens of this self-assessment.</p></strong> <p style="font-size:15px; color:red; ">This may break the logical connection between sections and lead to errors.</p><br/>
               
              <p style="font-size:15px; color:red; ">Some questions have hints, examples or extra guidance in smaller print underneath. Please read those before you answer the question. Some questions also include online help. This is indicated by the   <img src="<?php echo base_url;?>images/question.gif" alt=""/> symbol next to the question. Click the symbol to view the help.</p>
               
               
               <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;" >What information is contained in My Funeral Plan? </font><br/><br/>
              <p style="font-size:15px; color:red; "> Your Funeral Plan is divided into the following sections: </p>
               <br/>
              "<strong>My Personal Details</strong>" allows you to record details you or your family will need for official records.
              "<strong>Details of Deceased</strong>" records important information about your loved one.
              "<strong>Details of Committal</strong>" helps  you to identify how you would like you or your loved one to be put to rest.
              "<strong>Details of My Funeral</strong>" details your wishes regarding your or your loved one's funeral. 
              "<strong>After the Funeral</strong>" supports you or your family with a final act of love and allows you to organise or record how you wish yourself or your loved one to be remembered at the final resting place.
               <br/>
              For "Advanced Funeral Plans" you will be required to nominate your "<strong>Funeral Guardian</strong>" who will be notified upon your death. Once you have chosen your Funeral Guardian, they will be sent an e-mail where they can accept or decline your nomination. Your Funeral Guardian will have access to your Account and Funeral Plan only upon confirmation of your death. 
               <br/><br/>
              <p style="font-size:15px; color:red;">If you don't have all of this information to hand, don't worry. You can make a start now, save any data you enter and then return when you have the missing information.</p>
               
                <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;">What happens after I have prepared My Funeral Plan?</font>
              <br/><br/>
              <p style="font-size:15px; color:red;">Prior to making any payment we will show you a complete preview of your Funeral Plan. All of this for only $59!</p>

              <p style="font-size:15px;">Once your personalised funeral plan is complete you can post it online and invite funeral directors to provide you with no obligation quotes. You can be rest assured that you and your family will be empowered to make informed decisions about all your funeral-related matters. You should review your funeral plan regularly so that your funeral wishes and personal details are always up to date. </p>
                
              <p style="font-size:15px; color:red;">Please click the button below to continue. </p>

              <a href="#funeral-tabs-2" class="open-tab"><input type="button" class="login_button" name="CREATE" value="CREATE MY FUNERAL PLAN" style="width:200px"/></a>  
              
              
              
                      
            <?php }else{ ?>          
            <p><b style="font-size:18px;color:#00a3b4 !important;">Thank you for choosing eziFunerals at this most difficult time!</b></p><br/>                
      <!---atneed--->
      <?php  if($row['plan'] == '2'){ ?>

                  <p style="font-size:15px;">This funeral plan is appropriate for those clients who require specific support and assistance in organising a funeral after someone has passed away or the loss of a family member is anticipated soon. You can use this plan to sit down with your family to discuss and plan the funeral arrangements before selecting and meeting a funeral director. If you are uncomfortable with searching for a funeral director, don�t know who to trust, want to save money or simply wish to avoid a sales focused environment, then this plan would be suitable for you.</p><br/>
      <?php }
         if($row['plan'] == '3'){
       ?>            
       <!---Advance--->
      <p style="font-size:15px;">eziFunerals Advance is suitable for people who would you like to plan their funeral in advance and have greater control and input into their own funeral arrangements before they die. With this option you can reduce the stress and burden that your family and friends will face after you have passed away. With EziFunerals Advance, you are planning your funeral while you are living and you will be required to nominate a "Funeral Guardian" to administer your funeral.</p><br/>
      <?php } ?>
        
         <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;" >How to complete your Funeral Plan</font>
              <br/><br/>
              <p style="font-size:15px;"> Your funeral plan is divided into a number of sections. You need to answer most of the questions in each section before you can move to the next section. Most of the questions simply require you to select 'Yes' or 'No', as appropriate. </p><br/>
               
              <p style="font-size:15px;"> When you've answered the questions on a section, click the 'Next' button at the bottom of the section to process the answers you've given and load the next section.</p><br/>
              <p style="font-size:15px;  "> If you need to go backwards and forwards between sections (e.g. to check or change the answers you've given), use the 'Back' and 'Next' buttons at the bottom of a section to do so. This will ensure that any change in answers is properly processed.</p><br/>
               
              <strong> <p style="font-size:15px; ">PLEASE DO NOT USE the back, forward or history buttons in your browser to move between screens of this self-assessment.</p></strong> <p style="font-size:15px;">This may break the logical connection between sections and lead to errors.</p><br/>
               
              <p style="font-size:15px;">Some questions have hints, examples or extra guidance in smaller print underneath. Please read those before you answer the question. Some questions also include online help. This is indicated by the   <img src="<?php echo base_url;?>images/question.gif" alt=""/> symbol next to the question. Click the symbol to view the help.</p>
               
               
               <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;" >What information is contained in My Funeral Plan? </font><br/><br/>
              <p style="font-size:15px; "> Your Funeral Plan is divided into the following sections: </p>
               <br/>
              "<strong>My Personal Details</strong>" allows you to record details you or your family will need for official records.
              <br/>"<strong>Details of Deceased</strong>" records important information about your loved one.
              <br/>"<strong>Details of Committal</strong>" helps  you to identify how you would like you or your loved one to be put to rest.
              <br/>"<strong>Details of My Funeral</strong>" details your wishes regarding your or your loved one's funeral. 
              <br/>"<strong>After the Funeral</strong>" supports you or your family with a final act of love and allows you to organise or record how you wish yourself or your loved one to be remembered at the final resting place.
               <br/><br/>
              For "Advanced Funeral Plans" you will be required to nominate your "<strong>Funeral Guardian</strong>" who will be notified upon your death. Once you have chosen your Funeral Guardian, they will be sent an e-mail where they can accept or decline your nomination. Your Funeral Guardian will have access to your Account and Funeral Plan only upon confirmation of your death. 
               <br/><br/>
              <p style="font-size:15px;">If you don't have all of this information to hand, don't worry. You can make a start now, save any data you enter and then return when you have the missing information.</p>
               
                <br/>
              <font style="color:#00a3b4; font-family: 'Helvetica Medium 65', Arial; font-size:20px;">What happens after I have prepared My Funeral Plan?</font>
              <br/><br/>
              <p style="font-size:15px; ">Prior to making any payment we will show you a complete preview of your Funeral Plan. All of this for only $59!</p>

              <p style="font-size:15px;">Once your personalised funeral plan is complete you can post it online and invite funeral directors to provide you with no obligation quotes. You can be rest assured that you and your family will be empowered to make informed decisions about all your funeral-related matters. You should review your funeral plan regularly so that your funeral wishes and personal details are always up to date. </p>
                <br/><br>
              <p style="font-size:15px;">Please click the button below to continue.</p>

          <?php 
         if($row['plan']=='2' && $row_of_info['pdf_type']=='At Need Plan' && $row_of_info['order_info']=='Approved' )
               {
               ?>
                    
            <a href="<?php echo base_url;?>atneed/preview.php"><input type="button" name="pdfedit" class="login_button" value="MANAGE" /></a>
               
              <a href="download.php?filename=<?php echo $row_of_info['pdf_name'];?>&type=<?php if($row_of_info['pdf_type']=='Advance Plan'){ echo 'advance'; }else{echo 'atneed';} ?>"><input type="button" class="login_button" name="DOWNLOAD" value="DOWNLOAD" /></a>  
              
            <?php }
            else if($row['plan']=='2' && $row_of_info['pdf_type']!='At Need Plan' || $row_of_info['pdf_type'] =='At Need Plan' && $row_of_info['order_info']=='Declined')
            {
            
                echo '<a href="'.base_url.'atneed/person-making-arrangements.php"><input type="button" class="login_button" name="CREATE MY FUNERAL PLAN" value="CREATE MY FUNERAL PLAN" style="width:200px"/></a>';  
            }
  
            ?>
            

            
            <?php  if($row['plan']=='3' && $row_of_info['pdf_type']=='Advance Plan' && $row_of_info['order_info']=='Approved' )
                { 
                ?>
            
              <a href="<?php echo base_url;?>advance/advance_preview.php"><input type="button" class="login_button" name="MANAGE" value="MANAGE" /></a>  
              <a href="download.php?filename=<?php echo $row_of_info['pdf_name'];?>&type=<?php if($row_of_info['pdf_type']=='Advance Plan'){ echo 'advance'; }else{echo 'atneed';} ?>"><input type="button" class="login_button" name="DOWNLOAD" value="DOWNLOAD" /></a>
           
            
             <?php }
             else if($row['plan']=='3' && $row_of_info['pdf_type']!='Advance Plan' || $row_of_info['pdf_type'] =='Advance Plan' && $row_of_info['order_info']=='Declined' )
             {
             
               echo  '<a href="'.base_url.'advance/my-personal-details.php"><input type="button" class="login_button" name="CREATE MY FUNERAL PLAN" value="CREATE MY FUNERAL PLAN" style="width:230px" /></a>';
            
             }
                   
             
             ?>
            <?php } ?>
            
              </p></div>
              <!-- ************************* Create a Plan ************************* -->  
              <div id="funeral-tabs-2" style="border: 1px;">
              
				<script>
                  $(document).ready(function() {
                    $('#more-tabs-myfuneralplan > ul > li:nth-child(2)').click(function(){
                      document.getElementById("create-plan").style.display = "block";
                    });
                  });
                 </script>

                  <div id="create-plan" style="display:none;">    
                        <?php //include 'create-plan- inc.php';  ?>      
						<iframe src="http://ezifunerals.com.au/atneed/manage-plan.php"  marginwidth="5" width="100%" height="720" frameborder="0" scrolling="no"></iframe>
                  </div>
				  
				
                    <!-- **************************************************************************** -->  
					<!-- *************************************************************************** -->  
				
			  </div>
              <!-- ************************* View my Plan ************************* -->  
              <div id="funeral-tabs-3">
                  <script>
                  $(document).ready(function() {
                    $('#more-tabs-myfuneralplan > ul > li:nth-child(3)').click(function(){
                      document.getElementById("viewmyplan").style.display = "block";
                    });
                  });
                  </script>

                  <div id="viewmyplan" style="display:none;">    
                        <?php include 'viewmyplan - inc.php';  ?>      
                  </div>
              
              </div>
              
              <!-- ************************* Get Direct Quotes ************************* -->  
              <div id="funeral-tabs-4">
			 
				
			
              <script>
                  $(document).ready(function() {
                    $('#more-tabs-myfuneralplan > ul > li:nth-child(4)').click(function(){
                      document.getElementById("get-direct").style.display = "block";
                    });
                  });
                  </script>

                  <div id="get-direct" style="display:none;"> 
                        <?php include'get-direct-quotes-form.php';  ?>      
                  </div>
              </div>
          </div>    
         
        </div>
        
        <div id="tabs-3" class="ui-tabs-panel"> <!-- ************************* Get Basic Quotes ************************* -->  
        <p>
          
          <!---hide and show containt------------>

          <style>

          #show{display:block;}
          #hide{display:none;}

          </style>
          <script>
          /*function hideandshow() {
            document.getElementById("show").style.display = "none";
            document.getElementById("hide").style.display = "block";
          }
          function showtohide() {
            document.getElementById("show").style.display = "block";
            document.getElementById("hide").style.display = "none";
                }
                */</script>    
            
        <!----------End hide and show containt------------>    
            <div id="show" style="display:none">                
                  <p><b style="font-size:18px;color:#00a3b4 !important;">EziFunerals will help you organise a funeral at a price that's right for you. We'll connect you with approved funeral directors in your area.</b></p><br/>
                  <p><b style="font-size:18px;color:#00a3b4 !important;">How does EziFunerals work?</b></p><br/>
                  <p style=" font-size:15px;">On completion of the Request Funeral Quotes Form you will be able to do the following:</p>
                   <ol style="list-style:circle; font-size:15px;">
            <li>Find funeral directors in your local area</li>
            <li>Review funeral director profiles</li>
            <li>Read customer reviews</li>
            <li>Invite funeral directors to provide you with funeral quotes</li>
            
            </ol>
            
             <p><b style="font-size:18px;color:#00a3b4 !important;">What happens after I send my funeral quote request?</b></p><br/>
             <ol style="list-style:circle;  font-size:15px;">
              <li>We will contact invited funeral directors and notify them about your request</li>
              <li>Funeral directors in your area will review and respond to your request</li>
            </ol>              
              <p style="font-size:15px;">Within hours, you will start receiving quotes from funeral directors in your area. You'll be able to compare quotes, messages, reviews and funeral services. When you're ready, select a funeral director that meets your individual needs.</p><br/>
               <p style="font-size:15px;">It's free for you to use.</p><br/>
               <input type="button" name="NEXT" value="GET QUOTES" class="login_button"  onclick="hideandshow();"/>
            </div>
            <!-- <div id="hide" style="display:block">    
               <?php // include 'post-your-plan-tab.php';  ?>  
        
            <div id="tab4" class="tab-content">  
                  </div> 
                  
            </div> -->
            <script>
              $(document).ready(function() {
                $('#tabs > ul > li:nth-child(3)').click(function(){
                  document.getElementById("post-your-plan-tab").style.display = "block";
                });
              });
              </script>

              <div id="post-your-plan-tab" style="display:none;">   		  
                    <?php include'post-your-plan-tab.php';  ?>      
              </div>
        <!-- end tab -->
        </p></div>
        </div>
        
        <div id="tabs-4" class="ui-tabs-panel"> <!-- ************************* View Quotes ************************* -->  
        
          <p>        
        <script>
        $(document).ready(function() {
          $('#tabs > ul > li:nth-child(4)').click(function(){
            document.getElementById("disp").style.display = "block";
            document.getElementById("post-your-plan-tab").style.display = "none";
          });
        });
          </script>

        <div id="disp" style="display:none;">    
              <?php include'viewquotes - inc.php';  ?>      
        </div>
        </p>
        </div>
    </div>

  

</div>


<?php include_once 'include/main_footer1.php'; ?>

<!--<script type="text/javascript" src="js/mainmenu/jquery-1.7.1.min.js"></script>-->
<script type="text/javascript" src="js/tabs/tabs.js"></script>
<script type="text/javascript" src="js/tabs/tabs-style2.js"></script>

<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">

<script>
    $(document).ready(function() {
      $('#tabs > ul > li:nth-child(1)').click(function(){
        document.getElementById("disp").style.display = "none";
        document.getElementById("post-your-plan-tab").style.display = "none";
      });
      $('#tabs > ul > li:nth-child(2)').click(function(){
        document.getElementById("disp").style.display = "none";
        document.getElementById("post-your-plan-tab").style.display = "none";
      });
      $('#tabs > ul > li:nth-child(3)').click(function(){
        document.getElementById("disp").style.display = "none";
      });
    });
 </script>
        
  <style type="text/css" rel="stylesheet">
.ui-corner-all {
  width: 99.4% !important; 
}

.ui-tabs .ui-tabs-nav {
  margin: 0;
  padding: 0 !important;
}

.ui-widget-header {
  background: #F3F3F3 url(images/ui-bg_gloss-wave_35_f6a828_500x100.png) 50% 50% repeat-x !important;
  color: #ffffff !important;
  font-weight: bold !important;
  padding-left: 10px !important;
}

.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active{
  color: #ffffff !important;
  background: #00A3B5 !important;
}

#more-tabs-myfuneralplan{
  border: 0px !important;
}

#more-tabs-myaccount{
  border: 0px !important;
}

#tabs-1{
border: 0px !important;
}
.ui-tabs {
  zoom: 1;
}

.ui-tabs .ui-tabs-nav {
  list-style: none;
  position: relative;
  padding: 0;
  margin: 0;
}
.ui-tabs .ui-tabs-nav li {
  position: relative;
  float: left;
  margin: 0 3px -2px 0;
  padding: 0;
}
.ui-tabs .ui-tabs-nav li a {
  display: block;
  padding: 10px 20px;
  outline: none;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a {
  padding: 10px 20px 12px 20px;
    color: #ffffff !important;
  background: #00A3B5 !important;
  border-bottom-style: none;
}
.ui-tabs .ui-tabs-nav li.ui-tabs-selected a,
.ui-tabs .ui-tabs-nav li.ui-state-disabled a,
.ui-tabs .ui-tabs-nav li.ui-state-processing a {
  cursor: default;
}
.ui-tabs .ui-tabs-nav li a,
.ui-tabs.ui-tabs-collapsible .ui-tabs-nav li.ui-tabs-selected a {
  cursor: pointer;
}
.ui-tabs .ui-tabs-panel {
  display: block;
  clear: both;
  padding: 10px;
}
.ui-tabs .ui-tabs-hide {
  display: none;
} 

#tabs {
  border: 0px !important;
}
</style>


</body>
</html>
<?php
  }
  else
  {
    header('Location:signin.php');
  }
?>



