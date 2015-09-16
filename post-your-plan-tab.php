<?php
error_reporting(0);
	ob_start();

	include_once('include/config.php');
	
	@session_start();

	

	$a = explode('/',$_SERVER['REQUEST_URI']);

	//echo $_SESSION['client'];

	$_SESSION['url'] = $a[1];


//echo $path1 = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/client_pdf/".$_SESSION['client'].'<br>';
//echo $filename = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/client_pdf/".$_SESSION['client']. "/";exit;
//echo $path =base_url.'uploads/client_pdf/'.$_SESSION['client'].'/';exit;	
//echo $path =base_url.'uploads/client_pdf/'.$_SESSION['client'];	exit;

	if(isset($_POST['name']))
	{
		//echo "hi";
		$name=$_POST['name'];
    	$contact=$_POST['contact_no'];
		$service=$_POST['service'];
		$reason=$_POST['reason'];
		$budget=$_POST['budget'];
		$country=$_POST['country'];
		$state1=$_POST['state'];
		$city=$_POST['city'];
		$postal_code=$_POST['postal_code'];
		$method=$_POST['method'];
	

		if($_FILES["pdf_name"]['name'])
		{
			

			if (!file_exists($filename)) {

				
				mkdir("uploads/client_pdf/".$_SESSION['client'],0777);
				//mkdir($path1, 0777);	
						
					
			}
			
				
			$path ='uploads/client_pdf/'.$_SESSION['client'];
			$new_file_name = time().rand().$_FILES["pdf_name"]["name"];

		

			move_uploaded_file($_FILES["pdf_name"]["tmp_name"],$path.'/'.$new_file_name);							
			
			mysql_query("insert into clients_pdf(client_id,name,contact_no,funeral_service,reason_quote,method,budget,country,state,city,postal_code,pdf_name) values(".$_SESSION['client'].",'".$name."','".$contact."','".$service."','".$reason."','".$method."','".$budget."','".$country."','".$state1."','".$city."','".$postal_code."','".$new_file_name."')");
		}
		else
		{
			
			 mysql_query("insert into clients_pdf(client_id,name,contact_no,funeral_service,reason_quote,method,budget,country,state,city,postal_code) values(".$_SESSION['client'].",'".$name."','".$contact."','".$service."','".$reason."','".$method."','".$budget."','".$country."','".$state1."','".$city."','".$postal_code."')");
		}
		  
		
		?>
<script>
		window.location='funeral_directors.php?country=<?php echo $country; ?>&state=<?php echo $state1; ?>&city=<?php echo $city; ?>'
		</script>
<?php }

	if(isset($_SESSION['client']))

	{
	
	$id = $_REQUEST['id'];
	//echo $id;
	//exit;

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
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
						
						function fvalidate()
						{
							document.getElementById('validateflag').value=0;
							if(document.getElementById('name').value=='')
							{
								alert("Please enter name.");
								return false;
							}
						if(document.getElementById('contact').value=='')
							{
								alert("Please enter contact.");
								return false;
							}
							

							if(document.getElementById('budget').value=='')
							{
								alert("Please enter budget.");
								return false;
							}
							if(document.getElementById('state1').value=='')
							{
								alert("Please enter state.");
								return false;
							}
							if(document.getElementById('postal_code').value=='')
							{
								alert("Please enter postal code.");
								return false;
							}
							document.getElementById('validateflag').value=1;
						}
						</script>
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
<script type="text/javascript">
    $(document).ready(function() {

      $( "#clickme" ).click(function() {
                //alert();
        $( "#show" ).toggle();

      });
    })
</script>
<style>
/*Initialize*/
ul#menu, ul#menu ul.sub-menu {
  float: right;
    margin: 0;
    padding: 0;
    width: 140px;
    z-index: 99999;
}
ul#menu li, ul#menu ul.sub-menu li {
    list-style-type: none;
    display: inline-block;
}
/*Link Appearance*/
ul#menu li a, ul#menu li ul.sub-menu li a{
   background: none repeat scroll 0 0 #5DCED9;
    color: #FFFFFF;
    display: inline-block;
    padding: 5px 14px;
    text-decoration: none;
    width: 83px;
}
 ul#menu li ul.sub-menu li a:hover {
     background: none repeat scroll 0 0 #333;
    color: #FFFFFF;
    display: inline-block;
    padding: 5px 14px;
    text-decoration: none;
    width: 107px;
 }
