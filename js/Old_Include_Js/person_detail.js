$(document).ready(function (){  
							
	$('#children_add_button').live("click",function()
	{
		var row = parseInt($('#children_hidden').val());
		
		var new_row = row + 1;
		
		$('#children_table').append('<tr><td><input type="text" id="children_name'+new_row+'" name="children_name'+new_row+'" class="text-n" /></td><td style="padding-left:10px;"><input type="text" name="children_dob'+new_row+'" id="children_dob'+new_row+'" value="" class="text-n" /></td><td><p class="tx-area" style="padding-top: 2px;"><input type="radio" id="children_gender'+new_row+'" name="children_gender'+new_row+'" class="checkbox" value="male" checked="checked"/><span class="ch-field">Male </span></p><p class="tx-area" style="padding-top: 2px;"><input type="radio" id="children_gender'+new_row+'" name="children_gender'+new_row+'" class="checkbox" value="female" /><span class="ch-field">Female </span></p><a href="javascript:void(0);" id="familycross1" hidden_value="family_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#children_hidden').val(new_row);
		
		
	});
	
	
	$('#kin_add_button').live("click",function()
	{
		var row = parseInt($('#kin_hidden').val());
		
		var new_row = row + 1;
		
		$.ajax({
			url :"getcountries.php",
			type : "POST",
			dataType: "json",
			success:function(data)
			{
				var items='';
						
				items += '<select class="select-ezi" id="kin_country'+new_row+'" name="kin_country'+new_row+'" style="margin-top:5px;">'
				items += '<option value="0">Select Country</option>'
				$.each(data,function(index,item) 
				{     
				  items+="<option value='"+item.name+"'>"+item.name+"</option>";
				});
				items +="</select>";
				
				
				$('#divtablekin').append('<table id="kin_table'+new_row+'" style="border-top:1px dashed #999999; margin-top:15px; padding-top:10px;"><tr><td colspan="3" style="text-align:right"><a href="javascript:void(0);" id="" hidden_value="'+new_row+'" class="removekin"><img src="images/cross.png" title="" alt="" /></a></td></tr><tr><td><lebel>First Name:</lebel><input type="text" name="kin_fname'+new_row+'" id="kin_fname'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Middle Name:</lebel><input type="text" name="kin_mname'+new_row+' " id="kin_mname'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Last Name:</lebel><input type="text" name="kin_lname'+new_row+'" id="kin_lname'+new_row+'" value="" class="text-n" /></td></tr><tr><td height="30" colspan="3" align="left" valign="bottom"><span style="float:left;"> <lebel>Gender :&nbsp;&nbsp;</lebel></span><input type="radio" id="kin_gender'+new_row+'" name="kin_gender'+new_row+'" class="checkbox" value="male" checked="checked"/><span class="ch-field">Male&nbsp;&nbsp; </span><input type="radio" id="kin_gender'+new_row+'" name="kin_gender'+new_row+'" class="checkbox" value="female"/><span class="ch-field">Female </span></td></tr><tr><td height="35" colspan="3"><p><lebel><strong>Current Address:</strong></lebel></p></td></tr><tr><td style="padding:4px;"><lebel>Address Line 1</lebel><input type="text" name="kin_address1_'+new_row+'" id="kin_address1_'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Address Line 2</lebel><input type="text" name="kin_address2_'+new_row+'" id="kin_address2_'+new_row+'" value="" class="text-n" /></td></tr><tr><td style="padding:4px;"><lebel>County / State / Province *</lebel><input type="text" name="kin_state'+new_row+'" id="kin_state'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Postcode / Zip</lebel><input type="text" name="kin_postcode'+new_row+'" id="kin_postcode'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Country: </lebel><span class="sel-bud">'+items+'</span></td></tr><tr><td style="padding:4px;"><lebel>Telephone:</lebel><input type="text" name="kin_telephone'+new_row+'" id="kin_telephone'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Mobile: </lebel><input type="text" name="kin_mobile'+new_row+'" id="kin_mobile'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Email: </lebel><input type="text" name="kin_email'+new_row+'" id="kin_email'+new_row+'" value="" class="text-n" /></td></tr><tr><td><lebel>Relationship to you:</lebel><input type="text" name="kin_realtionship'+new_row+'" id="kin_realtionship'+new_row+'" value="" class="text-n" /></td><td></td><td></td></tr></table>');
			}
			
			
		});		
		
		
		$('#kin_hidden').val(new_row);
		
		
	});
	
	
	
	$('#family_add_button').live("click",function()
	{
		var row = parseInt($('#family_hidden').val());
		
		var new_row = row + 1;
		
		$.ajax({
			url :"getcountries.php",
			type : "POST",
			dataType: "json",
			success:function(data)
			{
				var items='';
						
				items += '<select class="select-ezi" id="family_country'+new_row+'" name="family_country'+new_row+'" style="margin-top:5px;">'
				items += '<option value="0">Select Country</option>'
				$.each(data,function(index,item) 
				{     
				  items+="<option value='"+item.name+"'>"+item.name+"</option>";
				});
				items +="</select>";
				
				
				$('#divtablefamily').append('<table id="family_table'+new_row+'" style="border-top:1px dashed #999999; margin-top:15px; padding-top:10px;"><tr><td colspan="3" style="text-align:right"><a href="javascript:void(0);" id="" hidden_value="'+new_row+'" class="removefamily"><img src="images/cross.png" title="" alt="" /></a></td></tr><tr><td><lebel>First Name:</lebel><input type="text" name="family_fname'+new_row+'" id="family_fname'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Middle Name:</lebel><input type="text" name="family_mname'+new_row+'" id="family_mname'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Last Name:</lebel><input type="text" name="family_lname'+new_row+'" id="family_lname'+new_row+'" value="" class="text-n" /></td></tr><tr><td height="30" colspan="3" align="left" valign="bottom"><span style="float:left;"> <lebel>Gender :&nbsp;&nbsp;</lebel></span><input type="radio" id="family_gender'+new_row+'" name="family_gender'+new_row+'" class="checkbox" value="male" checked="checked"/><span class="ch-field">Male&nbsp;&nbsp; </span><input type="radio" id="family_gender'+new_row+'" name="family_gender'+new_row+'" class="checkbox" value="female"/><span class="ch-field">Female </span></td></tr><tr><td height="35" colspan="3"><p><lebel><strong>Current Address:</strong></lebel></p></td></tr><tr><td style="padding:4px;"><lebel>Address Line 1</lebel><input type="text" name="family_address1_'+new_row+'" id="family_address1_'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Address Line 2</lebel><input type="text" name="family_address2_'+new_row+'" id="family_address2_'+new_row+'" value="" class="text-n" /></td></tr><tr><td style="padding:4px;"><lebel>County / State / Province *</lebel><input type="text" name="family_state'+new_row+'" id="family_state'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Postcode / Zip</lebel><input type="text" name="family_postcode'+new_row+'" id="family_postcode'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Country: </lebel><span class="sel-bud">'+items+'</span></td></tr><tr><td style="padding:4px;"><lebel>Telephone:</lebel><input type="text" name="family_telephone'+new_row+'" id="family_telephone'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Mobile: </lebel><input type="text" name="family_mobile'+new_row+'" id="family_mobile'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Email: </lebel><input type="text" name="family_email'+new_row+'" id="family_email'+new_row+'" value="" class="text-n" /></td></tr><tr><td><lebel>Relationship to you:</lebel><input type="text" name="family_realtionship'+new_row+'" id="family_realtionship'+new_row+'" value="" class="text-n" /></td><td></td><td></td></tr></table>');
			}
			
			
		});		
		
		
		$('#family_hidden').val(new_row);
		
		
	});
	
	
	$('.removefamily').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		$('#family_table'+hidden_value).remove();		
		
	});
	
	
	
	$('.removekin').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		$('#kin_table'+hidden_value).remove();		
		
	});
	
	
	$('.remove').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		var rows = parseInt($('#'+hidden_value).val());
		
		$(this).closest('tr').remove();		
		
	});
	
	
	$('.familycurrentable').live("click",function()
	{
		var table_id = $(this).attr('table_id');
		
		var current_table = $(this).attr('current_table');
		
		var input=confirm("Are you sure you want to remove?");
		
		if (input==false)
		{
		  return false;
		}
		else
		{
			$.ajax({
				url :"remove_family_friends.php" ,
				data : "table_id="+table_id,
				type : "POST",
				success:function(msg)
				{					
					location.reload();					
				}
		
			});
			
			
		}
		
	});
	
	
	
	$('.kincurrentable').live("click",function()
	{
		var table_id = $(this).attr('table_id');
		
		var current_table = $(this).attr('current_table');
		
		var input=confirm("Are you sure you want to remove?");
		
		if (input==false)
		{
		  return false;
		}
		else
		{
			$.ajax({
				url :"remove_kin.php" ,
				data : "table_id="+table_id,
				type : "POST",
				success:function(msg)
				{					
					location.reload();					
				}
		
			});
			
			
		}
		
	});
	
	
	
});