$(document).ready(function (){ 

	$('.business_state').live("change",function()
	{
		var current_id = $(this).attr('current_id');
		
//		$.ajax
//			({
//				type: "POST",
//				url: "get_cities_premium.php",
//				data: "state_id="+state_id+"&current_id="+current_id,
//				success: function(msg)
//				{
//					$('#cityspan'+current_id).html(msg);
//				}
//				
//			});
$('#business_city'+current_id).autocomplete({
                            source: function(request, response) 
                            {
                               
		var state_id = $('#state'+current_id).val();
                var city_id = $('#business_city'+current_id).val();
                            $.ajax({
						url :BASE_URL+"city.php" ,
						data : "state_id="+state_id+"&city="+city_id,
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
var i=1;
	$('#addrow').live("click",function()
	{
	
		var items="";
		var total_location = parseInt($('#total_location').val());
		
		i=i+1;
		total_location = total_location + 1;
		
		$.ajax({
				url :BASE_URL+"get_states.php" ,
				type : "POST",
				dataType: "json",
				success:function(data)
				{	
					items += "<select class='reg_field preInput business_state' name='state"+total_location+"' current_id='"+total_location+"' id='state"+total_location+"'>"
					items += "<option value =''>Select state/region</option>"
					
					$.each(data,function(index,item) 
					{     
					  items+="<option value='"+item.state_id+"'>"+item.state_name+"</option>";
					});
					items +="</select>";
					
					
					$('#businessdiv').append('<span class="add_loc span_no'+total_location+'"><span class="fields_wrapp1"><span class="reg_name ename"><b style="font-size:20px;">Location:'+i+'</b></span><br/><span class="reg_name ename">Country<span class="red">*</span></span><input type="text" class="reg_field preInput" name= "business_country'+total_location+'" id="business_country'+total_location+'" value="Australia"></span><span class="fields_wrapp1"><span class="reg_name ename">State<span class="red">*</span></span>'+items+'<span class="formerror1" id="stateerror'+total_location+'">Please Select state.</span></span><span class="fields_wrapp1"><span class="reg_name ename">Select Suburb<span class="red">*</span>  </span><span id="cityspan'+total_location+'"><input type="text" class="reg_field preInput" name="business_city'+total_location+'" id="business_city'+total_location+'" style="margin:0px; float:left;"></span><span class="formerror1" id="suburberror'+total_location+'">Please Select Suburb.</span></span><span class="fields_wrapp1 "><span class="reg_name ename">Address<span class="red">*</span></span><input class="reg_field preInput" type="text" name="business_address'+total_location+'" id="business_address'+total_location+'"> <span class="formerror1" id="addresserror'+total_location+'">Please Enter Address.</span></span><span class="fields_wrapp1"><span class="reg_name ename">Postcode / Zip <span class="red">*</span></span><input class="reg_field preInput" type="text" name="business_zip'+total_location+'" id="business_zip'+total_location+'" maxlength="4"> <span class="formerror1" id="postelcodeerror'+total_location+'">Please Enter zip/code.</span></span><span class="fields_wrapp1"><span class="reg_name ename">&nbsp;</span><a href="javascript:void(0)"><input style="margin-top:-3px;" class="login_button remove_location" id="'+total_location+'" type="button" value="Remove"></a></span></span>');
				}
		});
		
		$('#total_location').val(total_location);
		
		var total_cost = $('#total_cost').val();
		
		total_cost = total_cost + 10;
		
		$('#total_cost').val(total_cost)
		
	});
	
	
	$('.remove_location').live("click",function()
	{
		var curent_row = parseInt($(this).attr('id'));
		
		var total_location = parseInt($('#total_location').val());
		
		$('.span_no'+curent_row).remove();
		
		total_location = total_location - 1;
		
		$('#total_location').val(total_location);
		
		var total_cost = $('#total_cost').val();
		
		total_cost = total_cost - 10;
		
		$('#total_cost').val(total_cost)
		
	});
	


});