/*Make the parent of sub-menu relative*/
ul#menu li {
     background: none repeat scroll 0 0 #5DCED9;
    position: relative;
    width: 136px;

}

#menu span {
    cursor: pointer;
    margin-right: -6px;
}
/*sub menu*/
ul#menu li ul.sub-menu {
    display:none;
    position: absolute;
    top: 30px;
    left: 0;
    width: 100px;
}
ul#menu li:hover ul.sub-menu {
    display:block;
}
</style>
</head>
<body>
<script type='text/javascript'>

			$(document).ready(function() {

				

				

				$( "#city1" ).autocomplete({

		

			

					source: function(request, response) {

						

					$.ajax({

						url :"city.php" ,

						data : "state_id="+$("#state1").val()+"&city="+$('#city1').val(),

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

			}

		</script>
<script type="text/javascript" src="js/Old_Include_Js/jquery.mousewheel-3.0.6.pack.js"></script>
<div class="container"><br/>
					<p><b style="font-size:16px;color:#00a3b4 !important;">
					Use this form to connect directly with Funeral Directors without a plan, or upload your own plan.
					</b></p><br/>	
					
  <h2 style="font-family: 'Helvetica Medium 65', Arial;" >REQUEST A FUNERAL QUOTE</h2>
  <div class="gridContainer clearfix"><br/>
    <div id="LayoutDiv1">
      <div class="quote-box-form qoutesflield">
      <fieldset class="fieldset dash_quote2" style="margin-bottom:10px; width:600px; margin-top:-40px; margin-left: 16px;">
      <legend class="legend">Person Making Arrangements: </legend>
      <div class="reg_box" style="margin:inherit;">
        <?php
								$ispdfsql = "SELECT * FROM clients_pdf WHERE client_id = '".$_SESSION['client']."'";
			
										$ispdfex = mysql_query($ispdfsql);
										
										while($redata = mysql_fetch_assoc($ispdfex))
										{
											$name_data = $redata['name'];
											$con_num = $redata['contact_no'];
											$se = $redata['funeral_service'];
											$re = $redata['reason_quote'];
											$budget_di = $redata['budget'];
											$sel = $redata['state'];
											$city_dis = $redata['city'];
											$post_dis = $redata['postal_code'];
											$method=$redata['method'];
										}
										
									
									if(isset($_POST['hidden_form']))
			
									{
									
										$ispresent = @mysql_num_rows($ispdfex);
			
			
											if($_FILES["pdf_name"]["name"] != '')
			
											{
			
												$filename = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/client_pdf/".$_SESSION['client']. "/";

												$path1 = $_SERVER['DOCUMENT_ROOT'].folder_name."/uploads/client_pdf/".$_SESSION['client'];

			
												if (!file_exists($filename)) {
			
													mkdir($path1, 0777);		
			
												}

												$path = $_SERVER['DOCUMENT_ROOT'].folder_name.'/uploads/client_pdf/'.$_SESSION['client'];

												$new_file_name = time().rand().$_FILES["pdf_name"]["name"];

												move_uploaded_file($_FILES["pdf_name"]["tmp_name"],$path."/" . $new_file_name);							
			
											}
			
											else
			
											{
			
												$new_file_name = '';
			
											}
	
									if($ispresent=='0'){
											
													}
													else{

													
													}
												mysql_query($sql);
												$orderid=mysql_insert_id();

												$getpath = 'country='.$_POST['country'].'&state='.$_POST['state'].'&city='.$_POST['city'];
											
										}

								?>
        <!--<span class="login_head">Invite Funeral Directors to Quote</span>-->
        <!--<p>Sign Up with Your Email</p>-->
		<?php
		$sql = "SELECT * FROM clients WHERE id = '".$_SESSION['client']."' ";
		$sqlex = mysql_query($sql);
		$result = mysql_fetch_assoc($sqlex);
		
		$name_data = ucwords($result['first_name']).' '.ucwords($result['last_name']);
		$con_num = $result['phone'];
		?>
        <form action="" name="postplanfrm" id="postplanfrm" method="post" enctype="multipart/form-data" style="padding-top:40px !important;">
          <span class="fields_wrapp"> <span class="reg_name">Name</span>
          <input class="reg_field" type="text" name="name" id="name" value="<?php echo $name_data;?>">
          <input type="hidden" name="director_id" id="director_id" value="<?php echo $_GET['id']; ?>"/>
          <span style="color:red;margin-left: 10px;" id="aa"></span> </span> <span class="fields_wrapp"> <span class="reg_name">Contact Number</span>
          <input class="reg_field" type="text" name="contact_no" id="contact" maxlength="10" value="<?php echo $con_num;?>">
          <span style="color:red;margin-left: 10px;" id="bb"></span> </span> <span class="fields_wrapp1">
          <p class="reg_box_p">What funeral service do you require?</p>
          <label class="reg_label">
          <input class="reg_radio" type="radio" name="service"
										<?php if(isset($se) && $se=="Burial"){ echo "checked";}else{ echo "checked";}?>  
										value="Burial" >
          <span class="reg_radio">Burial</span></label>
          <label class="reg_label">
          <input class="reg_radio" type="radio" name="service" <?php if(isset($se) && $se=="Cremation") echo "checked";?> value="Cremation">
          <span class="reg_radio">Cremation</span></label>
          </span> <span class="fields_wrapp1">
          <p class="reg_box_p">Reason for Funeral quote </p>
          <label class="reg_label_full_width">
          <input class="reg_radio" type="radio" name="reason" value="Someone has just died" <?php if(isset($re) && $re=="Someone has just died"){ echo "checked";}else{echo "checked";}?>  >
          <span class="reg_radio">Someone has just died </span></label>
          <label class="reg_label_full_width">
          <input class="reg_radio" type="radio" name="reason" value="Death is imminent" <?php if(isset($re) && $re=="Death is imminent") echo "checked";?> >
          <span class="reg_radio">Death is imminent</span></label>
          <label class="reg_label_full_width">
          <input class="reg_radio" type="radio" name="reason" value="Organising a funeral soon" <?php if(isset($re) && $re=="Organising a funeral soon") echo "checked";?> >
          <span class="reg_radio">Organising a funeral soon</span></label>
          <label class="reg_label_full_width">
          <input class="reg_radio" type="radio" name="reason" value="Just Interested" <?php if(isset($re) && $re=="Just Interested") echo "checked";?> >
          <span class="reg_radio">Just Interested</span></label>
          </span> <span class="fields_wrapp1">
          <p class="reg_box_p">Preferred Method of Contact?</p>
          <label class="reg_label">
          <input class="reg_radio" type="radio" name="method"
										<?php if(isset($method) && $method=="mobile"){ echo "checked";}else{ echo "checked";}?>  
										value="mobile" >
          <span class="reg_radio">mobile</span></label>
          <label class="reg_label">
          <input class="reg_radio" type="radio" name="method" <?php if(isset($method) && $method=="email") echo "checked";?> value="email">
          <span class="reg_radio">email</span></label>
          </span> <span class="fields_wrapp1"> <span class="reg_name">Funeral Budget</span>
          <input class="reg_field" type="text" name="budget" id="budget" value="<?php echo $budget_di;?>">
          <span style="color:red;margin-left: 10px;" id="cc"></span> </span>
          <input type="hidden" id="hidden_form" name="hidden_form" value="1">
          <span class="fields_wrapp1"> <span class="reg_name">Select Country</span>
          <input type="text" id="country1" name="country" value="Australia" readonly class="reg_field" style="width:95%">
          </span> <span class="fields_wrapp1"> <span class="reg_name">Select State / Province</span>
          <select class="defaultSelect" name="state" id="state1" style="font-weight: normal;width: 96.5% !important;height: 35px;">
            <option value="">Select State / Province</option>
            <?php
			
								$statesql = "SELECT * FROM states ORDER BY state_name";
			
								$statesex = mysql_query($statesql);
			
								$sel1 = '';
								
								
								while($states = mysql_fetch_assoc($statesex))
			
								{
								//echo $sel;
								//exit;
								
								$selected1 = "";
												  
							if($states['state_id'] == $sel)
							{
									$selected1 .= "selected='selected'";	  
							}			
								?>
            <option <?php echo $selected1;?> value="<?php echo $states['state_id'];?>"> <?php echo $states['state_name'];?></option>
            <?php 
								}
			
							?>
          </select>
          <span style="color:red;margin-left: 10px;" id="ee"></span> </span> <span class="fields_wrapp1"> <span class="reg_name">Suburb</span> <span id="city_span">
          <!--<select class="defaultSelect"  name="city" id="city">
			
												<option class="selectOption2" value="">Select City</option>
			
											</select>-->
          <input type="text" name="city" id="city1" placeholder="Enter Your Suburb" class="reg_field" style="  margin-left:inherit !important" value="<?php echo $city_dis;?>"/>
          <span style="color:red;margin-left: 10px;" id="ff"></span> </span> </span> <span class="fields_wrapp1"> <span class="reg_name">Postal Code / Zip</span>
          <input class="reg_field" type="text" name="postal_code" id="postal_code" value="<?php echo $post_dis;?>" maxlength="4">
          <span style="color:red;margin-left: 10px;" id="gg"></span> </span> <span class="fields_wrapp"> <span class="reg_name" style="margin-top:0;">Add / Upload Your Funeral Plan</span>
          <div class="customfile-container" style="width:325px">
            <input type="file" id="file" name="pdf_name"  onChange="checkfile(this.value)" />
            <script>
										  function checkfile(name)
										  {
											  
											  if(name=='')
											  {
												  document.getElementById('withfile').style.display='none';
												  document.getElementById('nofile').style.display='inline';
											  }
											  else
											  {
												 document.getElementById('withfile').style.display='inline';
												  document.getElementById('nofile').style.display='none';  
											  }
										  }
										  </script>
            <span style="color:red;margin-left: 10px;" id="hh"></span> </div>
          </span> <span class="invite_director_line">You can invite as many funeral directors as per your choice to quote on your personal funeral plan.</span> <span style="width:100%; float:left;">
          <!--<span class="reg_name">&nbsp;</span>-->
          <!--<input class="invite_director_btn" type="submit" id="form_submit" name="form_submit" value="Invite Funeral Directors Now">
			<a href="#yier" class="fancybox1"></a>
			
			 <a class="fancybox-effects-a" href="#yier" id="login_pop<?php //echo $k?>"><img src="images/send_btn.jpg" border="0" /></a>-->
          <?php// if($nopdf == 1){?>
          <input class="invite_director_btn" type="submit" id="form_submit1" name="form_submit" value="Get Quotes NOW" style="display:none">
          <div id="nofile" > <a href="#yier" id="a1"><br/>
            <input class="login_button" style="width:150px;" type="button" id="form_submit" name="form_submit" value="Get Quotes NOW" onClick="return fvalidate();">
            </a>
          <!--  <input class="login_button" type="button" value="Back" onClick="showtohide()">-->
          </div>
          <div id="withfile" style="display:none">
            <input class="login_button" style="width:150px;" type="submit" id="form_submit" name="form_submit" value="Get Quotes NOW" onClick="return fvalidate();">
            <!--<input class="login_button" type="button" value="Back" onClick="showtohide()">-->
            </a> </div>
          <?php //}else{?>
          <!-- <input class="invite_director_btn" type="submit" id="form_submit" name="form_submit" value="Invite Funeral Directors Now"><?php //}?>
			-->
          </span>
        </form>
      </div>
      </div>
      </fieldset>
      <div class="clear"></div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<!--Custom File Type-->
<script type="text/javascript">
(function( $ ) {



  // Browser supports HTML5 multiple file?

  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',

      isIE = /msie/i.test( navigator.userAgent );

    $.fn.customFile = function() {


    return this.each(function() {



      var $file = $(this).addClass('customfile'), // the original file input

          $wrap = $('<div class="`">'),

          $input = $('<input type="text" class="customfile-filename" />'),

          // Button that will be used in non-IE browsers

          $button = $('<button type="button" class="customfile-upload">Choose File</button>'),

          // Hack for IE

          $label = $('<label class="customfile-upload" for="'+ $file[0].id +'">Open</label>');



      // Hide by shifting to the left so we

      // can still trigger events

      $file.css({

        position: 'absolute',

        left: '-9999px'

      });



      $wrap.insertAfter( $file )

        .append( $file, $input, ( isIE ? $label : $button ) );



      // Prevent focus

      $file.attr('tabIndex', -1);

      $button.attr('tabIndex', -1);



      $button.click(function () {

        $file.focus().click(); // Open dialog

      });



      $file.change(function() {



        var files = [], fileArr, filename;



        // If multiple is supported then extract

        // all filenames from the file array

        if ( multipleSupport ) {

          fileArr = $file[0].files;

          for ( var i = 0, len = fileArr.length; i < len; i++ ) {

            files.push( fileArr[i].name );

          }

          filename = files.join(', ');



        // If not supported then just take the value

        // and remove the path to just show the filename

        } else {

          filename = $file.val().split('\\').pop();

        }



        $input.val( filename ) // Set the value

          .attr('title', filename) // Show filename in title tootlip

          .focus(); // Regain focus



      });



      $input.on({

        blur: function() { $file.trigger('blur'); },

        keydown: function( e ) {

          if ( e.which === 13 ) { // Enter

            if ( !isIE ) { $file.trigger('click'); }

          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del

            // On some browsers the value is read-only

            // with this trick we remove the old input and add

            // a clean clone with all the original events attached

            $file.replaceWith( $file = $file.clone( true ) );

            $file.trigger('change');

            $input.val('');

          } else if ( e.which === 9 ){ // TAB

            return;

          } else { // All other keys

            return false;

          }

        }

      });

    });

  };



  // Old browser fallback
//
//  if ( !multipleSupport ) {
//
//    $( document ).on('change', 'input.customfile', function() {
//
//
//
//      var $this = $(this),
//
//          // Create a unique ID so we
//
//          // can attach the label to the input
//
//          uniqId = 'customfile_'+ (new Date()).getTime(),
//
//          $wrap = $this.parent(),
//
//
//
//          // Filter empty input
//
//          $inputs = $wrap.siblings().find('.customfile-filename')
//
//            .filter(function(){ return !this.value }),
//
//
//
//          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');



      // 1ms timeout so it runs after all other events

      // that modify the value have triggered

      setTimeout(function() {

        // Add a new input

        if ( $this.val() ) {

          // Check for empty fields to prevent

          // creating new inputs when changing files

          if ( !$inputs.length ) {

            $wrap.after( $file );

            $file.customFile();

          }

        // Remove and reorganize inputs

        } else {

          $inputs.parent().remove();

          // Move the input so it's always last on the list

          $wrap.appendTo( $wrap.parent() );

          $wrap.find('input').focus();

        }

      }, 1);



    });

  }

}( jQuery ));



$('input[type=file]').customFile();

</script>
<input type="hidden" name="validateflag" id="validateflag" value="0"/>
<a href="#x" class="overlay" id="yier"></a>
<div class="popup">
  <div class="row">
    <div class="col-md-5">
      <div id="yier">
        <!--<h1>Add Review</h1>-->
        <span class="fields_wrapp">

            <span class="reg_name businessPopSpan" id="dis_msg" style="line-height:24px;">
		You have not uploaded your funeral plan with this request.  <br/>
		In order to get accurate funeral quotes and comparisons, you should include your funeral plan. 
		Would you like to upload your funeral plan?

		</span>

			<div class="name-fieldpop1" style="margin-top: 7px; margin-left:10px;">

                  <input name="proceed" type="radio" value="yes" id="r1" > Yes
                    <input name="proceed" type="radio" value="no" id="r2"> No

                  

            <span style="width:100%; text-align:center; float:left; margin-top:10px;"><input type="button" class="login_button proceed_button" value="Submit" id="proceed_button" name="proceed_button" style="width:120px; margin-left:0px;margin-top: 10px;" onClick="return popupvalidate()"></span>        
		  </div>
        </span>     
		</div>
    </div>
  </div>
  <a class="close" id="close" href="#close"></a> </div>
<script>
function popupvalidate()
{
	if(!(document.getElementById('r1').checked) && !(document.getElementById('r2').checked))
	{
		 alert("Please select one option of still wish to proceed.");
		 return false;
	}
	if (document.getElementById('r1').checked) {
		document.getElementById('close').click();
		
	}
	else
	{
		 if(document.getElementById('validateflag').value==1)
		 {
			 document.getElementById("postplanfrm").submit();
		 }
		 else
		 {
			 alert("First fill all required fields.")
			 
		 }
	}
	
}
</script>
<!--Custom File Type-->
</body>
</html>
<?php

	}

	else
	{

		header('Location:signin.php');

	}

?>

<!---
BACK UP HERE-------------
function popupvalidate()
{
	if(!(document.getElementById('r1').checked) && !(document.getElementById('r2').checked))
	{
		 alert("Please select one option of still wish to proceed.");
		 return false;
	}
	if (document.getElementById('r1').checked) {
		 if(document.getElementById('validateflag').value==1)
		 {
			 document.getElementById("postplanfrm").submit();
		 }
		 else
		 {
			 alert("First fill all required fields.")
			 
		 }
	}
	else
	{
		window.location='http://ezifunerals.com.au/';
	}
	
}


-->