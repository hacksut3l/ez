<?php

	ob_start();

	include_once('config.php');

	@session_start();

	

	$a = explode('/',$_SERVER['REQUEST_URI']);

	

	$_SESSION['url'] = $a[1];

	

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

<link href="css/boilerplate.css" rel="stylesheet" type="text/css">

<link href="css/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery-1.8.min.js"></script>



<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.23.custom.css" />

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

<script src="js/respond.min.js"></script>

<style type="text/css">
.fancybox-skin{ margin:0 auto !important; }
#yier {
float: left;
width: 88%;
padding: 15px;
}
.fancybox-inner{ overflow:hidden !important; width:700px !important;}
.fieldpop {
float: left;
width: 40%;
font-family: 'Conv_ufonts.com_helvetica-normal';
}
	
</style>

</head>

<body>

<script type='text/javascript'><!--

			$(document).ready(function() {

				

				

				/*$('#state').live("change",function()

				{

					var state_id = $(this).val();

					

					$.ajax

						({

							type: "POST",

							url: "get_cities_plan.php",

							data: "state_id="+state_id,

							success: function(msg)

							{

								$('#city_span').html(msg);

							}

							

						});

					

				});*/

				

				

				

				$( "#city" ).autocomplete({

		

			

					source: function(request, response) {

						

					$.ajax({

						url :BASE_URL+"city.php" ,

						data : "state_id="+$("#state1").val()+"&city="+$('#city').val(),

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

			}//-->

		</script>

        <script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>



	<!-- Add fancyBox main JS and CSS files -->

	<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.4"></script>

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.4" media="screen" />



	<!-- Add Button helper (this is optional) -->

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-buttons.css?v=1.0.5" />

	<script type="text/javascript" src="js/jquery.fancybox-buttons.js?v=1.0.5"></script>



	<!-- Add Thumbnail helper (this is optional) -->

	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-thumbs.css?v=1.0.7" />

	<script type="text/javascript" src="js/jquery.fancybox-thumbs.js?v=1.0.7"></script>



	<!-- Add Media helper (this is optional) -->

	<script type="text/javascript" src="js/jquery.fancybox-media.js?v=1.0.5"></script>

<script type="text/javascript">

$(document).ready( function() {

$('.fancybox1').fancybox();


});

</script>

<div class="gridContainer clearfix">

  <div id="LayoutDiv1">

      <div id="wrapper">

       		<div id="container">

            <?php include("header.php"); ?>

         <div style="width:100%; float:left; box-shadow: 0 3px 3px #CCCCCC; height: 2px; margin-bottom:10px;"> </div>

            	<div class="content"><div class="inner_container"><div class="left_con"><h1 style="text-align:left !important;  margin-bottom:43px; font-family: 'Conv_ufonts.com_helvetica-normal'; font-weight:bold;">Invite Funeral Directors to Quote</h1></div></div></div>

            </div>

            <div style="width:100%; float:left; padding-bottom:20px;">

            	<div class="log_ex">

                <div class="login_wrapper">

                	<div class="reg_box">

                    <?php
					$ispdfsql = "SELECT 

											* 

										FROM 

											clients_pdf

										WHERE

											client_id = '".$_SESSION['client']."'

										";

										

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
								$sql = "INSERT

										INTO

											clients_pdf

											(

												client_id,

												name,

												contact_no,

												funeral_service,

												reason_quote,

												budget,

												country,

												state,

												city,

												postal_code,

												pdf_name

											)

										VALUES

											(

												'".$_SESSION['client']."',

												'".$_POST['name']."',

												'".$_POST['contact_no']."',

												'".$_POST['service']."',

												'".$_POST['reason']."',

												'".$_POST['budget']."',

												'".$_POST['country']."',

												'".$_POST['state']."',

												'".$_POST['city']."',

												'".$_POST['postal_code']."',

												'".$new_file_name."'

											)

										";
										
										}
										else{
											$sql = "Update
													clients_pdf
													SET 
												
												name = '".$_POST['name']."',

												contact_no= '".$_POST['contact_no']."',

												funeral_service = '".$_POST['service']."',

												reason_quote = '".$_POST['reason']."',

												budget = '".$_POST['budget']."',

												country = '".$_POST['country']."',

												state = '".$_POST['state']."',

												city = '".$_POST['city']."' ,

												postal_code = '".$_POST['postal_code']."',

												pdf_name = '".$new_file_name."'
													
													
												where 
												client_id = '".$_SESSION['client']."'												
											

										";
										
										
										}
									mysql_query($sql);

									

									/*$getpath = 'state='.$_POST['state'].'&city='.$_POST['city'].'&postal_code='.$_POST['postal_code'].'&country='.$_POST['country'];*/

									

									$getpath = 'country='.$_POST['country'].'&state='.$_POST['state'].'&city='.$_POST['city'];

									

									//header('Location:funeral_directors.php?'.$getpath);
									header("Location:funeral_directors.php?country='".$_REQUEST['country']."'&state='".$_REQUEST['state']."'&city='".$_REQUEST['city']."'");
							}

						

					?>

                    	<!--<span class="login_head">Invite Funeral Directors to Quote</span>-->

                        <!--<p>Sign Up with Your Email</p>-->
                               
                        <form action="post-your-plan.php" name="postplanfrm" id="postplanfrm" method="post" enctype="multipart/form-data">
                        
                        <span class="fields_wrapp">

                        	<p class="reg_box_p">Person Making Arrangements: </p>

                        	<span class="reg_name">Name</span>

                        	<input class="reg_field" type="text" name="name" id="name" value="<?php echo $name_data;?>">
							<span style="color:red;margin-left: 10px;" id="aa"></span>
                            
                        </span>

                        <span class="fields_wrapp">

                        	<span class="reg_name">Contact Number</span>

                        	<input class="reg_field" type="text" name="contact_no" id="contact" maxlength="10" value="<?php echo $con_num;?>">
							<span style="color:red;margin-left: 10px;" id="bb"></span>

                        </span>

                        <span class="fields_wrapp1">

                        	<p class="reg_box_p">What funeral service do you require?</p>

                        	<label class="reg_label"><input class="reg_radio" type="radio" name="service"
							<?php if(isset($se) && $se=="Burial"){ echo "checked";}else{ echo "checked";}?>  
							value="Burial" ><span class="reg_radio">Burial</span></label>

                            <label class="reg_label"><input class="reg_radio" type="radio" name="service" <?php if(isset($se) && $se=="Cremation") echo "checked";?> value="Cremation">
							<span class="reg_radio">Cremation</span></label>

                        </span>

                        <span class="fields_wrapp1">

                        	<p class="reg_box_p">Reason for Funeral quote </p>

                        	<label class="reg_label_full_width">
							<input class="reg_radio" type="radio" name="reason" value="Someone has just died" <?php if(isset($re) && $re=="Someone has just died"){ echo "checked";}else{echo "checked";}?>  >
							<span class="reg_radio">Someone has just died </span></label>

                            <label class="reg_label_full_width"><input class="reg_radio" type="radio" name="reason" value="Death is imminent" <?php if(isset($re) && $re=="Death is imminent") echo "checked";?> >
							<span class="reg_radio">Death is imminent</span></label>

                            <label class="reg_label_full_width"><input class="reg_radio" type="radio" name="reason" value="Organising a funeral soon" <?php if(isset($re) && $re=="Organising a funeral soon") echo "checked";?> >
							<span class="reg_radio">Organising a funeral soon</span></label>

                            <label class="reg_label_full_width"><input class="reg_radio" type="radio" name="reason" value="Just Interested" <?php if(isset($re) && $re=="Just Interested") echo "checked";?> >
							<span class="reg_radio">Just Interested</span></label>

                        </span>

                        <span class="fields_wrapp1">

                        	<span class="reg_name">Funeral Budget</span>

                        	<input class="reg_field" type="text" name="budget" id="budget" value="<?php echo $budget_di;?>">
							<span style="color:red;margin-left: 10px;" id="cc"></span>
                         

                        </span>

                        <input type="hidden" id="hidden_form" name="hidden_form" value="1">

                        <span class="fields_wrapp1">

                        	<span class="reg_name">Select Country</span>
							<input type="text" id="country1" name="country" value="Australia" readonly class="reg_field">
						</span>

                        <span class="fields_wrapp1">

                        	<span class="reg_name">Select State / Province</span>

			<select class="defaultSelect" name="state" id="state1">

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
					 <option <?php echo $selected1;?> value="<?php echo $states['state_id'];?>">
					 <?php echo $states['state_name'];?></option>
						
<?php 
					}

				?>

			</select>
			<span style="color:red;margin-left: 10px;" id="ee"></span>
                        </span>

                        

                        <span class="fields_wrapp1">

                        	<span class="reg_name">Suburb</span>

                            <span id="city_span">

                            <!--<select class="defaultSelect"  name="city" id="city">

                                    <option class="selectOption2" value="">Select City</option>

                                </select>-->

                                <input type="text" name="city" id="city" placeholder="Enter Your Suburb" class="reg_field" style="  margin-left:inherit !important" value="<?php echo $city_dis;?>"/>
								<span style="color:red;margin-left: 10px;" id="ff"></span>
                                </span>

                        

                        </span>

                        

                        <span class="fields_wrapp1">

                        	<span class="reg_name">Postal Code / Zip</span>

                        	<input class="reg_field" type="text" name="postal_code" id="postal_code" value="<?php echo $post_dis;?>" maxlength="4">
							<span style="color:red;margin-left: 10px;" id="gg"></span>
                        </span>

                        <span class="fields_wrapp1">

                        	<span class="reg_name" style="margin-top:0;">Add / Upload Your<br> Funeral Plan</span>

                        	<div class="customfile-container">

                              <input type="file" id="file" name="pdf_name" />
										<span style="color:red;margin-left: 10px;" id="hh"></span>
                            </div>
							</span>

                        <span class="invite_director_line">You can invite as many funeral directors as per your choice to quote on your personal funeral plan.</span>
						<span style="width:100%; float:left;">

                        

                        	<!--<span class="reg_name">&nbsp;</span>-->
<!--<input class="invite_director_btn" type="submit" id="form_submit" name="form_submit" value="Invite Funeral Directors Now">
<a href="#yier" class="fancybox1"></a>

 <a class="fancybox-effects-a" href="#yier" id="login_pop<?php //echo $k?>"><img src="images/send_btn.jpg" border="0" /></a>-->
                        	<?php// if($nopdf == 1){?>
							<input class="invite_director_btn form_submit1" type="submit" id="form_submit1" name="form_submit" value="Get Quotes NOW" style="display:none">
							<a href="#yier" class="fancybox1">
							<input class="invite_director_btn" type="submit" id="form_submit" name="form_submit" value="Get Quotes NOW">
							</a><?php //}else{?>

                           <!-- <input class="invite_director_btn" type="submit" id="form_submit" name="form_submit" value="Invite Funeral Directors Now"><?php //}?>
-->
                        </span>

                        </form>

                        

                    </div>

                </div>

                </div>

                <!--<div class="login_text_wrapper">

                	<p>New Client</p>

                    <span class="login_text">If you are an eziFunerals client and haven't registered before, <a href="#">register now</a> so you can enjoy the benefits of eziFunerals services and a stream-lined shopping experience, it only takes a minute or two!</span>

                </div>-->

            </div>  

            <?php include("footer.php"); ?>  

            </div>

      </div>

      </div>

  </div>

<!--Custom File Type-->

<script type="text/javascript">
$(document).ready(function(){
$("#file").on("click",function(){
$("#form_submit").hide();
$("#form_submit1").show();

});

$("#form_submit1").on("click",function(){

var file_name = $("#file").val();
//alert(file_name);
if(file_name=="")
		{
			$("#dis_msg").show();
			
			
		}

var a = $("#name");
var b = $("#contact");
var c = $("#budget");
var d = $("#country1");
var e = $("#state1");
var f = $("#city");
var g = $("#postal_code");

		
$("#aa").html("");
$("#bb").html("");
$("#cc").html("");
$("#dd").html("");
$("#ee").html("");
$("#ff").html("");
$("#gg").html("");
$("#hh").html("");

	if((a.val()==""))
	{
	$("#aa").html(" Please Enter Name");
	}
	if((b.val()==""))
	{
	$("#bb").html("Please Enter Contact No ");
	}
	if((c.val()==""))
	{
	$("#cc").html(" Please Enter Budget ");
	}
	if((d.val()==""))
	{
	$("#dd").html(" Please Select Country ");
	}
	if((e.val()==""))
	{
	$("#ee").html("Please Select State");
	}
	if((f.val()==""))
	{
	$("#ff").html("Please Select City  ");
	}
	if((g.val()==""))
	{
	$("#gg").html("Please Enter Postal Code");
	}
	if((a.val()=="")||(b.val()=="")||(c.val()=="")||(d.val()=="")||(e.val()=="")||(f.val()=="")||(g.val()==""))
	{	
	return false;
	}
	if(isNaN(b.val()))
	{
	$("#bb").html("Invalid Mobile no");
	b.val("");
	}
	if(isNaN(g.val()))
	{
	$("#gg").html("Invalid Postal Code ");
	g.val("");
	}
	if(isNaN(b.val())||isNaN(g.val()))
	{
	return false;
	}
	if((a.val()!="")&&(b.val()!="")&&(c.val()!="")&&(d.val()!="")&&(e.val()!="")&&(f.val()!="")&&(g.val()!="")&&(file_name!='' || file_name==''))
	{	
          return true;
        }

});
$(".form_submit1").on("click",function(){
	document.postplanfrm.submit();
                                              
                                              
                                               var id = '<?php echo $id?>';
                                               var country = $('#country1').val();
                                               var state = $('#state1').val();
                                               var city = $('#city').val();
                                                //alert(id);
                                                if(id!='')
                                                {
                                                    
                                                    
                                                    $.ajax
							({
								type: "POST",
                                                                url :BASE_URL+"invite_me.php" ,
								
								data: "director_id="+id,
								success: function(msg)
								{
                                                                    console.log(msg);
                                                                 // alert(msg);
								  
								}
							});
                                                }
						if(id!='')
						{
                                                  
                                                         $.ajax
							({
								type: "POST",
                                                                url :BASE_URL+"invite_client_also.php" ,
								
								data: "director_id="+id,
								success: function(msg)
								{
                                                                    console.log(msg);
                                                                  //alert(msg);
								  
								}
							});
						}
						
                              

					

					

					

				});

//---------------------------without pdf ----------------------------
$("#form_submit").on("click",function(){

var file_name = $("#file").val();
//alert(file_name);
if(file_name=="")
		{
			$("#dis_msg").show();
			
			
		}

var a = $("#name");
var b = $("#contact");
var c = $("#budget");
var d = $("#country1");
var e = $("#state1");
var f = $("#city");
var g = $("#postal_code");

		
$("#aa").html("");
$("#bb").html("");
$("#cc").html("");
$("#dd").html("");
$("#ee").html("");
$("#ff").html("");
$("#gg").html("");
$("#hh").html("");

	if((a.val()==""))
	{
	$("#aa").html(" Please Enter Name");
	}
	if((b.val()==""))
	{
	$("#bb").html("Please Enter Contact No ");
	}
	if((c.val()==""))
	{
	$("#cc").html(" Please Enter Budget ");
	}
	if((d.val()==""))
	{
	$("#dd").html(" Please Select Country ");
	}
	if((e.val()==""))
	{
	$("#ee").html("Please Select State");
	}
	if((f.val()==""))
	{
	$("#ff").html("Please Select City  ");
	}
	if((g.val()==""))
	{
	$("#gg").html("Please Enter Postal Code");
	}
	if((a.val()=="")||(b.val()=="")||(c.val()=="")||(d.val()=="")||(e.val()=="")||(f.val()=="")||(g.val()==""))
	{	
	return false;
	}
	if(isNaN(b.val()))
	{
	$("#bb").html("Invalid Mobile no");
	b.val("");
	}
	if(isNaN(g.val()))
	{
	$("#gg").html("Invalid Postal Code ");
	g.val("");
	}
	if(isNaN(b.val())||isNaN(g.val()))
	{
	return false;
	}
	if((a.val()!="")&&(b.val()!="")&&(c.val()!="")&&(d.val()!="")&&(e.val()!="")&&(f.val()!="")&&(g.val()!="")&&(file_name!='' || file_name==''))
	{	
          return true;
        }

});


				$('#proceed_button').click(function()

				{ 
					
					var value= $("input:radio[name='proceed']:checked").val();
					
					if(value == 'no')

					{

						window.location.href = "index.php";

					}

					else

					{
                                            document.postplanfrm.submit();
                                              
                                              
                                               var id = '<?php echo $id?>';
                                               var country = $('#country1').val();
                                               var state = $('#state1').val();
                                               var city = $('#city').val();
                                                //alert(id);
                                                if(id!='')
                                                {
                                                    
                                                    
                                                    $.ajax
							({
								type: "POST",
                                                                url :BASE_URL+"invite_me.php" ,
								
								data: "director_id="+id,
								success: function(msg)
								{
                                                                    console.log(msg);
                                                                 // alert(msg);
								  
								}
							});
                                                }
						if(id!='')
						{
                                                  
                                                         $.ajax
							({
								type: "POST",
                                                                url :BASE_URL+"invite_client_also.php" ,
								
								data: "director_id="+id,
								success: function(msg)
								{
                                                                    console.log(msg);
                                                                  //alert(msg);
								  
								}
							});
						}
						
                                             
				//  window.location.href = "funeral_directors.php?country="+country+"&state="+state+"&city="+city;
					}


					

					

					

				});


});
;(function( $ ) {



  // Browser supports HTML5 multiple file?

  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',

      isIE = /msie/i.test( navigator.userAgent );



  $.fn.customFile = function() {



    return this.each(function() {



      var $file = $(this).addClass('customfile'), // the original file input

          $wrap = $('<div class="customfile-wrap">'),

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

  if ( !multipleSupport ) {

    $( document ).on('change', 'input.customfile', function() {



      var $this = $(this),

          // Create a unique ID so we

          // can attach the label to the input

          uniqId = 'customfile_'+ (new Date()).getTime(),

          $wrap = $this.parent(),



          // Filter empty input

          $inputs = $wrap.siblings().find('.customfile-filename')

            .filter(function(){ return !this.value }),



          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');



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

<div id="yier" style="display:none">

    <div id="">    

        <!--<h1>Add Review</h1>-->

        <span class="fields_wrapp no_margin">

            <span class="reg_name businessPopSpan" id="dis_msg">
           <sp class="gree_pas" style="font-size:24px !important; " > Hello!</sp>
<br><br> We’ve noted that you have not uploaded your funeral plan with this request. <br />In order to avoid a sales focussed environment and get the best funeral at best price, eziFunerals recommends that you include your funeral plan before inviting quotes from Funeral Directors.
</span>

 <!--<span class="reg_name businessPopSpan" id="check_msg">
           <sp class="gree_pas" style="font-size:24px !important; " > Hello!</sp>
<br><br>In order to avoid a sales focussed environment and get the best funeral at best price, eziFunerals recommends that you create your funeral plan before inviting quotes from Funeral Directors.
</span>-->

			<span class="reg_name businessPopSpan">Do you still wish to proceed?</span>

			<div class="name-fieldpop1">

                    <div class="name-fullpop"><input name="proceed" type="radio" value="yes" checked></div>

                    <div class="fieldpop">Yes  </div>

                    </div>

            <div class="name-fieldpop">

                    <div class="name-fullpop"><input name="proceed" type="radio" value="no"></div>

                    <div class="fieldpop">No</div>

                    </div>

            <span style="width:100%; text-align:center; float:left; margin-top:10px;"><input type="button" class="invite_director_btn proceed_button" value="Submit" id="proceed_button" name="proceed_button" style="width:120px; margin-left:246px"></span>        

        </span>            

    </div>

</div>

<!--Custom File Type-->

</body>

</html>

<?php

	}

	else

	{

		header('Location:login.php');

	}

?>

