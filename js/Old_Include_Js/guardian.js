$(document).ready(function (){  
							
	$('#guardian_add_button').live("click",function()
	{
		var row = parseInt($('#guardian_hidden').val());
		
		var new_row = row + 1;
		
		$.ajax({
			url :"getcountries.php",
			type : "POST",
			dataType: "json",
			success:function(data)
			{
				var items='';
						
				items += '<select class="select-ezi" id="country'+new_row+'" name="country'+new_row+'" style="margin-top:5px;">'
				items += '<option value="0">Select Country</option>'
				$.each(data,function(index,item) 
				{     
				  items+="<option value='"+item.name+"'>"+item.name+"</option>";
				});
				items +="</select>";
				
				
				$('#divtable').append('<table id="guardiantable'+new_row+'" style="border-top:1px dashed #999999; margin-top:15px; padding-top:10px;"><tr><td colspan="3" style="text-align:right"><a href="javascript:void(0);" id="familycross1" hidden_value="'+new_row+'" class="remove"><img src="images/cross.png" title="" alt="" /></a></td></tr><tr><td style="padding:4px;"><lebel>First Name:</lebel><input type="text" name="f_name'+new_row+'" id="f_name'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Middle Name:</lebel><input type="text" name="m_name'+new_row+'" id="m_name'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Last Name:</lebel><input type="text" name="l_name'+new_row+'" id="l_name'+new_row+'" value="" class="text-n" /></td></tr><tr><td height="30" colspan="3" align="left" valign="bottom"><span style="float:left;"> <lebel>Gender :&nbsp;&nbsp;</lebel></span><input type="radio" id="gender'+new_row+'" name="gender'+new_row+'" class="checkbox" value="male" checked="checked"/><span class="ch-field">Male&nbsp;&nbsp; </span><input type="radio" id="gender'+new_row+'" name="gender'+new_row+'" class="checkbox" value="female"/><span class="ch-field">Female </span></td></tr><tr><td style="padding:4px;"><p><lebel>Current Address:</lebel></p></td></tr><tr><td style="padding:4px;"><lebel>Address Line 1</lebel><input type="text" name="address1_'+new_row+'" id="address1_'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Address Line 2</lebel><input type="text" name="address2_'+new_row+'" id="address2_'+new_row+'" value="" class="text-n" /></td></tr><tr><td style="padding:4px;"><lebel>County / State / Province *</lebel><input type="text" name="state'+new_row+'" id="state'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Postcode / Zip</lebel><input type="text" name="postcode'+new_row+'" id="postcode'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Country: </lebel><span class="sel-bud">'+items+'</span></td></tr><tr><td style="padding:4px;"><lebel>Telephone:</lebel><input type="text" name="telephone'+new_row+'" id="telephone'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Mobile: </lebel><input type="text" name="mobile'+new_row+'" id="mobile'+new_row+'" value="" class="text-n" /></td><td style="padding:4px;"><lebel>Email: </lebel><input type="text" name="email'+new_row+'" id="email'+new_row+'" value="" class="text-n" /></td></tr></table>');
			}
			
			
			
		});		
		
		
		$('#guardian_hidden').val(new_row);
		
		
	});
	
	
	$('.remove').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		$('#guardiantable'+hidden_value).remove();		
		
	});
	
	
	$('.currentable').live("click",function()
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
				url :"remove_guardian.php" ,
				data : "table_id="+table_id,
				type : "POST",
				success:function(msg)
				{					
					location.reload();					
				}
		
			});
			
			
		}
		
		//$('#guardiantable'+hidden_value).remove();		
		
	});
	
	
	
});